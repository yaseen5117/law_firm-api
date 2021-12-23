<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\ModelHasRole;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $directory="users.";
    private $title_singular="User";
    private $title_prural="Users";
    private $route_name="users";
    private $model;


    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new User;
    }


    public function index(Request $request)
    {

        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        
        $query = $this->model::where('first_name','Like', '%'.$request->name.'%')->orWhere('last_name','Like', '%'.$request->name.'%');

        if(isset($request->email))
        {
            $query = $query->where('email','Like', '%'.$request->email.'%');
        }

        if(isset($request->phone))
        {
             $query = $query->where('phone','Like', '%'.$request->phone.'%');           
        }
            
        $data['records']=$query->orderby('first_name')->paginate(10);
        
        return view($this->directory."index",$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        $data['directory']=$this->directory;
        $data['roles']=Role::orderby('name')->get();
        
        return view($this->directory."create",$data);
    }

    public function store(Request $request)
    {
        try {
             
            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'email' => 'unique:users,email',
                'role' => 'required',
                'password' => 'required|min:6|max:50',
                'confirm_password' => 'required',
                'password' => 'required_with:confirm_password|same:confirm_password',
                'profile_image_file' => 'required',
                
            ]);             
            $fileName = md5(microtime()) . '.' . $request->file('profile_image_file')->getClientOriginalExtension();
            
            $request->merge([
                'password' => bcrypt($request->password),
                'profile_image' => $fileName
            ]);          

            $record=$this->model::query()->create($request->except('_token','rates','role','profile_image_file','confirm_password'));
            /*$rates_data=[];
            if (count($request->rates)>0) {
                DeliveryPointRate::where('delivery_point_id',$record->id)->delete();
                foreach ($request->rates as $key => $value) {
                    $rates_data['rate_id']=$key;
                    $rates_data['active']=isset($value['active'])?1:0;
                    $rates_data['price']=isset($value['price'])?:0;
                    $rates_data['delivery_point_id']=$record->id;
                    DeliveryPointRate::create($rates_data);
                }
            }*/
            $request->file('profile_image_file')->storeAs('users/' . $record->id . '/', $fileName);
            $record->assignRole($request->role);

            $request->session()->flash('success', 'Created successfully!');
            return response([
                "redirect_url" => url('users')
            ], 200);
            //return redirect(route($this->route_name.".index"));

        } catch (Exception $e) {
            
            $request->session()->flash('error', $e->getMessage());
            
            return redirect(route($this->route_name.".index"));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['directory']=$this->directory;
        $data['title_singular']=$this->title_singular;
        $data['title_prural']=$this->title_prural;
        $data['route_name']=$this->route_name;
        $data['record']=$this->model::find($id);
        $data['roles']=Role::orderby('name')->get();
        $roleName=ModelHasRole::join('roles','model_has_roles.role_id','=','roles.id')->select('roles.name as role_name')->where('model_has_roles.model_id','=',$id)->orderby('roles.name')->first();
        $data['role_name'] = $roleName->role_name;

        return view($this->directory."edit",$data);


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
        $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'role' => 'required',
            ]);           
        
        $record = $this->model::query()->findOrFail($id);
        /*$rates_data=[];
        if (count($request->rates)>0) {
            DeliveryPointRate::where('delivery_point_id',$record->id)->delete();
            foreach ($request->rates as $key => $value) {
                $rates_data['rate_id']=$key;
                $rates_data['active']=isset($value['active'])?1:0;
                $rates_data['price']=$value['price'];
                $rates_data['delivery_point_id']=$record->id;
                DeliveryPointRate::create($rates_data);
            }
        }*/
        $request->merge(['profile_image' => $request->file('profile_image_file') !== null ? storeFile($request->file('profile_image_file'), $id, 'users') : $record->profile_image]);

        try {
            if($request->password){
                request()->validate([
                    'confirm_password' => 'required',
                    'password' => 'required_with:confirm_password|same:confirm_password',
                ]);
                $request->merge(['password' => bcrypt($request->password)]);
                $record->update($request->except('_token', '_method','rates','role','profile_image_file','confirm_password'));
                
            }else{
                $record->update($request->except('_token', '_method','rates','role','profile_image_file','password','confirm_password'));
            }
            if($request->role)
            {
              ModelHasRole::where('model_id','=',$id)->delete();
              $record->assignRole($request->role);
            }

            $request->session()->flash('success', 'Updated successfully!');
            return response([
                "redirect_url" => url('users')
            ], 200);
            //return redirect(route($this->route_name.".index"));
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect(route($this->route_name.".index"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->model::destroy($id);
            return response()->json('success', 200);
        } catch (\Exception $e) {
            return response()->json('error', $e->getCode());
        }
    }

    public function chagneUserStatus(Request $request)
    {
        $user_id = $request->user_id;
        $status = $request->status;
        $record = $this->model::find($user_id);
        $record->approval_status = $status;
        $record->save();
        
        return response([
                "message" => "Status updated successfully..",
                "status" => true
            ], 200);
    }
}
