<?php

namespace App\Http\Controllers\Api;

use Imagick;
use Image;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

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
        try {
            $files = $request->file('files');
            if ($files) {
                foreach ($files as $key => $file) {
                    if ($request->attachmentable_type == "App\Models\Invoice") {
                        $sub_directory = "invoices/";
                    }else{
                        $sub_directory="";
                    }
                    
                        info("AttachmentController store Function: File mime_type: " . $file->getClientMimeType());
                        $name = time() . '_' . $file->getClientOriginalName();
                        $file_path = $file->storeAs('attachments/' .$sub_directory. $request->attachmentable_id . '/original', $name, 'public');
                        $mime_type = $file->getClientMimeType();

                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $title = $file_name;
                        $attachmentable_type = $request->attachmentable_type;
                        $attachmentable_id = $request->attachmentable_id;


                        if ($mime_type != "application/pdf") {
                            //START To Resize Images
                            $resizeImage = Image::make($file);
                            $resizeImage->resize(null, 1024, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $path =  storage_path('app/public/attachments/' . $request->attachmentable_id);
                            if (!File::isDirectory($path)) {
                                File::makeDirectory($path, 0777, true, true);
                            }
                            $resizeImage->save(storage_path('app/public/attachments/' . $request->attachmentable_id . '/' . $name));
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
                            $file_path = "$public_path/storage/attachments/$attachmentable_id/original/$pdf_file_name";
                            $output_path = "$public_path/storage/attachments/$attachmentable_id/";

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
                                    $resizeImage->resize(null, 1024, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                    $path =  storage_path('app/public/attachments/' . $request->attachmentable_id);
                                    if (!File::isDirectory($path)) {
                                        File::makeDirectory($path, 0777, true, true);
                                    }
                                    $resizeImage->save(storage_path('app/public/attachments/' . $request->attachmentable_id . '/' . $generated_jpg_filename));
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
}
