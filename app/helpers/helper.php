<?php

//uploading files

use App\Models\Attachment;
use App\Models\CaseLaw;
use App\Models\ExtraDocument;
use App\Models\Judgement;
use SebastianBergmann\Environment\Console;
use App\Models\Role;
use App\Models\ModelHasRole;
use App\Models\OralArgument;
use App\Models\PetitionIndex;
use App\Models\PetitionNaqalForm;
use App\Models\PetitionReply;
use App\Models\PetitionSynopsis;
use App\Models\PetitionTalbana;
use App\Models\PetitonOrderSheet;

define('SITE_NAME', 'E Law Firm');
define('ORDER_SHEET', 1);
define('NAQAL_FORM', 2);
define('TALBANA', 3);
define('SYNOPSIS', 4);

function uploadFile($request)
{
    if ($request->file_name) {
        if (Storage::exists($request->root_folder . '/' . $request->file_name)) {
            Storage::move($request->root_folder . '/' . $request->file_name, $request->root_folder . '/' . $request->attachmentable_id . '/' . $request->file_name);
        }
        //moveFile($request->root_folder . '/' . $request->file_name, $request->root_folder . '/' . $request->attachmentable_id . '/' . $request->file_name);
    }
    $attachment = Attachment::updateOrCreate(['id' => $request->attachment_id], [ //attachment id
        'title' => $request->title,
        'file_name' => $request->file_name,
        'comment' => $request->comment,
        'mime_type' => $request->mime_type,
        'attachmentable_id' => $request->attachmentable_id,
        'attachmentable_type' => $request->attachmentable_type,
    ]);

    info("Helpers.php uploadFile Function: File mime_type" . $request->mime_type);

    if ($request->mime_type == "application/pdf") {
        info("****************CONVERTING PDF TO IMAGES START**********************");
        /****************CONVERTING PDF TO IMAGES**********************/
        $attachmentable_id = $request->attachmentable_id;
        $pdf_file_name = "$request->file_name";
        $public_path =  public_path();
        $file_path = "$public_path/storage/attachments/$attachmentable_id/$pdf_file_name";
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

                $im->readimage($file_path . "[$page]");
                $im->setImageFormat('jpeg');
                $generated_jpg_filename = $page . " - " . $request->file_name . '.jpg';
                $im->writeImage($output_path . "/" . $generated_jpg_filename);

                info("converting page: $page DONE");
                $im->clear();
                $im->destroy();

                $attachment = Attachment::updateOrCreate(['id' => $request->attachment_id], [ //attachment id
                    'title' => $generated_jpg_filename,
                    'file_name' => $generated_jpg_filename,
                    'comment' => $request->comment,
                    'mime_type' => 'jpg',
                    'attachmentable_id' => $request->attachmentable_id,
                    'attachmentable_type' => $request->attachmentable_type,
                ]);
            }




            info("conversion done");
        } catch (Exception $e) {
            info('Message: ' . $e->getMessage());
        }
        /****************CONVERTING PDF TO IMAGES**********************/
        info("****************CONVERTING PDF TO IMAGES END**********************");
    }



    return response("Success", 200);
    //$request->file($file_original_name)->storeAs($root .'/' . $attachmentable_id . '/', $fileName);

}

function upload($request)
{
    try {
        if ($request->hasFile($request->file_input_id)) {
            $orignalFile = $request->file($request->file_input_id);
            $fileName = md5(microtime()) . '.' . $orignalFile->getClientOriginalExtension();
            $orignalFile->storeAs($request->root_directory . '/' . $request->id . '/', $fileName);

            return $fileName;
        }
    } catch (\Exception $e) {
        return response()->json('error', $e->getCode());
    }
}

function getRole($id)
{
    $roleName = ModelHasRole::join('roles', 'model_has_roles.role_id', '=', 'roles.id')->select('roles.name as role_name')->where('model_has_roles.model_id', '=', $id)->orderby('roles.name')->first();

    $role = "";

    if (isset($roleName->role_name)) {
        $role = $roleName->role_name;
    }

    return $role;
}

function to_date($date_in_any_format, $with_time = false)
{
    if ($date_in_any_format == "" || $date_in_any_format == "0000-00-00" || $date_in_any_format == "1969-12-31" || $date_in_any_format == "1970-01-01") {
        return "";
    }
    if (config('site.australia_timezone')) {
        if ($date_in_any_format) {
            if ($with_time) {
                return date('d/m/Y h:i a', strtotime($date_in_any_format));
            } else {
                return date('d/m/Y', strtotime($date_in_any_format));
            }
        } else {
            return "";
        }
    } else {
        if ($date_in_any_format) {
            if ($with_time) {
                return date('d/m/Y h:i a', strtotime($date_in_any_format));
            } else {
                return date('d/m/Y', strtotime($date_in_any_format));
            }
        } else {
            return "";
        }
    }
}


function getTypeLabel($productTypeId)
{
    $product = DB::table('products')->whereId($productTypeId)->first();
    if ($product) {
        return $product->name;
    } else {
        return "All";
    }
}

function initialism($str, $as_space = array('-'))
{
    $str = str_replace($as_space, ' ', trim($str));
    $ret = '';
    foreach (explode(' ', $str) as $word) {
        $ret .= strtoupper($word[0]);
    }
    return $ret;
}
function toDBDate($date_in_any_format)
{

    $date = DateTime::createFromFormat('d/m/Y', $date_in_any_format);

    if ($date) {
        return $date->format('Y-m-d');
    } else {
        return null;
    }
}
//Removing Files from Folder.
function removeImage($resized_file_path, $origional_file_path)
{
    if (\File::exists($resized_file_path)) {
        \File::delete($resized_file_path);
    }
    if (\File::exists($origional_file_path)) {
        \File::delete($origional_file_path);
    }
    return true;
}

function getIndexData($attachmentable_type, $attachmentable_id)
{
    switch ($attachmentable_type) {
        case 'App\Models\PetitonOrderSheet':
            $entity_title = "Order Sheet";
            $standard_module = PetitonOrderSheet::find($attachmentable_id);

            break;

        case 'App\Models\PetitionIndex':
            //id22
            $entity_title = "Petition Index";
            $standard_module = PetitionIndex::find($attachmentable_id);

            break;

        case 'App\Models\PetitionReply':
            $entity_title = "Replies";
            $petition_reply = PetitionReply::find($attachmentable_id);
            $standard_module = $petition_reply->petition_reply_parent;
            break;

        case 'App\Models\OralArgument':
            $entity_title = "Oral Argument";
            $standard_module = OralArgument::find($attachmentable_id);

            break;

        case 'App\Models\PetitionNaqalForm':
            $entity_title = "Naqal Form";
            $standard_module = PetitionNaqalForm::find($attachmentable_id);

            break;

        case 'App\Models\PetitionTalbana':
            $entity_title = "Talbana";
            $standard_module = PetitionTalbana::find($attachmentable_id);

            break;

        case 'App\Models\CaseLaw':
            $entity_title = "Case Laws";
            $standard_module = CaseLaw::find($attachmentable_id);

            break;

        case 'App\Models\ExtraDocument':
            $entity_title = "Extra Document";
            $standard_module = ExtraDocument::find($attachmentable_id);

            break;

        case 'App\Models\PetitionSynopsis':
            $entity_title = "Synopsis";
            $standard_module = PetitionSynopsis::find($attachmentable_id);

            break;

        case 'App\Models\Judgement':
            $entity_title = "Judgement";
            $standard_module = Judgement::find($attachmentable_id);

            break;

        default:
            $entity_title = "";
            break;
    }
    return $standard_module;
}
