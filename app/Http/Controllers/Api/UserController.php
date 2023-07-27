<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Company;
use App\Models\DefaultStudentCase;
use App\Models\Role;
use App\Models\Setting;
use App\Models\StudentCasesAccess;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;
use File;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware("role:admin|staff", ['except' => ['store', 'show', 'destroy', 'getClient', 'getLoggedInUser', 'getRoles', 'signUp', 'getLawyer', 'getClientUsers', 'clientEmail', 'uploadImage']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $query = User::with('roles', 'contact_persons')->excludeContactPersons();
            if ($request->is_approved) {
                if ($request->is_approved < 2) {
                    $query->where("is_approved", $request->is_approved);
                }
            } else {
                $query->where("is_approved", 0);
            }

            $roles = Role::orderBy("name")->get();
            if (!empty($request->name)) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            if (!empty($request->email)) {
                $query->where('email', 'like', '%' . $request->email . '%');
            }
            if (!empty($request->role_id)) {
                $role = Role::find($request->role_id);
                $query->role($role->name);
            }

            $users = $query->where("company_id", $request->user()->company_id)->orderBy("is_approved")->orderBy("name")->paginate(10);

            //$users = User::orderBy("name")->with('roles')->get();
            return response()->json(
                [
                    'users' => $users,
                    'roles' => $roles,
                    'message' => 'All Users',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
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
        /* admin panel account create */
        DB::beginTransaction();
        try {
            if (!$request->user()->hasRole('admin') && !$request->id) {
                return response([
                    "error" => "Unauthorized User!"
                ], 401);
            }



            if (!empty($request->password)) {
                $request->merge([
                    'password' => bcrypt($request->password),
                ]);
            }


            if ($request->id == $request->user()->id || $request->user()->hasRole('admin')) {
                // if($request->id){
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|unique:users,email,' . $request->id,
                    //'password'=>'required'
                ]);
                if ($validator->fails()) {
                    return response()->json(
                        [
                            'validation_error' => $validator->errors(),
                            'error' => "Validation error..!"
                        ],
                        401
                    );
                }

                $file = $request->file('file');

                if ($file) {
                    $name = time() . '_' . $file->getClientOriginalName();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $request->merge([
                        'profile_image' => $file_name
                    ]);
                }

                $request->merge([
                    'company_id' => $request->user()->company_id
                ]);

                    if ($request->company_name) {
                        $request->merge([
                            'site_name' => $request->company_name,
                        ]);
                    } else {
                        $company = Company::find($request->company_id);
                        $request->merge([
                            'site_name' => $company->name,
                        ]);
                    }
                    $setting_data = array(
                        'name' => "General",
                    );

                    $setting = Setting::updateOrCreate(['company_id' => $request->company_id], $setting_data);
                    $setting->setMeta($request->only('site_name'));
                    $setting->save();


                $send_user_approved_mail = false;
                // if ($request->is_approved) {
                if ($request->user()->hasRole('admin') && empty($request->approved_at)) {
                    $request->merge([

                        'approved_at' => now(),
                        'approved_by' => $request->user()->id,
                        'is_approved' => $request->id ? $request->is_approved : 1
                    ]);
                    if($request->is_approved){
                        $send_user_approved_mail = true;
                    }
                     //return response($request->all(), 403);

                } else {
                    $request->merge([
                        'approved_at' => toDBDate($request->approved_at)
                    ]);
                }

                if (!$request->id) {
                    //here we will connect the setting for document approval.
                    $request->merge([
                        'documents_required' => 1
                    ]);
                }

                $user = User::updateOrCreate(['id' => $request->id], $request->except('file', 'created_at_formated_date', 'roles', 'editMode', 'confirm_password', 'role_id', 'contact_persons', 'send_email'));

                if ($request->role_id) {
                    $role = Role::find($request->role_id);
                    $user->roles()->detach();
                    $user->assignRole($role->name);
                    //assign cases to Student User
                    if ($user->hasRole('student')) {
                        $assignCases = $this->assignDefaultCasesToStudent($user);
                    }

                    // if ($user->hasRole('client') || $user->hasRole('lawyer') || $user->hasRole('staff')) {
                    //     $user->update([
                    //         'documents_required' => 1
                    //     ]);
                    // }
                }
                if ($file) {
                    $file_path = $file->storeAs('users/' . $user->id, $name, 'public');
                }

                if (!empty($request->contact_persons)) {
                    foreach ($request->contact_persons as $contact_person) {
                        $already_availabe_contact_person = User::where('email', $contact_person["email"])->where("company_id", $request->user()->company_id)->first();
                        if (empty($already_availabe_contact_person)) {
                            $contact_person['company_id'] = $user->company_id;
                            $contact_person['name'] = $contact_person["name"];
                            $contact_person['email'] = $contact_person["email"];
                            $contact_person['phone'] = $contact_person["phone"];
                            // $contact_person['cnic'] = $contact_person["cnic"];
                            $contact_person['contact_person_parent_id'] = $user->id;
                            $contact_person['password'] = bcrypt("test1234");
                            $contact_person_single = User::updateOrCreate(['id' => @$contact_person['id']], $contact_person);
                            $contact_person_single->assignRole("client");
                        } else {
                            $contact_person['contact_person_parent_id'] = $user->id;
                            $contact_person_single = User::where('id', $already_availabe_contact_person->id)->where("company_id", $request->user()->company_id)->update(['contact_person_parent_id' => $user->id]);
                        }
                    }
                }
                //send mail when user approved
                if(!empty($send_user_approved_mail)){
                    try{
                        $emailService = new EmailService;
                        $emailService->sendUserApprovedEmail($user);
                    }catch (\Exception $e) {
                        info("UserController store Function: Error in sending User Approved emial at Line# ".__line__ .': '. $e->getMessage());
                    }
                }

                //sending email to user
                if ($request->send_email) {
                    try {
                        if (empty($request->company_id)) {
                            $setting = Setting::where('company_id', request()->user()->company_id)->first();
                        }

                        $password = $request->password;
                        $login_url = url("login");
                        $send_email_and_password = true;
                        info("Sending Email to $user->email");
                        $emailService = new EmailService;
                        if ($request->company_id) {
                            if ($user->hasRole('admin')) {
                                $emailService->sendAdminSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password);
                            }
                            if ($user->hasRole('lawyer')) {
                                $emailService->sendLawyerSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password);
                            }
                            if ($user->hasRole('client')) {
                                $emailService->sendClientSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password);
                            }
                        }else{
                            $emailService->sendGeneralSignupEmail($user, $setting, $password, $login_url, $send_email_and_password);
                        }

                    } catch (\Exception $e) {
                        info("Error in User Signup email function: " . $e->getMessage());
                    }
                }
                DB::commit();
                return response(
                    [
                        'user' => $user,
                        "is_admin_user" => $request->user()->hasRole('admin') ? true : false,
                        'status' => 200
                    ]
                );
            } else {
                return response(
                    [
                        'message' => "Unauthenticated User",
                        'status' => 403
                    ]
                );
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
        // [
        //     'name' => $request->name,
        //     'email' => $request->email
        // ]
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::with('roles', 'contact_persons', 'attachment', 'approve_by','required_documents')->where("company_id", request()->user()->company_id)->find($id);

            if ($user) {
                return response()->json(
                    [
                        'user' => $user,
                        'invoice_date' => date('d/m/Y', strtotime("+7 days")),
                        'message' => 'user',
                        'code' => 200
                    ]
                );
            } else {
                return response('User Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
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
        //return response(['message' => 'success update', 'status' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        try {
            $user = User::where("id", $userId)->where("company_id", request()->user()->company_id)->first();

            if ($user) {
                $user->delete();
                return response($user, 200);
            } else {
                return response('User Not Found', 404);
            }
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    //getting petitioners and Opponents
    public function getClient(Request $request)
    {
        try {
            $query = User::query()->where("company_id", $request->user()->company_id)->role('client');
            if (!empty($request->serach_param)) {
                $query->where('name', 'LIKE', "%$request->serach_param%");
            }
            $clients = $query->orderBy("name")->get();
            // $clientUsers = [];
            // foreach($clients as $client){
            //     $clientUsers[] = [
            //         "title"
            //         "label" => $client->name,
            //         "value" =>  $client->id,
            //     ];
            // }
            return response()->json(
                [
                    'clients' => $clients,
                    'message' => 'All Clients',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    //get Client Users
    public function getClientUsers(Request $request)
    {
        try {
            $user = $request->user();
            $clients = null;
            if ($user->hasRole('lawyer')) {
                $clients = DB::table('petitions')->select('users.*')
                    ->join('petition_lawyers', 'petition_lawyers.petition_id', '=', 'petitions.id')
                    ->join('petition_petitioners', 'petition_petitioners.petition_id', '=', 'petitions.id')
                    ->join('users', 'users.id', '=', 'petition_petitioners.petitioner_id')
                    ->get();
            }
            if ($user->hasRole('admin')) {
                $clients = User::role('client')->where("company_id", $user->company_id)->orderBy("name")->get();
            }
            return response()->json(
                [
                    'clients' => $clients,
                    'message' => 'All Clients',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getLawyer()
    {
        try {
            $user = request()->user();
            $lawyers = User::role('lawyer')->where("company_id", $user->company_id)->where("is_approved", 1)->orderBy("name")->get();
            $lawyerUsers = [];
            foreach ($lawyers as $lawyer) {
                $lawyerUsers[] = [
                    'label' => $lawyer->name,
                    'value' =>  $lawyer->id,
                ];
            }
            return response()->json(
                [
                    'lawyers' => $lawyerUsers,
                    'message' => 'All lawyers',
                    'code' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function getLoggedInUser(Request $request)
    {
        $user = User::with('roles', 'required_documents')->find($request->user()->id);
        $user->has_uploaded_required_docs = $user->hasUploadedRequiredDocs();
        return $user;
    }

    /**
     * this function handles frontend user signup
     *
     **/
    public function signUp(Request $request)
    {
        //frontend signup
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users',
            ]);
            if ($validator->fails()) {
                return response()->json(
                    [
                        'validation_error' => $validator->errors(),
                        'error' => "The email has already been taken."
                    ],
                    401
                );
            }

            //initially set is_approved bit to false.
            $request->merge([
                'is_approved' => 0,
                'company_id' => 1
            ]);

            $request->merge([
                'password' => bcrypt($request->password),
            ]);

            $user = User::updateOrCreate(['id' => $request->id], $request->except('file', 'created_at_formated_date', 'roles', 'editMode', 'confirm_password', 'role_name'));

            if ($request->role_name == "PARTNER") {
                $user->assignRole('admin');
            } else if ($request->role_name == "ASSOCIATE" || $request->role_name == "PARALEGAL") {
                $user->assignRole('lawyer');
            } else if ($request->role_name == "CLIENT") {
                $user->assignRole('client');
            } else if ($request->role_name == "STUDENT") {
                $user->assignRole('student');
                $assignCases = $this->assignDefaultCasesToStudent($user);
            }

            try {
                $setting = Setting::getSetting();
                //$setting = Setting::where("company_id", $request->company_id)->first()->getMeta();
                $password = $request->password;
                $login_url = url("login");
                $send_email_and_password = false;
                info("Sending Email to $user->email");
                $emailService = new EmailService;
                if ($user->hasRole('admin')) {
                    $emailService->sendAdminSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password);
                }
                if ($user->hasRole('lawyer')) {
                    $emailService->sendLawyerSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password);
                }
                if ($user->hasRole('client')) {
                    $emailService->sendClientSignUpEmail($user, $setting, $password, $login_url, $send_email_and_password);
                }
                //sending email with user ID to Admin to Verify Account
                info("Sending Email to Site Admin");
                $user_profile_url = $setting['site_url'] . "/users/edit/" . $user->id;
                $emailService->sendEmailToVerifyAccountByAdmin($setting, $user_profile_url);
            } catch (\Exception $e) {
                info("Error in User Signup email function: " . $e->getMessage());
            }
            return response(
                [
                    'user' => $user,
                    'status' => 200
                ]
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getRoles()
    {
        $roles = Role::orderBy("name")->get();
        return response()->json(
            [
                'roles' => $roles,
                'message' => 'roles',
                'code' => 200
            ]
        );
    }
    public function uploadImage(Request $request)
    {
        $files = $request->file('files');
        if ($files) {
            foreach ($files as $key => $file) {
                info("UserController uploadImage Function: File mime_type: " . $file->getClientMimeType());
                $file_name = time() . '_' . $file->getClientOriginalName();
                Attachment::where('attachmentable_type', $request->attachmentable_id)->where('attachmentable_type', 'App\Models\User')->delete();
                $public_path =  public_path();
                $file_path = $public_path . '/storage/attachments/user/' . $request->attachmentable_id;
                if (File::exists($file_path)) {
                    File::deleteDirectory($file_path);
                }
                $file_path = $file->storeAs('attachments/user/' . $request->attachmentable_id . '/', $file_name, 'public');
                $mime_type = $file->getClientMimeType();

                //$file_name = time() . '_' . $file->getClientOriginalName();
                $title = $file_name;
                $attachmentable_type = "App\Models\User";
                $attachmentable_id = $request->attachmentable_id;
                Attachment::updateOrCreate(
                    [
                        'attachmentable_id' => $attachmentable_id,
                        'attachmentable_type' => $attachmentable_type
                    ],
                    [
                        'file_name' => $file_name,
                        'title' => $title,
                        'attachmentable_type' => $attachmentable_type,
                        'attachmentable_id' => $attachmentable_id,
                        'mime_type' => $mime_type,
                    ]
                );
            }
            return response("Uploaded User Profile Image Successfully", 200);
        }
    }
    public function assignDefaultCasesToStudent($user)
    {
        $student_default_cases_ids = DefaultStudentCase::get()->pluck('case_id');
        if ($student_default_cases_ids) {
            $data = [];
            foreach ($student_default_cases_ids as $case_id) {
                $data[] = [
                    'case_id' => $case_id,
                    'user_id' => $user->id,
                ];
            }
            $assignedCases = StudentCasesAccess::insert($data);
            info("Assigned Cases IDs To Student User: " . $student_default_cases_ids);
        }
        return true;
    }
    public function approveOrBlock(Request $request)
    {
        try {
            info($request->user['is_approved']?"Function approveOrBlock: START to approve user":"Function approveOrBlock: START to block user");

            $user = User::where('id',$request->user['id'])->update([
                "is_approved"=> $request->user['is_approved'],
                "approved_at"=> $request->user['is_approved']?now():null,
                "approved_by"=> $request->user['is_approved']?$request->user()->id:null
            ]);

            info($request->user['is_approved']?"Function approveOrBlock: END to approve user":"Function approveOrBlock: END to block user");

            return response([
                "user"=>$user,
                "message"=> $request->user['is_approved']?"User approved successfully":"User Blocked successfully"
            ],200
            );
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }

    }
}
