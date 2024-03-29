<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use App\Models\Petition;
use App\Models\PetitionIndex;
use App\Models\PetitonOrderSheet;
use App\Models\PetitionReply;
use App\Services\EmailService;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\SendDocumentUploadEmail;
use App\Models\User;
use App\Services\PdfService;
use Illuminate\Support\Str;
use DB;
use PDF;


class TestController extends Controller
{
    use DispatchesJobs;
    public function pdf_to_img()
    {
        $petition_id = 1;
        $pdf_file_name = "pdf-images.pdf";
        $public_path =  public_path();
        $file_path = "$public_path/storage/attachments/$petition_id/$pdf_file_name";
        $output_path = "$public_path/storage/attachments/$petition_id/";
        /****************CONVERTING PDF TO IMAGES**********************/
        try {
            $fileone  = $file_path;
            $im = new Imagick();
            //$im->setResolution(300,300);
            $im->readimage($fileone);
            $num_page = $im->getnumberimages();
            $im->clear();
            $im->destroy();

            for ($page = 0; $page < $num_page; $page++) {
                $im = new Imagick();

                info("converting page: $page");

                $im->readimage($fileone . "[$page]");
                $im->setImageFormat('jpeg');
                $im->writeImage($output_path . "/" . $page . " - " . time() . '.jpg');

                info("converting page: $page DONE");
                $im->clear();
                $im->destroy();
            }




            info("conversion done");
        } catch (Exception $e) {
            info('Message: ' . $e->getMessage());
        }
        /****************CONVERTING PDF TO IMAGES**********************/
    }

    public function test_send_document_uploading_email()
    {
        $attachmentable_type = "App\Models\PetitonOrderSheet";
        $attachmentable_id = 22;

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

            default:
                $entity_title = "";
                break;
        }


        try {
            $emailService = new EmailService;
            $emailService->send_document_uploading_email($petition, $entity_title);
        } catch (\Exception $e) {
            info(print_r($e->getMessage()));
        }
    }


    public function test_queue()
    {
        $attachmentable_id = 22;
        $attachmentable_type = "App\Models\PetitionIndex";
        $job = (new SendDocumentUploadEmail($attachmentable_type, $attachmentable_id))->delay(Carbon::now()->addSeconds(40));
        $this->dispatch($job);
        dd("done");
    }

    public function generate_slugs()
    {
        $records = DB::table('contracts_and_agreements')->get();
        foreach ($records as $record) {
            DB::table('contracts_and_agreements')->whereId($record->id)->update([
                'slug' => Str::slug($record->title)
            ]);
        }
    }
    public function testCode()
    {
        $petition = Petition::find(167);
        return $petition->petition_standard_title_with_petitioner;
    }

    function testPdfGen($indexId) {
        info(__CLASS__.': downloadSingleIndexAsPdf function started');
        $pdfService = new PdfService;
        $petitionIndex = PetitionIndex::find($indexId);
        $case_no = "abc";

        $attachments = $petitionIndex->attachments;
        $petition_id = $petitionIndex->petition_id;
        $index_id = $petitionIndex->id;
        $index_name = "PetitionIndex";

        $file_path = "storage/attachments/petitions/$petition_id/$index_name/$index_id/";

        $downloaded_folder_name = "petition-indexes-pdf";
        $downloaded_file_name = $case_no . "_" . $index_id . ".pdf";

        return $response = $pdfService->convertImagesToPdfNew($attachments, $file_path, $downloaded_folder_name, $downloaded_file_name);
        info('pdfService convertImagesToPdf function response.'.print_r($response, 1));
        if ($response['status']) {
            return response([
                "file_path" => $response['file_url'],
                "message" => "Downloaded File Saved Successfully."
            ], 200);
        }else{
            return response([
                "file_path" => "",
                "message" => "something went wrong."
            ], 500);
        }


    }
}
