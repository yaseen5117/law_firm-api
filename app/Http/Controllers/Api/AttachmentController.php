<?php

namespace App\Http\Controllers\Api;

use Imagick;
use Image;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\CaseLaw;
use App\Models\ExtraDocument;
use App\Models\Invoice;
use App\Models\Judgement;
use App\Models\OralArgument;
use App\Models\Setting;
use App\Models\PetitionReply;
use App\Models\PetitonOrderSheet;
use App\Models\PetitionIndex;
use App\Models\PetitionNaqalForm;
use App\Models\PetitionSynopsis;
use App\Models\PetitionTalbana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use App\Services\EmailService;
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
        info('--------START ATTCHMENT UPLOADING PROCESS--------');
        ini_set('max_execution_time', '0'); // for infinite time of execution
        ini_set('memory_limit', '2024M');
        ini_set('post_max_size', '2024M');
        ini_set('upload_max_filesize', '2024M');
        ini_set('max_input_time', 36000); // 10 houres
        set_time_limit(36000); // 10 houres

        try {
            $files = $request->file('files');
            if ($files) {
                foreach ($files as $key => $file) {

                    info("AttachmentController store Function: File mime_type uploading: " . $file->getClientMimeType());
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $mime_type = $file->getClientMimeType();

                    $title = $file_name;
                    $attachmentable_type = $request->attachmentable_type;
                    $attachmentable_id = $request->attachmentable_id;
                    info("AttachmentController store Function: File attachmentable_type : " . $attachmentable_type);
                    if ($request->attachmentable_type == "App\Models\Invoice") {
                        $sub_directory = "invoices/";

                        Attachment::where('attachmentable_id', $request->attachmentable_id)->where('attachmentable_type', "App\Models\Invoice")->forceDelete();
                    } else if ($request->attachmentable_type == "App\Models\Setting") {
                        $sub_directory = "settings/";
                        Attachment::where('attachmentable_id', $request->attachmentable_id)->where('attachmentable_type', "App\Models\Setting")->forceDelete();

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
                    } else {
                        $sub_directory = "";
                    }
                    $file_path = $file->storeAs('attachments/' . $sub_directory . $request->attachmentable_id . '/original', $file_name, 'public');
                    if ($mime_type != "application/pdf") {
                        info("AttachmentController store Function: File in condition non-pdf condition : ");
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
                        $output_path = $public_path . '/storage/attachments/' . $sub_directory . $attachmentable_id;
                        try {
                            $im = new Imagick();
                            //$im->setResolution(300,300);
                            $im->readimage($file_path);
                            $num_page = $im->getnumberimages();
                            $im->clear();
                            $im->destroy();
                            info("Total Number Of Pages: $num_page");
                            for ($page = 0; $page < $num_page; $page++) {
                                info("creating Imagick Object");
                                $im = new Imagick();
                                info("Setting Up Resolution of Image");
                                $im->setResolution(300, 300);
                                info("Reading Image from Path");
                                $im->readimage($file_path . "[$page]");
                                info("Set Image Format");
                                $im->setImageFormat('jpeg');
                                info("Generating File JPG Name");
                                $generated_jpg_filename = $page . " - " . $file_name . '.jpg';
                                info("Set Image Compression");
                                $im->setImageCompression(imagick::COMPRESSION_JPEG);
                                info("Set Image Compression Quality");
                                $im->setImageCompressionQuality(100);
                                info("Writing Image To path");
                                $im->writeImage($output_path . "/" . $generated_jpg_filename);
                                info("Clearing object");
                                $im->clear();
                                info("Destroying Object");
                                $im->destroy();
                                info("Saving To DB");
                                Attachment::updateOrCreate(['id' => $request->attachment_id], [ //attachment id
                                    'title' => $generated_jpg_filename,
                                    'file_name' => $generated_jpg_filename,
                                    'mime_type' => 'jpg',
                                    'attachmentable_id' => $request->attachmentable_id,
                                    'attachmentable_type' => $request->attachmentable_type,
                                    'display_order' => $page,
                                ]);
                                info("Complete ALL Process for Image# $page");
                            }
                        } catch (\Exception $e) {
                            info('Message: ' . $e->getMessage());
                        }
                        /****************CONVERTING PDF TO IMAGES**********************/
                        info("****************CONVERTING PDF TO IMAGES END**********************");
                    }
                }


                switch ($attachmentable_type) {
                    case 'App\Models\PetitonOrderSheet':
                        $entity_title = "Order Sheet";
                        $pettiion_ordersheet = PetitonOrderSheet::find($attachmentable_id);
                        $petition = $pettiion_ordersheet->petition;
                        break;

                    case 'App\Models\PetitionIndex':
                        //id22
                        $entity_title = "Petition Index";
                        $petition_index = PetitionIndex::find($attachmentable_id);
                        $petition = $petition_index->petition;
                        break;

                    case 'App\Models\PetitionReply':
                        $entity_title = "Replies";
                        $petition_reply = PetitionReply::find($attachmentable_id);
                        $petition = $petition_reply->petition_reply_parent->petition;
                        break;

                    case 'App\Models\OralArgument':
                        $entity_title = "Oral Argument";
                        $petition_oral_argument = OralArgument::find($attachmentable_id);
                        $petition = $petition_oral_argument->petition;
                        break;

                    case 'App\Models\PetitionNaqalForm':
                        $entity_title = "Naqal Form";
                        $petition_naqal_form = PetitionNaqalForm::find($attachmentable_id);
                        $petition = $petition_naqal_form->petition;
                        break;

                    case 'App\Models\PetitionTalbana':
                        $entity_title = "Talbana";
                        $petition_talbana = PetitionTalbana::find($attachmentable_id);
                        $petition = $petition_talbana->petition;
                        break;

                    case 'App\Models\CaseLaw':
                        $entity_title = "Case Laws";
                        $petition_case_law = CaseLaw::find($attachmentable_id);
                        $petition = $petition_case_law->petition;
                        break;

                    case 'App\Models\ExtraDocument':
                        $entity_title = "Extra Document";
                        $petition_extra_document = ExtraDocument::find($attachmentable_id);
                        $petition = $petition_extra_document->petition;
                        break;

                    case 'App\Models\PetitionSynopsis':
                        $entity_title = "Synopsis";
                        $petition_synopsis = PetitionSynopsis::find($attachmentable_id);
                        $petition = $petition_synopsis->petition;
                        break;

                    case 'App\Models\Judgement':
                        $entity_title = "Judgement";
                        $petition_judgement = Judgement::find($attachmentable_id);
                        $petition = $petition_judgement->petition;
                        break;

                    default:
                        $entity_title = "";
                        break;
                }

                if (isset($petition) && !empty($entity_title)) {
                    $emailService = new EmailService;
                    $emailService->send_document_uploading_email($petition, $entity_title);
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
                removeImage($attachment);
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
                foreach ($request->id as $id) {
                    $attachment = Attachment::find($id);
                    removeImage($attachment);
                }
                DB::table("attachments")->whereIn('id', $request->id)->delete();

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
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content, 'PDF');
        $PDFWriter->save(storage_path('app/public/new-result.pdf'));
        echo 'File has been successfully converted';
    }
}
