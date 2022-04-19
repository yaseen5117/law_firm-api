<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function contactRequest(Request $request)
    {
        try {
            $contact_request = ContactRequest::Create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                ]
            );
            return response()->json(
                [
                    'message' => 'Contact request saved successfully.',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getContactRequest(Request $request)
    {
        try {
            $contact_requests = ContactRequest::all();
            return response()->json(
                [
                    'contact_requests' => $contact_requests,
                    'message' => 'Contact request List.',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function deleteContactRequest($id)
    {         
        try {             
            $record = ContactRequest::find($id); 
            
            if($record){
                $record->delete();
                return response($record,200);
            }else{
                return response('Data Not Found',404);
            }
            
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
    }
}
