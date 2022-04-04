<?php

//uploading files

use App\Models\Attachment;
use SebastianBergmann\Environment\Console;
use App\Models\Role;
use App\Models\ModelHasRole;

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
    $roleName=ModelHasRole::join('roles','model_has_roles.role_id','=','roles.id')->select('roles.name as role_name')->where('model_has_roles.model_id','=',$id)->orderby('roles.name')->first();
    
    $role = "";   
    
    if(isset($roleName->role_name))
    {
        $role = $roleName->role_name;
    }

    return $role;
}

function to_date($date_in_any_format, $with_time = false) {
        if ($date_in_any_format=="" || $date_in_any_format=="0000-00-00" || $date_in_any_format=="1969-12-31" || $date_in_any_format=="1970-01-01") {
                return "";
        }
        if(config('site.australia_timezone'))
        {
            if ($date_in_any_format) {
                if ($with_time) {
                    return date('d/m/Y h:i a', strtotime($date_in_any_format));
                } else {
                    return date('d/m/Y', strtotime($date_in_any_format));
                }
    
            } else {
                return "";
            }
        }else{
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
