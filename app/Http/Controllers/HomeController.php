<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Favourite;
use App\Models\Province;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::paginate(4);         
        $query = "SELECT *, COUNT(favourites.item_id) as likeCount from users INNER JOIN favourites ON users.id = favourites.item_id GROUP BY favourites.item_id ORDER BY COUNT(DISTINCT favourites.item_id) LIMIT 5";
        $popular_users = DB::select($query);
         
        $query = "SELECT *, COUNT(favourite_posts.post_id) as postLikeCount from posts INNER JOIN favourite_posts ON posts.id = favourite_posts.post_id JOIN users ON users.id = posts.user_id GROUP BY favourite_posts.post_id ORDER BY COUNT(DISTINCT favourite_posts.post_id) LIMIT 6";
        $popular_posts = DB::select($query);
        //dd($popular_posts);
        $regions = Region::all();
        $provinces = Province::all();
        $cities = City::all();
        //dd($popular_users);
        return view('home', compact('users','popular_users','regions','provinces','cities','popular_posts'));
    }
    public function member(Request $request)
    {
        $query = User::query();
        //dd($query);
        if ($request->surname != "") {
            $query->where('surname', $request->surname);
        }
        if ($request->region_id != "") {
            $query->where('region_id', $request->region_id);
        }
        if ($request->province_id != "") {
            $query->where('province_id', $request->province_id);
        }
        if ($request->city_id != "") {
            $query->where('city_id', $request->city_id);
        }
        if ($request->sex != "") {
            $query->where('sex', $request->sex);
        }
        if ($request->pedigree != "") {
            $query->where('pedigree', $request->pedigree);
        }
        if ($request->to_age != "" && $request->from_age != "") {
            $query->whereBetween('age_month', [$request->from_age, $request->to_age]);
            $query->whereBetween('age_year', [$request->from_age, $request->to_age]);
        }
        $users = $query->paginate(10);
        return view('users.member', compact('users'));
    }
    public function province(Request $request)
    {
        $data = Province::select('title', 'id')->where('region_id', $request->region_id)->orderBy('title')->get();
        return response()->json($data);
    }
    public function city(Request $request)
    {
        $data = City::select('title', 'id')->where('province_id', $request->province_id)->orderBy('title')->get();
        return response()->json($data);
    }
    public function validateuseremail(Request $request)
    {
        $user = User::where('email', $request->email)->first('email');
        if ($user) {
            $return =  false;
        } else {
            $return = true;
        }
        echo json_encode($return);
        exit;
    }
     
}
