<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Hash;
use DB;
use File;
use Mail;
use Carbon\Carbon;

class AproviderController extends Controller
{
    public function index()
    {
        $providers = DB::table('users')->where('as_a','pro')
        ->get();        
        return view('admin.providers',compact('providers'));
    }

    public function view_all_to($id)
    {
        $provider_name = DB::table('users')->where('id',$id)->select('name','lastname')->first();
        $all_task_to = DB::table('broadcast_ids')->where('provider_id',$id)
        ->join('tsk_detail','broadcast_ids.sender_id','=','tsk_detail.id')->get()->toArray();
        // echo "<pre>";
        // print_r($all_task_to);exit;      
        return view('admin.provider.all_task_to',compact('all_task_to','provider_name'));
    }

    public function show($id)
    {
        $provider = DB::table('users')->where('id',$id)->first();
        $bus_detail = DB::table('provider_listing')->where('provider_id',$id)->first();
        return view('admin.provider_view',compact('provider','bus_detail'));
    }

    public function edit($id)
    {
        $provider_edit = DB::table('users')->where('id',$id)->first();
        $business_edit = DB::table('provider_listing')->where('provider_id',$id)->first();

        return view('admin.provider_edit',compact('provider_edit','business_edit'));
    }

    public function edit_profile(Request $request, $id)
    {
        //dd($request);exit;
        
        $update = DB::table('users')->where('id',$id)->update([
            'name'=>$request['name'],
            'lastname'=>$request['lastname'],
            'email'=>$request['email'],            
            'number'=>$request['number'],
            'gender'=>$request['gender'],
            'dob'=>$request['dob'],  
            'user_type' => $request['status'],          

        ]);
        if($update){
            $create_credit = DB::table('total_credit')->insert([
                'provider_id'=>$id,
                'total_credit'=>100,
            ]);

        }
        return Redirect::back()->with('success', 'Record updated successfully');
           
    }

    public function business_edit(Request $request, $id){
        //dd($request);exit;
        $business_details = DB::table('provider_listing')->where('provider_id',$id)->first();
        
        if($business_details->identity_document){
            $identity_document = json_decode($business_details->identity_document, true);            
            $identity_document['status'] = $request->identity_doc_status;            
            $identity = json_encode($identity_document);
            $update_identity_document = DB::table('provider_listing')->where('provider_id',$id)->update(['identity_document'=>$identity]);
        }
        if($business_details->address_proof){

          $address_proof = json_decode($business_details->address_proof, true);
          $address_proof['status'] = $request->address_proof_status;
          $address = json_encode($address_proof);
          $update_address_proof = DB::table('provider_listing')->where('provider_id',$id)->update(['address_proof'=>$address]);
            
        }
        if($business_details->bus_registration){
          $bus_registration = json_decode($business_details->bus_registration,true);
          $bus_registration['status'] = $request->bus_registration_status;
          $bus = json_encode($bus_registration);
          $update_bus_registration = DB::table('provider_listing')->where('provider_id',$id)->update(['bus_registration'=>$bus]);
      }
        if($business_details->police_cer){
          $police_cer = json_decode($business_details->police_cer,true);
          $police_cer['status'] = $request->police_cer_status;
          $police = json_encode($police_cer);
          $update_police_cer = DB::table('provider_listing')->where('provider_id',$id)->update(['police_cer'=>$police]);
      }
        return Redirect::back()->with('success', 'Record updated successfully');
    }
    public function insert_rough_provider(){
        echo "<pre>";
        print_r($_POST);
        exit;
    }
}
