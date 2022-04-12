<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogType;
use App\Models\Region;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    public function showRegistrationForm()
    {
        //$roles = Role::all();
        $regions = Region::all();
        $race_types = DogType::all();
        $cities = [];
        $provinces = [];
        return view("auth.register",compact("regions","cities","provinces","race_types"));//, compact("roles")
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_image_file' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $fileName = null;
        if($data['profile_image_file']){
            $fileName = md5(microtime()) . '.' . $data['profile_image_file']->getClientOriginalExtension();
        }
        
        $record = User::create([
            'owner_name' => $data['owner_name'],
            'surname' => $data['surname'],
            'dob' => $data['dob'],
            
            'province_id' => $data['province_id'],
            'region_id' => $data['region_id'],
            'city_id' => $data['city_id'],
            'sex' => $data['sex'],             
            'age_month' => $data['age_month'],

            'age_year' => $data['age_year'],
            'race_type_id' => $data['race_type_id'],
            'relation_race' => $data['relation_race'],
            'pedigree' => $data['pedigree'],
            'particular_detail' => $data['particular_detail'],

            'owner_detail' => $data['owner_detail'],
            'dog_detail' => $data['dog_detail'],
            'approval_status' => 1,
           
            'dog_name' => $data['dog_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_image' => $fileName,

        ]);

        //$record->assignRole($data['role']);

        $data['profile_image_file']->storeAs('users/' . $record->id . '/', $fileName);
        
        return $record;
    }
    public function register(Request $request)
    {
        //$this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        
        return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
    }
}
