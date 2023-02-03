<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Redirect;
use File;
use Hash;
use DB;
use Mail;
use illuminate\Database\Eloquent\SoftDeletes;
use Twilio\Rest\Client;

use Illuminate\Support\Facades\Session;


class BBuserController extends Controller
{
    public function profile($id){
        $cuser = DB::table('users')->where('id',$id)->first();
        $tasks = DB::table('tsk_detail')->where('user_id',$id)->get();
        //dd($cuser);
        $referal = DB::table('users')->where('r_id',$id)->get();
        $total_refno = count($referal);
        return view('user.profile',compact('cuser','total_refno','tasks'));
    }

    public function profile_update(Request $request,$id){
        //dd($request->all());
        if($request['image'])
        {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $location = 'uploads/user/'.$id;
            $file->move($location,$filename);
            $filepath = url('uploads/'.$filename);
            $user_image = $filename;

            $update = DB::table("users")->where('id',$id)->update([
                'name'=>$request['name'],
                'lastname'=>$request['lastname'],
                'number'=>$request['number'],
                'email'=>$request['email'],
                'gender'=>$request['gender'],
                'image'=>$user_image,
            ]); 
        }
        else
        {
           $update = DB::table("users")->where('id',$id)->update([
                'name'=>$request['name'],
                'lastname'=>$request['lastname'],
                'number'=>$request['number'],
                'email'=>$request['email'],
                'gender'=>$request['gender'],
                'dob'=>$request['dob'],                
            ]); 
        }
        return Redirect::back()->with('success', 'Record updated successfully');
    }

    public function delete_img($id){
        $delete_image = DB::table('users')->select('image','id')->where('id',$id)->first();
        DB::table('users')->where('id',$delete_image->id)->update(['image' => ""]);
       $image_path = public_path("uploads/users/".$delete_image->id) .$delete_image->image;

    if(File::exists($image_path)) {
        File::delete($delete_image->image);
    }
        
        return redirect()->back();
    }

    public function billing_details(Request $request)
    {
        $idi = Auth::user()->id;
        $bill_detailid = DB::table('customer_billing')->where('customer_id',$idi)->first();
        // echo "</pre>";
        // print_r($bill_detailid);
        // echo "</pre>";exit;
        if($bill_detailid){
            $billing_detail = DB::table('customer_billing')
            ->where('id',$bill_detailid->id)
            ->update([
            'customer_id' => $idi,
            'card_number' => $request['card_number'],
            'cvv' => $request['cvv'],
            'expiry' => $request['expiry'],
            'street_address' => $request['txtPlace'],
            'address_line' => $request['address_line'],
            'city_town' => $request['city_town'],
            'zip' => $request['zip'],
            'state' => $request['state'],
            'country' => $request['country'],
        ]);
        }else{
            $billing_detail = DB::table('customer_billing')->insert([
            'card_number' => $request['card_number'],
            'cvv' => $request['cvv'],
            'expiry' => $request['expiry'],
            'street_address' => $request['txtPlace'],
            'address_line' => $request['address_line'],
            'city_town' => $request['city_town'],
            'zip' => $request['zip'],
            'state' => $request['state'],
            'country' => $request['country'],
            ]);        
        }
        
            return redirect()->back()->with('message', 'Billing details updated successfully ');
    }

    public function favorite_provider($pro_id){
        $idi = Auth::user()->id;
        $favorite = DB::table('favorite_provider')->insert([
            'user_id' => $idi,
            'provider_id' => $pro_id,
            'fav' => 1,
        ]);
        return redirect()->back();
    }

    public function delete_favorite($id)
    {
        $delete_fprovider = DB::table('favorite_provider')->where('id', $id)->delete();
        return redirect()->back()->with('messagedeletep', 'Provider remove successfully ');
    }

    public function user_change_pass(Request $request){
        $idi = Auth::user()->id;
        $haspass = Hash::make($request->usernewpass);
        $updatepass = DB::table('users')->where('id', $idi)->update([
            'password' => $haspass,
        ]);
        return redirect()->back()->with('messagechangepass', 'Password changed successfully ');
    }

    public function referralbonus(Request $request){
        $current_user = Auth::id();
        $subject=$request->referralemail;
        $email = $request->referralemail;
        $data = array(
            'referralemail'=>$request->referralemail,
            'referralsubject'=>$request->referralsubject,
            'referralmessage'=>$request->referralmessage,
            'referal_id'=>$current_user,
        );
        Mail::send('frontend.mail.mail', $data, function($message)use($subject) {
        $message->to($subject, 'Registration mail')->subject
        ('Registration mail.');
        $message->from('vinay.k@imarkinfotech.com','BlueBis');

         });
        return redirect('go-to-mail');
    }

    public function change_password(Request $request,$id){

        $cuser = DB::table('users')->where('id',$id)->first();
        $newpass = Hash::make($request->new_pass);
        $oldpass = $cuser->password;

        if ($oldpass == Auth::user()->password) {
            echo "Ok";
            $upd_password = DB::table("users")->where('id',$id)->update([
                'password'=>$newpass,
            ]);
            return back()->with('msg','Enter Currect Password');
        }
        else{
             return back()->withErrors(['message'=>'Record does not exist']);
        } 
    }


    public function insert_task(Request $request)
    {
        $commission = DB::table('bluebis_admin_comm')->where('id',1)->first();
        $req = $request->except('task_des','task_address','task_budget','know','shipping','requstid','_token','datetimes');
        $req_json = json_encode($req);
        $randid = rand(10,1000);
        $task_requestID = 'TASKID'.$randid;
        $admin_com = $request->task_budget*$commission->commission/100;
        
        if($request->hasfile('task_image'))
            {
                foreach($request->file('task_image') as $file)
                {
                    $imagename = $file->getClientOriginalName();
                    $location = 'uploads/task_image';
                    $file->move($location,$imagename);                            
                    $data[] = $imagename;
                }
                $tas=json_encode($data);
            }
            else{
                $tas = '';
            }

        if(Auth::check())
        {

            auth::user()->id;
            if(session()->has('cleaning_radio')){
                //print_r(Session::get('cleaning_radio'));exit;
                $insert = DB::table('tsk_detail')->insertGetId([
                    'user_id'=> Auth::user()->id,
                    'requstid'=> Session::get('requstid'),                
                    'cleaning_radio'=> Session::get('cleaning_radio'),
                    'long_text'=>Session::get('long_text'),
                    'task_des'=> Session::get('task_des'),
                    'task_address'=> Session::get('task_address'),
                    'task_budget'=> Session::get('task_budget'),
                    'admin_com'=> Session::get('admin_com'),
                    'know'=> Session::get('know'),
                    'financing'=> Session::get('financing'),        
                    'datetimes'=> Session::get('datetimes'),
                    'shipping'=> Session::get('shipping'),
                    'task_image'=> Session::get('task_image'),
                    'task_requestID'=> Session::get('task_requestID'),
                    

                ]);
                Session::forget('requstid');
                Session::forget('cleaning_radio');
                Session::forget('long_text');
                Session::forget('task_des');
                Session::forget('task_address');
                Session::forget('task_budget');
                Session::forget('admin_com');                
                Session::forget('know');
                Session::forget('financing');
                Session::forget('datetimes');     
                Session::forget('shipping'); 
                Session::forget('task_image');
                //Session::forget('task_requestID');
            }else{
                $insert = DB::table('tsk_detail')->insertGetId([
                    'user_id'=> Auth::user()->id,
                    'requstid'=> $request->requstid,                
                    'cleaning_radio'=> $request->cleaning_radio,
                    'long_text'=> $req_json,
                    'task_des'=> $request->task_des,
                    'task_address'=> $request->task_address,
                    'task_budget'=> $request->task_budget,
                    'admin_com'=> $admin_com,                    
                    'know'=> $request->know,
                    'financing'=> $request->financing,
                    'datetimes'=> $request->datetimes,
                    'shipping'=> $request->shipping,                
                    'task_image'=> $tas,
                    'task_requestID'=> $task_requestID,
                ]);
            }

            // Mail to admin if task create
            if($insert){
                $id =  Auth::user()->id;
                $task_admin = DB::table('bluebis_emailtemplate')->where('template_slug','task_admin')->first();
                $task_user = DB::table('bluebis_emailtemplate')->where('template_slug','task_user')->first();
                $admin_data = DB::table('users')->where('user_type',1)->first();
                $user_data = DB::table('users')->where('id',$id)->first();

                // To admin
                $subject = 'vinaykgupta04@gmail.com';
                $data = array(
                    'header_text'=>$task_admin->header,
                    'body_text'=>$task_admin->body,
                    'footer_text'=>$task_admin->footer,
                    'name'=>$user_data->name,
                    'lname'=>$user_data->lastname,
                    'email'=>$user_data->email,
                    'request_id'=>Session::get('task_requestID') ? (Session::get('task_requestID')) : ($task_requestID),                    
                    'category'=> Session::get('categoryName') ? (Session::get('categoryName')) : ($request->cleaning_radio),
                    
                );

                Mail::send('frontend.mail.task_admin', $data, function($message)use($subject) {
                    $message->to($subject, 'New task create')->subject('New Task mail');
                    $message->from('vinaykgupta04@gmail.com','BlueBis');
                });

                // To user
                $subject = $user_data->email;
                $data = array(
                    'header_text'=>$task_user->header,
                    'body_text'=>$task_user->body,
                    'footer_text'=>$task_user->footer,
                    'name'=>$user_data->name,
                    'lname'=>$user_data->lastname,
                    'email'=>$user_data->email,                    
                    'request_id'=>Session::get('task_requestID') ? (Session::get('task_requestID')) : ($task_requestID),                    
                    'category'=> Session::get('categoryName') ? (Session::get('categoryName')) : ($request->cleaning_radio), 
                    
                );

                Mail::send('frontend.mail.task_user', $data, function($message)use($subject) {
                    $message->to($subject, 'New task create')->subject('New Task mail');
                    $message->from('vinaykgupta04@gmail.com','BlueBis');
                });
                Session::forget('categoryName');
                Session::forget('task_requestID');
            }
            return redirect('taskc-created-successfuly');
        }
        else
        { 

            Session::put('requstid', $request->requstid);
            Session::put('cleaning_radio', $request->cleaning_radio);
            Session::put('long_text', $req_json);
            Session::put('task_des', $request->task_des);
            Session::put('task_address', $request->task_address);
            Session::put('task_budget', $request->task_budget);
            Session::put('admin_com', $admin_com);            
            Session::put('know', $request->know);
            Session::put('financing', $request->financing); 
            Session::put('datetimes', $request->datetimes);            
            Session::put('shipping', $request->shipping);
            Session::put('task_image', $tas);
            Session::put('task_requestID', $task_requestID);
            Session::put('categoryName', $request->cleaning_radio); // For get category name
            

            Session::put('insert-task_url', request()->fullUrl());
             //echo Session::get(key:'insert-task_url'); exit;
             return redirect('login-account');
         }


          return redirect('taskc-created-successfuly');
          
     }

    public function my_task($id)
    {
        $my_tasks = DB::table('tsk_detail')->where('user_id',$id)
        ->whereNull('requstid')
        ->where('status',0)
        ->get()->toarray();
        $my_assigned_tasks = DB::table('tsk_detail')
        ->where('user_id',$id)
        ->where('tsk_detail.status',0)
        ->whereNotNull('requstid')
        ->join('users','tsk_detail.requstid','=','users.id')->get()->toarray();

        return view('user.my-tasks',compact('my_tasks','my_assigned_tasks'));
    }

    public function cancle_task($id)
    {
        $cancle_task = DB::table('tsk_detail')->where('id',$id)->delete();
        return Redirect::back()->with('canceltask', 'Record updated successfully');
    }

    public function edit_task($id)
    {
        $edit_task = DB::table('tsk_detail')->where('id',$id)->first();
        return view('user.edit-task-detail',compact('edit_task'));
    }

    public function update_task(Request $request, $id)
    {
        //echo $id;exit;
        $update_task = DB::table('tsk_detail')->where('id',$id)->update([
            'cleaning_radio'=> $request->cleaning_radio,
            'qty'=> $request->qty,
            'qty_bath'=> $request->qty_bath,
            'stand_clean_radio'=> $request->stand_clean_radio,
            'cat_radio'=> $request->cat_radio,
            'house_cleaned'=> $request->house_cleaned,
            'hire_radio'=> $request->hire_radio,
            'task_des'=> $request->task_des,
            'task_address'=> $request->task_address,
            'task_budget'=> $request->task_budget,
            'shipping'=> $request->shipping,
        ]);
        return Redirect::back()->with('updatetask', 'Task updated successfully');
    }

    public function tcs()
    {
        return view('user.taskc-created-successfuly');
    }

    public function my_task_detail($id)
    {
        $tasks_detail = DB::table('tsk_detail')->where('id',$id)->first();
        $task_cat_detail = $tasks_detail->cleaning_radio;
        $long_text = $tasks_detail->long_text;
        $long_text_decode = json_decode($long_text, true);
        $get_que = DB::table('admin_task_page')->where('selected_cat',$task_cat_detail)->get();
        
        // echo "<pre>";
        // print_r($long_text_decode);exit;
        // echo "</pre>";
        
        
        $intrested_providers = DB::table('provider_revert')->where('task_id',$id)
        ->join('users','provider_revert.provider_id','=','users.id')
        ->select('users.name as provider_name','users.lastname as provider_lname','users.id as provider_id','users.image as provider_image')->get();
        return view('user.my-task-detail',compact('tasks_detail','intrested_providers','get_que','long_text_decode'));
    }

    public function interested_pro_chat(){
      
        $provider_id = $_GET['provider_id'];
        $task_id = $_GET['task_id'];
        $user_id = Auth::user()->id;

        $tasks_detail = DB::table('tsk_detail')->where('id',$task_id)->first();
        $task_cat_detail = $tasks_detail->cleaning_radio;
        $long_text = $tasks_detail->long_text;
        $long_text_decode = json_decode($long_text, true);
        $get_que = DB::table('admin_task_page')->where('selected_cat',$task_cat_detail)->get();
        // echo "<pre>";
        // print_r($get_que);exit;
        // echo "</pre>";



        $intrested_providers = DB::table('provider_revert')->where('task_id',$task_id)
        ->join('users','provider_revert.provider_id','=','users.id')
        ->select('users.name as provider_name','users.lastname as provider_lname','users.id as provider_id','users.image as provider_image')->get();

        return view('user.interested-provider-chat',compact('tasks_detail','intrested_providers','get_que','long_text_decode'));
    }

    public function otpsendmobile(Request $req){
      $value_data = $_POST['otp_first'].$_POST['otp_second'].$_POST['otp_third'].$_POST['otp_fourth'];
      $user_data = DB::table("veryfy_mobile_no")->where("user_id_data",Auth::user()->id)->where("otp_number",$value_data)->first();
      if(isset($user_data)){
        return  redirect("/");
      }else{
          return back()->with(['successful_message' => 'Please valid otp enter']);
      }

          }
          public function resendotp(Request $req){
            $user['user_id_data'] = Auth::user()->id;
$user['otp_number'] =  rand(1231,7879);
DB::table('veryfy_mobile_no')->insert($user);
 $receiverNumber =  Auth::user()->number;
        $message = "This is otp from Bluebiss ".$user['otp_number'];
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create('+91'.$receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            //dd('SMS Sent Successfully.');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
return back();
          }

    public function report_provider($id){
        $provider_id = $id;
        $customer_id = Auth::user()->id; 
        return view('user.customer_dispute',compact('provider_id'));
    }

    public function cus_dispute(Request $request){
        $customer_id = Auth::user()->id; 
        $dispute = DB::table('bluebis_dispute')->insert([
            'radio'=>$request->radio,
            'dispute_issue'=>$request->dispute_issue,
            'dispute_outcome'=>$request->dispute_outcome,
            'customer_id'=>$customer_id,
            'provider_id'=>$request->provider_id,
            'dispute_from'=>'user',
        ]);
        return redirect()->back()->with('Report', 'Dispute initiated successfully.');  
    }

    public function user_review(Request $request){
        $user_id = Auth::user()->id; 
        $user_email_id = Auth::user()->email; 
        $user_name = Auth::user()->name;
        $user_lastname = Auth::user()->lastname;
        $user_review = DB::table('bluebis_review')->insertGetId([
            'starrating'=>$request->starrating,
            'task_id'=>$request->task_id,
            'user_id'=> $user_id,
            'provider_id'=>$request->provider_id,
            'sender'=>$user_id,
            'recever'=>$request->provider_id,
            'comment'=>$request->user_review_com,
            'eneble'=>'eneble',
            'senderreview'=>'user',
        ]);

        $review_id = $user_review;
        if($review_id){
            $insert_reviewid = DB::table('chat')->insert([
                'review_id'=>$review_id,
                'user_id'=>$user_id,
                'provider_id'=>$request->provider_id,
                'task_id'=>$request->task_id,
                'sender_id'=>$user_id,
                'reciver_id'=>$request->provider_id,
                'user_comment'=>'user_comm',
            ]);
            return redirect()->back();
        }
        
        $signup_data_admin = DB::table('bluebis_emailtemplate')->where('template_slug','review_by_customer')->first();
        if($user_review){
            $subject = $user_email_id;
            $data = array(
                'header_text'=>$signup_data->header,
                'body_text'=>$signup_data->body,
                'footer_text'=>$signup_data->footer,
                'name'=>$user_name,
                'lname'=>$user_lastname,
                );
        Mail::send('frontend.mail.review_by_customer', $data, function($message)use($subject) {
            $message->to($subject, 'Thanks for reviewing!')->subject
            ('Thanks for reviewing!');
            $message->from('vinay.k@imarkinfotech.com','BlueBis');
        });
        }
        return redirect()->back();
    }
      
}
