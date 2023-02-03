<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;

class AuserController extends Controller
{
    public function index(){
        $all_users = DB::table('users')->where('user_type',2)->where('status',0)->get();
        // echo "<pre>";
        // print_r($all_users);exit;
        // echo "</pre>";
        return view('admin.user.users', compact('all_users'));
    }

    public function show($id){
        $show_user = DB::table('users')->where('id',$id)->first();
        return view('admin.user.users_view',compact('show_user'));
    }

    public function update($id){
        $update_user = DB::table('users')->where('id',$id)->first();
        return view('admin.user.users_edit',compact('update_user'));
    }

    public function updtae_detail(Request $request,$id){
           $updtae_detail = DB::table('users')->where('id',$id)->update([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'status'=>$request->status,
            'number'=>$request->number,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
            'company_type'=>$request->company_type,
        ]);
        return Redirect::back()->with('updatesuccess', 'Record updated successfully');
    }
}
