<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Mail;

class AtaskController extends Controller
{
    public function index(){
        $post_tasks = DB::table('tsk_detail')->whereNull('requstid')->get()->toarray(); 
        $commission = DB::table('bluebis_admin_comm')->where('id',1)->first();          
        return view('admin.task.task',compact('post_tasks','commission'));
    }

    public function request_tasks(){
        $request_tasks = DB::table('tsk_detail')->whereNotNull('requstid')
        ->join('users','tsk_detail.requstid','=','users.id')->get()->toarray();
        return view('admin.task.request-tasks',compact('request_tasks'));
    }

    public function broadcast_task($id){
        $task_broadcat_provider = DB::table('broadcast_ids')->where('sender_id',$id)
        ->join('users','broadcast_ids.provider_id','=','users.id')
        ->join('total_credit','total_credit.provider_id','=','users.id')->get();
        // echo "<pre>";
        // print_r($task_broadcat_provider);exit;
        $broad_task_detail = DB::table('tsk_detail')->where('id',$id)->first();
        $broadcast_providers = DB::table('listed_services')
        ->where('service_name',$broad_task_detail->cleaning_radio)
        ->where('listed_services.status',0)        
        ->join('users','listed_services.lis_providerid','=','users.id')
        ->get();

        $brodcasttble = DB::table('listed_services')->get();
        $user_id_not=[];
        foreach($brodcasttble as $bord_value){
            $bord_user = explode(",",$bord_value->broadcast_task);
            if(in_array($broad_task_detail->id,$bord_user)){
                $user_id_not[] = $bord_value->lis_providerid;
                }
            }

        return view('admin.broadcast.broadcast-task',compact('broad_task_detail','broadcast_providers','user_id_not','task_broadcat_provider'));
    }

    public function broadcast_all(Request $request){
        $get_percentege = DB::table('bluebis_admin_comm')->where('id',1)->select('commission')->first();
        $list_POST = $_POST['list'];
        $usersender_id = $_POST["sender_id"];
        //$task_point = $_POST["task_point"];
        $task_point = $_POST["admin_com"];; // Using formula to find credit points.... 
        $service_type = $_POST["service_type"];

        $liststr = implode(",",$list_POST);

        foreach($list_POST as $list)
        {
            $insert = DB::table('broadcast_ids')->insert([
            'sender_id'=>$usersender_id,
            'provider_id'=>$list,
            'task_point'=>$task_point,
            ]);

            // To providers - Send notification to all providers
            if($insert){
                
                $broadcast_task_data = DB::table('bluebis_emailtemplate')->where('template_slug','broadcast_task')->first();

                $task_data = DB::table('tsk_detail')->where('id',$usersender_id)->first();
                $user_data = DB::table('users')->where('id',$task_data->user_id)->first(); // Use Join
                $provider_data = DB::table('users')->where('id',$list)->first();

                // To providers - when broadcast tast this mail will deliver to povider
                $subject = $provider_data->email;
                $data = array(
                'header_text'=>$broadcast_task_data->header,
                'body_text'=>$broadcast_task_data->body,
                'footer_text'=>$broadcast_task_data->footer,
                'name'=>$user_data->name,
                'lname'=>$user_data->lastname,
                'category'=> $task_data->cleaning_radio,
                'quote_amount'=> $task_data->task_budget,                
                );

                Mail::send('frontend.mail.broadcast_provider', $data, function($message)use($subject) {
                    $message->to($subject, 'Task mail')->subject('New Task mail');
                    $message->from('vinay.k@imarkinfotech.com','BlueBis');
                });
                $insert_data = array(
                    'provider_id'=>$list,
                    'user_id'=>$task_data->user_id,
                    'name'=>$user_data->name,
                    'lname'=>$user_data->lastname,
                    'category'=> $task_data->cleaning_radio,
                    'quote_amount'=> $task_data->task_budget,
                );
                $insert_data = json_encode($insert_data);               
                // To providers - when broadcast tast this is for notification for povider
                $insert_broadcast = DB::table('bluebis_notification')->insert([
                    'notification_data'=>$insert_data,
                    'notification_status'=>0,
                    'notification_type'=>"brodcast_task"
                ]);
            }
        }

        $all_serviceproviders = DB::table('listed_services')->whereIn('lis_providerid',$list_POST)->get();

        foreach($all_serviceproviders as $all_serviceprovider)
        {
            if($all_serviceprovider->broadcast_task>0){
                $arr_user_task_id = $all_serviceprovider->broadcast_task.",".$usersender_id;

            }else{
               $arr_user_task_id = $usersender_id;
            }
        
            $send_providerid = DB::table('listed_services')->where('listing_id',$all_serviceprovider->listing_id)->where('service_name',$service_type)->update([
                'broadcast_task'=>$arr_user_task_id]);
        }
        return Redirect::back();
    }

    public function task_view($id){
        $task = DB::table('tsk_detail')->where('id',$id)->first();
        $long_text = $task->long_text;
        $long_text_decode = json_decode($long_text, true);
        return view('admin.task.task_view', compact('task','long_text_decode'));
    }

    public function task_edit($id){
        $task = DB::table('tsk_detail')->where('id',$id)->first();
        $long_text = $task->long_text;
        $long_text_decode = json_decode($long_text, true);
        return view('admin.task.edit', compact('task','long_text_decode'));
    }

    public function task_update(Request $request, $id){        
        $update_task = DB::table('tsk_detail')->where('id',$id)->update([
            'admin_com'=>$request->admin_com
        ]);
        $query = DB::getQueryLog();
        return Redirect('post-task')->with('task_update', 'Commission update successfully');
    } 

}
