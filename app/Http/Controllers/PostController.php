<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\FavouritePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        try {
            $file = $request->file('file');
            if ($file) {
                  
                    $name = time() . '_' . $file->getClientOriginalName();
                    $file_path = $file->storeAs('posts/' . $request->user_id, $name, 'public');
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    
                    Post::create([
                        'file_name' => $file_name,  
                        'user_id' => $request->user_id                      
                    ]);                 

                return response()->json([
                    'success' => 'Files uploaded successfully.',
                    'redirect_url' => '/dashboard',
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function favouritePost(Request $request)
    {
        if(Auth::user()){
            $user = $request->user();
        $isFavourite = FavouritePost::where('post_id', $request->post_id)->where('user_id', $user->id)->first();
        if($isFavourite){
            $isFavourite->delete();
            return response([
                'token' => 1,
            ]);
        }else{
            $favourite_post = FavouritePost::create([
                'post_id' => $request->post_id,
                'user_id' => $user->id,
            ]);
            return response([
                'favourite' => $favourite_post,
                'message' => 'Successfully become Post Favourite',
                'token' => 0,
                'status' => 200
            ]);
        } 
        }else{
            return response([
                "redirect_url" => url('login')
            ],200);
        }
    }
}
