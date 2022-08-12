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
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
//use Storage;
use PDF;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\SendDocumentUploadEmail;
use App\Jobs\JobConvertPdfToImages;
use App\Models\Petition;
use App\Models\PetitionReplyParent;

class AttachmentController extends Controller
{

    use DispatchesJobs;

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
                    if ($request->attachmentable_type == "App\Models\Setting") {
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
                        $sub_directory = substr($attachmentable_type . "/", strpos($attachmentable_type, "'\'") + 11);
                    }

                    if ($request->attachmentable_type != "App\Models\Payment") {

                        $file_path = $file->storeAs('attachments/petitions/' . $request->petition_id . '/' . $sub_directory . $request->attachmentable_id . '/original', $file_name, 'public');
                    }
                    if ($mime_type != "application/pdf") {
                        info("AttachmentController store Function: File in condition non-pdf condition : ");
                        //START To Resize Images
                        $resizeImage = Image::make($file);
                        $resizeImage->resize(2000, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        if ($request->attachmentable_type == "App\Models\Payment") {
                            $attachment = Attachment::where('attachmentable_id', $request->attachmentable_id)->where('attachmentable_type', "App\Models\Payment")->first();
                            if ($attachment) {
                                $public_path =  public_path();
                                $file_path = $public_path . '/storage/attachments/Invoice/' . $sub_directory . $attachmentable_id . '/' . $attachment->file_name;
                                if (File::exists($file_path)) {
                                    File::delete($file_path);
                                }
                                Attachment::where('attachmentable_id', $request->attachmentable_id)->where('attachmentable_type', "App\Models\Payment")->forceDelete();
                            }
                            $path =  storage_path('app/public/attachments/Invoice/' . $sub_directory . $request->attachmentable_id);
                        } else {
                            $path =  storage_path('app/public/attachments/petitions/' . $request->petition_id . '/' . $sub_directory . $request->attachmentable_id);
                        }
                        if (!File::isDirectory($path)) {
                            File::makeDirectory($path, 0777, true, true);
                        }
                        if ($request->attachmentable_type == "App\Models\Payment") {
                            $resizeImage->save(storage_path('app/public/attachments/Invoice/' . $sub_directory . $request->attachmentable_id . '/' . $file_name));
                        } else {
                            $resizeImage->save(storage_path('app/public/attachments/petitions/' . $request->petition_id . '/' . $sub_directory . $request->attachmentable_id . '/' . $file_name));
                        }
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
                        $attachmentable_id = $request->attachmentable_id;
                        $pdf_file_name = "$file_name";
                        $public_path =  public_path();
                        if ($request->attachmentable_type == "App\Models\Payment") {
                            $attachment = Attachment::where('attachmentable_id', $request->attachmentable_id)->where('attachmentable_type', "App\Models\Payment")->first();
                            if ($attachment) {
                                $file_path = $public_path . '/storage/attachments/Invoice/' . $sub_directory . $attachmentable_id . '/' . $attachment->file_name;
                                if (File::exists($file_path)) {
                                    File::delete($file_path);
                                }
                                Attachment::where('attachmentable_id', $request->attachmentable_id)->where('attachmentable_type', "App\Models\Payment")->forceDelete();
                            }
                            $file_path = $file->storeAs('attachments/Invoice/' . $sub_directory . $request->attachmentable_id . '/', $file_name, 'public');
                            Attachment::create(
                                [
                                    'file_name' => $file_name,
                                    'title' => $title,
                                    'attachmentable_type' => $attachmentable_type,
                                    'attachmentable_id' => $attachmentable_id,
                                    'mime_type' => $mime_type,
                                ]
                            );
                        } else {
                            $file_path = $public_path . '/storage/attachments/petitions/' . $request->petition_id  . '/' . $sub_directory . $attachmentable_id . '/original/' . $pdf_file_name;
                            $output_path = $public_path . '/storage/attachments/petitions/' . $request->petition_id . '/'  . $sub_directory . $attachmentable_id;

                            $JobConvertPdfToImages = (new JobConvertPdfToImages($file_path, $output_path, $file_name, $attachmentable_id, $attachmentable_type))->delay(Carbon::now()->addSeconds(20));
                            $this->dispatch($JobConvertPdfToImages);
                        }
                    }
                }

                //SENDING EMAIL VIA QUEUE JOB
                $jobSendEmail = (new SendDocumentUploadEmail($attachmentable_type, $attachmentable_id))->delay(Carbon::now()->addSeconds(50));
                $this->dispatch($jobSendEmail);

                info('--------end ATTCHMENT UPLOADING PROCESS--------');


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
            //return response($request->all(), 403);
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


    public function convertPdftoimages($file_path, $output_path, $file_name, $attachmentable_id, $attachmentable_type)
    {
        info("****************CONVERTING PDF TO IMAGES START**********************");
        /****************CONVERTING PDF TO IMAGES**********************/

        // $file_path contains path of pdf file that is already uploaded on the server.
        try {
            $file_name_without_extention = pathinfo($file_name, PATHINFO_FILENAME); //getting file name without extention
            $im = new Imagick();
            //$im->setResolution(300,300);
            $im->readimage($file_path);
            $num_page = $im->getnumberimages();
            $im->clear();
            $im->destroy();
            info("Total Number Of Pages: $num_page");
            for ($page = 0; $page < $num_page; $page++) {
                $im = new Imagick();
                $im->setResolution(300, 300);
                $im->readimage($file_path . "[$page]");
                $im->setImageFormat('jpeg');
                $generated_jpg_filename = $page . " - " . $file_name_without_extention . '.jpg';
                $im->setImageCompression(imagick::COMPRESSION_JPEG);
                $im->setImageCompressionQuality(100);
                $im->writeImage($output_path . "/" . $generated_jpg_filename);
                $im->clear();
                $im->destroy();

                Attachment::create(
                    [
                        'title' => $generated_jpg_filename,
                        'file_name' => $generated_jpg_filename,
                        'mime_type' => 'jpg',
                        'attachmentable_id' => $attachmentable_id,
                        'attachmentable_type' => $attachmentable_type,
                        'display_order' => $page,
                    ]
                );
            }
        } catch (\Exception $e) {
            info('Message: ' . $e->getMessage());
        }
        /****************CONVERTING PDF TO IMAGES**********************/
        info("****************CONVERTING PDF TO IMAGES END**********************");
        //Deleting PDF File from folder
        info("Deleting PDF File with File Name: " . $file_name);
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
        info("Complete PDF Deletion");
    }
    public function copyIndexFiles($petition_id)
    {
        $petitions = Petition::where('id', $petition_id)->get();

        if ($petitions) {
            foreach ($petitions as $petition) {
                if (!empty($petition->petition_indexes)) {
                    foreach ($petition->petition_indexes as $petition_index) {
                        if (!empty($petition_index->attachments)) {
                            foreach ($petition_index->attachments as $attachment) {
                                if ($attachment) {
                                    $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                                    $to_path =  public_path() . "/storage/attachments/petitions/$petition->id/$folder_name/$attachment->attachmentable_id/$attachment->file_name";
                                    $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                                    if (File::exists($from_path)) {
                                        if (!File::isDirectory(public_path() . "/storage/attachments/petitions/$petition->id/$folder_name/$attachment->attachmentable_id")) {
                                            File::makeDirectory(public_path() . "/storage/attachments/petitions/$petition->id/$folder_name/$attachment->attachmentable_id", 0777, true, true);
                                        }
                                        //return  response($attachment->attachmentable_id, 200);
                                        //File::move(public_path('icon.jpg'), public_path('/new/new.jpg'));

                                        File::move($from_path, $to_path);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copyReplyFiles($parent_reply_id)
    {
        $petition_replies = PetitionReply::where('petition_reply_parent_id', $parent_reply_id)->get();
        if ($petition_replies) {
            foreach ($petition_replies as $reply) {
                if (!empty($reply->attachments)) {
                    foreach ($reply->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $reply->petition_reply_parent->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $reply->petition_reply_parent->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $reply->petition_reply_parent->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::move($from_path, $to_path);
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copyOrderSheetFiles($petition_id)
    {
        $order_sheets = PetitonOrderSheet::where('petition_id', $petition_id)->get();
        //return response($order_sheets);
        if ($order_sheets) {
            foreach ($order_sheets as $order_sheet) {
                if (!empty($order_sheet->attachments)) {
                    foreach ($order_sheet->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $order_sheet->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $order_sheet->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $order_sheet->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::move($from_path, $to_path);
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copyOralArgumentFiles($petition_id)
    {
        $oral_arguments = OralArgument::where('petition_id', $petition_id)->get();

        if ($oral_arguments) {
            foreach ($oral_arguments as $oral_argument) {
                if (!empty($oral_argument->attachments)) {
                    foreach ($oral_argument->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $oral_argument->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $oral_argument->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $oral_argument->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::copy($from_path, $to_path);
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copyNaqalFormFiles($petition_id)
    {
        $naqal_forms = PetitionNaqalForm::where('petition_id', $petition_id)->get();
        if ($naqal_forms) {
            foreach ($naqal_forms as $naqal_form) {
                if (!empty($naqal_form->attachments)) {
                    foreach ($naqal_form->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $naqal_form->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $naqal_form->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $naqal_form->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::copy($from_path, $to_path);
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copyTalbanaFiles($petition_id)
    {
        $talbanas = PetitionTalbana::where('petition_id', $petition_id)->get();
        //return response($talbanas);
        if ($talbanas) {
            foreach ($talbanas as $talbana) {
                if (!empty($talbana->attachments)) {
                    foreach ($talbana->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $talbana->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $talbana->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $talbana->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::copy($from_path, $to_path);
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copyCaseLawFiles($petition_id)
    {
        $case_laws = CaseLaw::where('petition_id', $petition_id)->get();
        if ($case_laws) {
            foreach ($case_laws as $case_law) {
                if (!empty($case_law->attachments)) {
                    foreach ($case_law->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $case_law->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $case_law->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $case_law->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::copy($from_path, $to_path);
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copyExtraDocsFiles($petition_id)
    {
        $extra_docs = ExtraDocument::where('petition_id', $petition_id)->get();
        if ($extra_docs) {
            foreach ($extra_docs as $extra_doc) {
                if (!empty($extra_doc->attachments)) {
                    foreach ($extra_doc->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $extra_doc->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $extra_doc->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $extra_doc->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::copy($from_path, $to_path);
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copySynopsisFiles($petition_id)
    {
        $synopsises = PetitionSynopsis::where('petition_id', $petition_id)->get();

        if ($synopsises) {
            foreach ($synopsises as $synopsis) {
                if (!empty($synopsis->attachments)) {
                    foreach ($synopsis->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $synopsis->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $synopsis->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $synopsis->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::copy($from_path, $to_path);
                            }
                        }
                    }
                }
            }
            return  response("Move all files Successfully", 200);
        }
    }
    public function copyJudgementFiles($petition_id)
    {
        $judgements = Judgement::where('petition_id', $petition_id)->get();
        if ($judgements) {
            foreach ($judgements as $judgement) {
                if (!empty($judgement->attachments)) {
                    foreach ($judgement->attachments as $attachment) {
                        if (!empty($attachment)) {
                            $folder_name = substr($attachment->attachmentable_type, strpos($attachment->attachmentable_type, "'\'") + 11);
                            $to_path =  public_path('storage/attachments/petitions/' . $judgement->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id . '/' . $attachment->file_name);
                            $from_path = public_path() . "/storage/attachments/$attachment->attachmentable_id/$attachment->file_name";
                            if (File::exists($from_path)) {
                                if (!File::isDirectory(public_path('storage/attachments/petitions/' . $judgement->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id))) {
                                    File::makeDirectory(public_path('storage/attachments/petitions/' . $judgement->petition_id . '/' . $folder_name . '/' . $attachment->attachmentable_id), 0777, true, true);
                                }
                                File::copy($from_path, $to_path);
                            }
                        }
                    }
                } else {
                    return response("judgement attachment Not Found", 404);
                }
            }
            return  response("Move all files Successfully", 200);
        } else {
            return response("judgement Not Found", 404);
        }
    }
}
