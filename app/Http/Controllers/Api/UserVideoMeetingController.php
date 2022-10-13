<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\UserVideoMeeting;
use App\Services\VideoMeetingService;
use Illuminate\Http\Request;

class UserVideoMeetingController extends Controller
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getUserMeeting(Request $request)
    {
        try {
            $user = request()->user();
            $meeting = UserVideoMeeting::where('user_id', $user->id)->first();
            if (!$meeting) {
                $videoMeetingService = new VideoMeetingService();
                $meeting_response = $videoMeetingService->initMeeting();
                dd($meeting_response);
                if ($meeting_response->success) {
                    $meeting_data = $meeting_response->response_data;
                    UserVideoMeeting::create([
                        "user_id"=>$user->id,
                        "host_meeting_iframe"=>$meeting_data->hostRoomUrl,
                        "meeting_id_public"=>$meeting_data->roomUrl,
                        "meeting_expiration"=>$meeting_data->endDate,
                    ]);
                    $meeting = UserVideoMeeting::where('user_id', $user->id)->first();
                }
                
                
            }
            return response(
                [
                    'meeting' => $meeting,
                ],
                200
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
