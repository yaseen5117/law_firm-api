<?php

//uploading files

use App\Models\Attachment;
use App\Models\Favourite;
use App\Models\FavouritePost;
use SebastianBergmann\Environment\Console;
use App\Models\Role;
use App\Models\ModelHasRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

function isFavourite($user_id){ 
    if(Auth::user()){
        $isFav = Favourite::where('item_id', $user_id)->where('user_id', request()->user()->id)->first();
    if($isFav){
        return true;
    }else{
        return false;
    }
    } 
}
function isFavouritePost($post_id){ 
    if(Auth::user()){
        $isFavPost = FavouritePost::where('post_id', $post_id)->where('user_id', request()->user()->id)->first();
    if($isFavPost){
        return true;
    }else{
        return false;
    }
    } 
}

function postUserName($user_id){ 
     if($user_id){
         $user = User::find($user_id);
         return $user->surname;
     }
}

function totalFemaleUsers(){
    $totalFemaleUsers = User::where('sex', 0);
    if($totalFemaleUsers){
        return $totalFemaleUsers->count();
    }else{
        return 0;
    }    
}
function totalMaleUsers(){
    $totalMaleUsers = User::where('sex', 1);
    if($totalMaleUsers){
        return $totalMaleUsers->count();
    }else{
        return 0;
    }    
}
function totalRaces(){
    $totalRaces = User::distinct()->get('race_type_id');
    if($totalRaces){
        return $totalRaces->count();
    }else{
        return 0;
    }    
}
function totalCities(){
    $totalCities = User::distinct()->get('city_id');
    if($totalCities){
        return $totalCities->count();
    }else{
        return 0;
    }    
}
function totalMessagesSent(){
    $totalMessagesSent = null;//User::distinct()->get('city_id');
    if($totalMessagesSent){
        return $totalMessagesSent->count();
    }else{
        return 0;
    }    
}

