<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AproviderController extends Controller
{
    public function index()
    {
        $providers = DB::table('users')->where('user_type',3)->get();        
        return view('admin.providers',compact('providers'));
    }

    public function show($id)
    {
        $provider = DB::table('users')->where('id',$id)->first();
        return view('admin.provider_edit',compact('provider'));
    }

    // public function edit($id)
    // {
    //     $provider = DB::table('users')->where('id',$id)->first();
    //     return view('admin.provider_edit',compact('provider'));
    // }

    public function update(Request $request)
    {
        
        $update = DB::table("users")->where('id',$request['id'])->update([
            'name'=>$request['name'],
            'lastname'=>$request['lastname'],
            'email'=>$request['email'],
            'status' => $request['status'],
            'number'=>$request['number'],
            'gender'=>$request['gender'],
            'dob'=>$request['dob'],
            'company_type'=>$request['company_type'],            

        ]);
            $arr = array('msg' => 'Users created successfully.', 'status' => true);
    }
    public function insert_rough_provider(){
        echo "<pre>";
        print_r($_POST);
        exit;
    }
}
