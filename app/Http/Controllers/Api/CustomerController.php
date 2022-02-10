<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            
            $query = User::select('users.*')->with('products.product');


            if (!empty($request->name)) {
                $query->where(DB::raw("CONCAT(TRIM(`first_name`), ' ', TRIM(`last_name`))"), 'LIKE', "%" . $request->name . "%") ;
            }

            if (!empty($request->email)) {
                $query->where('email', 'LIKE', "%" . $request->email . "%") ;
            }

            if (!empty($request->type)) {
                $query->whereHas('products', function ($subQuery) use ($request) {
                    return $subQuery->where('product_id', '=', $request->type);
                });
            }
            
            //$type= getTypeLabel($request->type);
            $type=$request->type;
            $query->orderby('users.id','desc');
            $customers= $query->paginate(25);
            
            return response($customers,200);
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
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
        try {
            User::updateOrCreate(['id'=>$request->user_id],$request->except('_token', 'user_id'));
            return response([
                "success"=>true
            ],200);
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
        }
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
            $customer= User::where('id', $id)->orderby('display_order')->first();
            $customer_products = $customer->products()->with('product')->get(); /// Collection
            $customer_servers = $customer->servers()->with('server')->get(); /// Collection
            $customer_support_services = $customer->supportServices()->with('SupportService')->get(); /// Collection
            return response([
                "customer" => $customer,
                "customer_products" => $customer_products,
                "customer_servers" => $customer_servers,
                "customer_support_services" => $customer_support_services,
            ],200);
        } catch (\Exception $e) {
            return response([
                "error"=>$e->getMessage()
            ],500);
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
        User::findorfail($id)->delete();
        return "Customer deleted successfully!";
    }
}
