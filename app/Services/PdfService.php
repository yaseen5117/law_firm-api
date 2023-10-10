<?php

namespace App\Services;

use App\Models\Attachment;
use App\Models\Setting;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;
use Imagick;
use Image;
use PDF;
use File;
use Illuminate\Support\Facades\Log;


class PdfService
{

    function __construct()
    {
    }

    /**
     * This function gets PDF from storage and convert it to images.
     *
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
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
            $page_counter = 1;
            for ($page = 0; $page < $num_page; $page++) {
                //info("converting page $page");
                $im = new Imagick();
                $im->setResolution(300, 300);
                $im->readimage($file_path . "[$page]");
                $generated_jpg_filename = $page . " - " . $file_name_without_extention . '.jpg';
                $im->setImageBackgroundColor('white');

                $im->flattenImages(); // This does not do anything.
                $im->setImageFormat('jpg');
                $im = $im->flattenImages(); // Use this instead.
                $im->setImageCompression(imagick::COMPRESSION_JPEG);
                $im->setImageCompressionQuality(100);
                $im->writeImage($output_path . "/" . $generated_jpg_filename);
                $im->clear();
                $im->destroy();

                //Resizing Image
                $resizeImage = Image::make($output_path . "/" . $generated_jpg_filename);
                $resizeImage->resize(2000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $resizeImage->save($output_path . '/' . $generated_jpg_filename);
                //info("converting page $page: file saved on server");
                Attachment::create(
                    [
                        'title' => $generated_jpg_filename,
                        'file_name' => $generated_jpg_filename,
                        'mime_type' => 'jpg',
                        'attachmentable_id' => $attachmentable_id,
                        'attachmentable_type' => $attachmentable_type,
                        'display_order' => $page_counter,
                    ]
                );
                //info("converting page $page: file saved on database");
                $page_counter++;
            }
        } catch (\Exception $e) {
            info("error in attachmetn controller line : " . __LINE__ . " message: " . $e->getMessage());
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


    /**
     * This function gets images from storage and convert it to PDF.
     *
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function convertImagesToPdf($attachments, $file_path, $downloaded_folder_name, $downloaded_file_name): array
    {
        Log::info("converting images to PDF");
        try {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);
            // Instantiate Dompdf class
            $dompdf = new Dompdf();
            // Load HTML content
            $html = view('layouts.pdf.template', compact('attachments', 'file_path', 'downloaded_file_name'))->render();
            $html = trim($html); // Trim the HTML content
            $html = preg_replace('/\s+/', ' ', $html);
            $dompdf->loadHtml($html);
            // Set paper size and orientation (optional)
            $dompdf->setPaper('A4', 'portrait');
            // Render PDF
            $dompdf->render();
            // Save PDF
            $pdf_file = $downloaded_folder_name . "/" . $downloaded_file_name;
            $output = $dompdf->output();
            $path = storage_path('app/public/' . $downloaded_folder_name);
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $file_saved = file_put_contents(storage_path('app/public/' . $pdf_file), $output);
            if ($file_saved === false) {
                // Log the error or handle it accordingly
                info("Failed to save the PDF file");
                Log::error("Failed to save the PDF file");
                return [
                    'status' => false,
                    'file_url' => "",
                    'message' => "Failed to save the PDF file",
                ];
            }
            $generated_pdf_file_url = url('storage/' . $pdf_file);
            Log::info("GENERATED PDF FILE: {$generated_pdf_file_url}");
            return [
                'status' => true,
                'file_url' => $generated_pdf_file_url,
                'message' => "FILE CREATED SUCCESSFULLY",
            ];
        } catch (Exception $e) {
            Log::error("Failed to save the PDF file {$e->getMessage()}");
            return [
                'status' => false,
                'file_url' => "",
                'message' => "Failed to save the PDF file {$e->getMessage()}",
            ];
        }
    }

    /**
     * This function gets images from storage and convert it to PDF.
     *
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function convertImagesToPdfNew($attachments, $file_path, $downloaded_folder_name, $downloaded_file_name, $petition_id)
    {
        Log::info("converting images to PDF");
        try {
            $html = "";
            foreach ($attachments as $attachment) {
                if ($attachment) {
                    $baseImg = public_path($file_path . $attachment->file_name);
                    $html .= '<img width="100%" src="' . $baseImg . '">';
                }
            }

            // Generate the PDF
            $pdf = PDF::loadHTML($html)->setPaper('A4', 'portrait');

            $time = time();

            // Define the directory to save the PDF
            $directory_to_save = "storage/attachments/downloaded-files/$downloaded_folder_name";

            // Check if the directory exists; if not, create it
            if (!File::isDirectory(public_path($directory_to_save))) {
                File::makeDirectory(public_path($directory_to_save), 0777, true, true);
            }

            $file_name = "$time" . "_" . "$downloaded_file_name";
            // Define the full path to save the PDF file
            $pdf_file_path = public_path("$directory_to_save/$file_name");

            // Save the PDF to the specified path
            $pdf->save($pdf_file_path);
            $file_url = url($directory_to_save . "/" . $file_name);
            return [
                'status' => true,
                'file_url' => $file_url,
                'message' => "PDF created successfully",
            ];
        } catch (Exception $e) {
            Log::error("Failed to save the PDF file {$e->getMessage()}");
            return [
                'status' => false,
                'file_url' => "",
                'message' => "Failed to save the PDF file {$e->getMessage()}",
            ];
        }
    }
}
