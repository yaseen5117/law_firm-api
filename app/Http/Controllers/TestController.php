<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function pdf_to_img()
    {
        $petition_id = 1;
        $pdf_file_name = "pdf-images.pdf";
        $public_path =  public_path();
        $file_path = "$public_path/storage/attachments/$petition_id/$pdf_file_name";
        $output_path = "$public_path/storage/attachments/$petition_id/";
        /****************CONVERTING PDF TO IMAGES**********************/
        try{
            $fileone  = $file_path;
            $im = new Imagick();
            //$im->setResolution(300,300);
            $im->readimage($fileone); 
            $num_page = $im->getnumberimages();
            $im->clear(); 
            $im->destroy(); 
            
            for($page = 0; $page<$num_page ; $page++){
                $im = new Imagick();

                info("converting page: $page");

                $im->readimage($fileone."[$page]"); 
                $im->setImageFormat('jpeg');    
                $im->writeImage($output_path."/".$page ." - " .time().'.jpg'); 
                
                info("converting page: $page DONE");
                $im->clear(); 
                $im->destroy();     
            }




            info("conversion done");
        }catch(Exception $e) {
          info('Message: ' .$e->getMessage());
        }
        /****************CONVERTING PDF TO IMAGES**********************/
    }
}
