<?php

//uploading files

use App\Models\Attachment;
use App\Models\Role;
use App\Models\ModelHasRole;

function uploadFile($request,$title, $file_original_name, $comment, $mime_type, $attachmentable_id, $attachmentable_type, $root)
{

    if (Session::has("file.$file_original_name")) {
        //$request->merge(['file_name' => Session::get('file.petition_document_file')]);
        moveFile($root . '/' . Session::get("file.$file_original_name"), $root . '/' . $attachmentable_id . '/' . Session::get("file.$file_original_name"));
    }
     
    Attachment::updateOrCreate(['id' => $request->id],[//attachment id
        'title' => $title,
        'file_name' => Session::get("file.$file_original_name"),
        'comment' => $comment,
        'mime_type' => $mime_type,
        'attachmentable_id' => $attachmentable_id,
        'attachmentable_type' => $attachmentable_type,
    ]);
    //$request->file($file_original_name)->storeAs($root .'/' . $attachmentable_id . '/', $fileName);

}

function storeFile($orignalFile, $id, $folder)
{
    try {
        $fileName = md5(microtime()) . '.' . $orignalFile->getClientOriginalExtension();
        $orignalFile->storeAs($folder . '/' . $id . '/', $fileName);
        return $fileName;
    } catch (\Throwable $th) {
        return null;
    }
}
function moveFile($from_directory, $to_directory)
{
    if (Storage::exists($from_directory)) {
        Storage::move($from_directory, $to_directory);
    }
}

function upload($request,$root_directory,$file_input_id,$id)
{
    try {
        if ($request->hasFile($file_input_id)) {
            $fileNameToStore = storeFile($request->file($file_input_id), $id, $root_directory);
            Session::put("file.$file_input_id", $fileNameToStore);
        }
    } catch (\Exception $e) {
        return response()->json('error', $e->getCode());
    }
}

function getRole($id)
{
    $roleName=ModelHasRole::join('roles','model_has_roles.role_id','=','roles.id')->select('roles.name as role_name')->where('model_has_roles.model_id','=',$id)->orderby('roles.name')->first();
    
    $role = "";   
    
    if(isset($roleName->role_name))
    {
        $role = $roleName->role_name;
    }

    return $role;
}
