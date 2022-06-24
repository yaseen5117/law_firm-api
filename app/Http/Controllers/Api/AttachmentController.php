<?php

namespace App\Http\Controllers\Api;

use Imagick;
use Image;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use PDF;
class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        try {
            $files = $request->file('files');
            if ($files) {
                foreach ($files as $key => $file) {

                    info("AttachmentController store Function: File mime_type: " . $file->getClientMimeType());
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $mime_type = $file->getClientMimeType();


                    $title = $file_name;
                    $attachmentable_type = $request->attachmentable_type;
                    $attachmentable_id = $request->attachmentable_id;

                    if ($request->attachmentable_type == "App\Models\Invoice") {
                        $sub_directory = "invoices/";

                        Attachment::where('attachmentable_id', $request->attachmentable_id)->where('attachmentable_type', "App\Models\Invoice")->forceDelete();
                    } else if ($request->attachmentable_type == "App\Models\Setting") {
                        $sub_directory = "settings/";
                        Attachment::where('attachmentable_id', $request->attachmentable_id)->where('attachmentable_type', "App\Models\Setting")->forceDelete();
                        /////
                        $resizeImage = Image::make($file);
                        $resizeImage->resize(2000, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $path =  storage_path('app/public/attachments/' . $sub_directory . $request->attachmentable_id);
                        if (!File::isDirectory($path)) {
                            File::makeDirectory($path, 0777, true, true);
                        }
                        $resizeImage->save(storage_path('app/public/attachments/' . $sub_directory . $request->attachmentable_id . '/' . $file_name));
                        //END To Resize Images

                        //WE DONT WANT TO SAVE PDF IN DATABASE. BECAUSE WE ONLY CONVERT PDF TO IMAGES AND THEN SAVE THOSE IMAGES IN DATABASE.
                        $setting = Setting::find(1);
                        $request->merge([
                            'site_file_name' => $file_name
                        ]);
                        $setting->setMeta($request->except('attachmentable_type', 'attachmentable_id', 'files'));
                        $setting->save();
                        return response("Successfully Save File Name To Setting MetaTable", 200);
                        // Attachment::create([
                        //     'file_name' => $file_name,
                        //     'title' => $title,
                        //     'attachmentable_type' => $attachmentable_type,
                        //     'attachmentable_id' => $attachmentable_id,
                        //     'mime_type' => $mime_type,
                        // ]);
                    } else {
                        $sub_directory = "";
                    }

                    $file_path = $file->storeAs('attachments/' . $sub_directory . $request->attachmentable_id . '/original', $file_name, 'public');

                    if ($mime_type != "application/pdf") {
                        //START To Resize Images
                        $resizeImage = Image::make($file);
                        $resizeImage->resize(2000, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $path =  storage_path('app/public/attachments/' . $sub_directory . $request->attachmentable_id);
                        if (!File::isDirectory($path)) {
                            File::makeDirectory($path, 0777, true, true);
                        }
                        $resizeImage->save(storage_path('app/public/attachments/' . $sub_directory . $request->attachmentable_id . '/' . $file_name));
                        //END To Resize Images

                        //WE DONT WANT TO SAVE PDF IN DATABASE. BECAUSE WE ONLY CONVERT PDF TO IMAGES AND THEN SAVE THOSE IMAGES IN DATABASE.

                        Attachment::create([
                            'file_name' => $file_name,
                            'title' => $title,
                            'attachmentable_type' => $attachmentable_type,
                            'attachmentable_id' => $attachmentable_id,
                            'mime_type' => $mime_type,
                        ]);
                    }

                    if ($mime_type == "application/pdf") {
                        info("****************CONVERTING PDF TO IMAGES START**********************");
                        /****************CONVERTING PDF TO IMAGES**********************/
                        $attachmentable_id = $request->attachmentable_id;
                        $pdf_file_name = "$file_name";
                        $public_path =  public_path();
                        $file_path = $public_path . '/storage/attachments/' . $attachmentable_id . '/' . $sub_directory . 'original/' . $pdf_file_name;
                        $output_path = $public_path . '/storage/attachments/' . $sub_directory . $attachmentable_id . '/';

                        try {

                            $im = new Imagick();
                            //$im->setResolution(300,300);
                            $im->readimage($file_path);
                            $num_page = $im->getnumberimages();
                            $im->clear();
                            $im->destroy();

                            for ($page = 0; $page < $num_page; $page++) {
                                $im = new Imagick();

                                info("converting page: $page");
                                $im->setResolution(300, 300);

                                $im->readimage($file_path . "[$page]");
                                $im->setImageFormat('jpeg');
                                $generated_jpg_filename = $page . " - " . $file_name . '.jpg';
                                $im->setImageCompression(imagick::COMPRESSION_JPEG);
                                $im->setImageCompressionQuality(100);
                                $im->writeImage($output_path . "/" . $generated_jpg_filename);

                                //START To Resize Images
                                $resizeImage = Image::make($output_path . "/" . $generated_jpg_filename);
                                $resizeImage->resize(2000, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                                $path =  storage_path('app/public/attachments/' . $sub_directory . $request->attachmentable_id);
                                if (!File::isDirectory($path)) {
                                    File::makeDirectory($path, 0777, true, true);
                                }
                                $resizeImage->save(storage_path('app/public/attachments/' . $sub_directory . $request->attachmentable_id . '/' . $generated_jpg_filename));
                                //END To Resize Images

                                info("converting page: $page DONE");
                                $im->clear();
                                $im->destroy();

                                $attachment = Attachment::updateOrCreate(['id' => $request->attachment_id], [ //attachment id
                                    'title' => $generated_jpg_filename,
                                    'file_name' => $generated_jpg_filename,
                                    'mime_type' => 'jpg',
                                    'attachmentable_id' => $request->attachmentable_id,
                                    'attachmentable_type' => $request->attachmentable_type,
                                    'display_order' => $page,
                                ]);
                            }




                            info("conversion done");
                        } catch (\Exception $e) {
                            info('Message: ' . $e->getMessage());
                        }
                        /****************CONVERTING PDF TO IMAGES**********************/
                        info("****************CONVERTING PDF TO IMAGES END**********************");
                    }
                }

                return response()->json([
                    'success' => 'Files uploaded successfully.',
                    'sub_directory' => $sub_directory,
                    'file_path' => $file_path,
                    'code' => 200,
                ]);
            }
            return response([
                "error" => "No files available"
            ], 404);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $attachment = Attachment::find($id);
            if ($attachment) {
                $attachment->update([
                    'title' => $request->title,
                    'display_order' => $request->display_order,
                ]);
                return response(
                    [
                        'message' => 'Record updated successfully',
                        'attachment' => $attachment,
                        'code' => 200
                    ]
                );
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $attachment = Attachment::find($id);
            if ($attachment) {
                $attachment->delete();
                return response(
                    [
                        'message' => 'Record Deleted successfully',
                        'code' => 200
                    ]
                );
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function deleteSelected(Request $request)
    {
        try {
            //request contains all selected records ids   
            if ($request) {
                DB::table("attachments")->whereIn('id', $request)->delete();
                return response(
                    [
                        'message' => 'Records Deleted successfully',
                        'code' => 200
                    ]
                );
            } else {
                return response(
                    [
                        'message' => 'No Record Found',
                        'code' => 200
                    ]
                );
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function findOriginalFolder()
    {
        try {
            $folders = [];
            $original_folders = [];
            for ($folder_num = 1470; $folder_num <= 1490; $folder_num++) {
                array_push($folders, $folder_num);
            }

            foreach ($folders as $folder) {

                $FileSystem = new Filesystem();
                // Target directory.
                $public_path =  public_path();
                $file_path = "$public_path/storage/order_pictures/$folder/orig";

                // Check if the directory exists.
                if ($FileSystem->exists($file_path)) {

                    // Get all files in this directory.
                    $files = $FileSystem->files($file_path);

                    // Check if directory is empty.
                    if (!empty($files)) {
                        //keep ids of folder that have original folder
                        $original_folders[] = $folder;
                        // Yes, delete the directory.
                        //$FileSystem->deleteDirectory($file_path);                         
                    } else {
                        //keep ids of folder that have original folder
                        $original_folders[] = $folder;
                    }
                }
            }
            return response([
                'original_folders' => $original_folders,
                'code' => 200
            ]);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function convertWordToPDF()
    {
            /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        
        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(storage_path('app/public/result.docx')); 
          
        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(storage_path('app/public/new-result.pdf')); 
        echo 'File has been successfully converted';
    }
}
