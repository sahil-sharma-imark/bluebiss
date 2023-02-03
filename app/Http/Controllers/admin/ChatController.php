<?php

namespace App\Http\Controllers\admin;

use App\Models\Chat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Model\User;


class ChatController extends Controller
{
    public function index()
    {
        //
    }
    
    public function create_chat(Request $request)
    {
        $chat_file = "";
        if($request->hasfile('chat_file'))
                {
                    $file = $request->file('chat_file');
                    $extension = $file->getClientOriginalName();
                    $filename = time().'_'.$extension;
                    $location = 'uploads/Chat_Files';
                    $file->move($location,$filename);
                    $chat_file = $filename;                                       
                }
        $create_chat = DB::table('chat')->insert([            
            'message'=>$request->message,
            'chat_file'=>$chat_file,            
            'user_id'=>$request->user_id,
            'provider_id'=>$request->provider_id,
            'task_id'=>$request->task_id,
            'sender_id'=>$request->user_id,
            'reciver_id'=>$request->provider_id,
        ]);
        return redirect()->back();
    }

    public function request_quote(Request $request)
    {
        $user_id = $request->user_id;
        $provider_id = $request->provider_id;
        $task_id = $request->task_id;


        $des = $request->des;
        $des=json_encode($des);

        $qty = $request->qty;
        $qty=json_encode($qty);

        $unit_price = $request->unit_price;
        $unit_price=json_encode($unit_price);

        $amount = $request->amount;
        $amount=json_encode($amount);

        $discount = $request->discount;
        $total = $request->total;
        $time_duration = $request->time_duration;
        $notes = $request->notes;

        $randid = rand(10,100);


        $insert_quote = DB::table('req_quote')->insertGetId([
            'quote_des'=>$des,
            'quote_qty'=>$qty,
            'quote_unit'=>$unit_price,
            'quote_amount'=>$amount,
            'quote_discount'=>$discount,
            'quote_total'=>$total,
            'time_duration'=>$time_duration,
            'notes'=>$notes,
            'provider_id'=>$provider_id,
            'customer_id'=>$user_id,
            'task_id'=>$task_id,
            'quote_id'=> 'QuoID-'.$randid,
            ]);
        $insertid = $insert_quote;
        if($insertid){
            //echo $user_id;exit;
            $insert_quoteid = DB::table('chat')->insert([
                'req_quoteid'=>$insertid,
                'user_id'=>$user_id,
                'provider_id'=>$provider_id,
                'task_id'=>$task_id,
                'sender_id'=>$provider_id,
                'reciver_id'=>$user_id,
            ]);
            return redirect()->back();
        }
        // echo $insertid;exit;
        // $insert_id = session()->put('usersessionid',$insertid);
        // return Redirect::back();

        

        
    }

    
    
    public function raccept_book()
    {
        $provider_id = $_GET['providerid'];
        $task_id = $_GET['taskid'];
        $user_id = $_GET['userid'];
        $quote_id = $_GET['qid'];

        $quot_amount = DB::table('req_quote')->where('task_id',$task_id)->where('quote_id',$quote_id)->first();

        $insert_quoteid = DB::table('chat')->insert([
                'quote_field'=>'accept',
                'message'=>$quote_id,
                'user_id'=>$user_id,
                'provider_id'=>$provider_id,
                'task_id'=>$task_id,
                'sender_id'=>$user_id,
                'reciver_id'=>$provider_id,
                'quote_amount'=>$quot_amount->quote_total,
            ]);
        return redirect()->back();
    }

    public function reject_quote()
    {
        $provider_id = $_GET['providerid'];
        $task_id = $_GET['taskid'];
        $user_id = $_GET['userid'];
        $quote_id = $_GET['qid'];

        $insert_quoteid = DB::table('chat')->insert([
                'quote_field'=>'reject',
                'message'=>$quote_id,
                'user_id'=>$user_id,
                'provider_id'=>$provider_id,
                'task_id'=>$task_id,
                'sender_id'=>$user_id,
                'reciver_id'=>$provider_id,
            ]);
        return redirect()->back();
    }

    public function update(Request $request, Chat $chat)
    {
        //
    }

    public function destroy(Chat $chat)
    {
        //
    }

     public function schedule_task(Request $request)
    {
        //dd($request);exit;
        $user_id = $request->user_id;
        $provider_id = $request->provider_id;
        $task_id = $request->task_id;

        $schedule_date = $request->schedule_date;
        $schedule_time = $request->schedule_time;
       

        $schedule_randid = rand(10,100);


        $insert_schedule = DB::table('schedule_task')->insertGetId([
            
            'provider_id'=>$provider_id,
            'customer_id'=>$user_id,
            'task_id'=>$task_id,
            'schedule_id'=> 'SchID-'.$schedule_randid,
            'schedule_date'=>$schedule_date,
            'schedule_time'=>$schedule_time,

            ]);
        $scheduleid = $insert_schedule;
        if($scheduleid){
            //echo $user_id;exit;
            $insert_scheduleid = DB::table('chat')->insert([
                'schedule_id'=>$scheduleid,
                'user_id'=>$user_id,
                'provider_id'=>$provider_id,
                'task_id'=>$task_id,
                'sender_id'=>$provider_id,
                'reciver_id'=>$user_id,
                

            ]);
            return redirect()->back();
        }
        // echo $insertid;exit;
        // $insert_id = session()->put('usersessionid',$insertid);
        // return Redirect::back();
    }

    public function accept_schedule()
    {
        $provider_id = $_GET['providerid'];
        $task_id = $_GET['taskid'];
        $user_id = $_GET['userid'];
        $scheduleid = $_GET['sid'];

        $schid = DB::table('schedule_task')->where('task_id',$task_id)->where('id',$scheduleid)->first();

        $insert_quoteid = DB::table('chat')->insert([
                'schedule_field'=>'schedule',
                'message'=>$schid->schedule_id,
                'user_id'=>$user_id,
                'provider_id'=>$provider_id,
                'task_id'=>$task_id,
                'sender_id'=>$user_id,
                'reciver_id'=>$provider_id,
                'schedule_id'=>$scheduleid,
            ]);
        return redirect()->back();
    }

    public function reject_schedule(){
        $provider_id = $_GET['providerid'];
        $task_id = $_GET['taskid'];
        $user_id = $_GET['userid'];
        $scheduleid = $_GET['sid'];

        $schid = DB::table('schedule_task')->where('task_id',$task_id)->where('id',$scheduleid)->first();

        $insert_quoteid = DB::table('chat')->insert([
                'schedule_field'=>'reject',
                'message'=>$schid->schedule_id,
                'user_id'=>$user_id,
                'provider_id'=>$provider_id,
                'task_id'=>$task_id,
                'sender_id'=>$user_id,
                'reciver_id'=>$provider_id,
            ]);
        return redirect()->back();
    }

    public function admin_chat(){
        $get_providers = DB::table('users')->where('as_a','pro')->where('status',0)->get();
        // echo "<pre>";
        // print_r($get_providers);exit;
        return view('admin.chat.add', compact('get_providers'));
    }

    public function select_user(Request $request){
        $provider_id = $request->provider_id;

        $all_users = DB::table('chat')->where('provider_id',$provider_id)
        ->join('users','chat.user_id','=','users.id')->select('user_id','name','lastname')->distinct()->get();
        
        $output ="";
        $output.= '<select class="form-select form-control" name="sub_user" id="sub_user">';
        $output.= '<option>Select User</option>';
        // generate the options for the select
        foreach ($all_users as $all_user) {
            $output.= '<option value="'.$all_user->user_id.'">'.$all_user->name.' '.$all_user->lastname.'</option>';
        }
        // close the select input
        $output.= '</select>';
        return  $output;
    }



    public function select_tasks(Request $request){
        $p_id = $request->p_id;
        $u_id = $request->u_id;
        
        $selected_tasks = DB::table('chat')->select('task_id')->where('provider_id',$p_id)->where('user_id',$u_id)->distinct()->get();
        
        $out ="";
        $out.= '<select class="form-select form-control" name="sub_user" id="tid">';
        $out.= '<option>Select User</option>';
        // generate the options for the select
        foreach ($selected_tasks as $selected_task) {
            $out.= '<option value="'.$selected_task->task_id.'">'.$selected_task->task_id.'</option>';
        }
        // close the select input
        $out.= '</select>';
        return  $out;

    }


    public function getadmin_chat(Request $request){
        $provider_id_value = $request->provider_id_value;
        $user_id_value = $request->user_id_value;
        $task_id_value = $request->task_id_value;

       

        $get_all_chats = DB::table('chat')
        ->where('provider_id',$provider_id_value)
        ->where('user_id',$user_id_value)
        ->where('task_id',$task_id_value)->get();

        return view('admin.chat.chat', compact('get_all_chats','provider_id_value','user_id_value'));


    }

    public function admin_persentage(){
        $get_percentage = DB::table('bluebis_admin_comm')->where('id',1)->select('commission')->first();
        return view('admin.commission.add-commission',compact('get_percentage'));
    }

    public function add_comm(Request $request){
        $update_comm = DB::table('bluebis_admin_comm')->where('id',1)->update(['commission'=>$request->admin_comm,]);
        return Redirect('admin-persentage')->with('Commission', 'Admin commission updated successfully');
    }

    public function resend_quote(Request $request)
    {
        $user_id = $request->user_id;
        $provider_id = $request->provider_id;
        $task_id = $request->task_id;


        $des = $request->des;
        $des=json_encode($des);

        $qty = $request->qty;
        $qty=json_encode($qty);

        $unit_price = $request->unit_price;
        $unit_price=json_encode($unit_price);

        $amount = $request->amount;
        $amount=json_encode($amount);

        $discount = $request->discount;
        $total = $request->total;
        $time_duration = $request->time_duration;
        $notes = $request->notes;

        $randid = rand(10,100);


        $insert_quote = DB::table('req_quote')->insertGetId([
            'quote_des'=>$des,
            'quote_qty'=>$qty,
            'quote_unit'=>$unit_price,
            'quote_amount'=>$amount,
            'quote_discount'=>$discount,
            'quote_total'=>$total,
            'time_duration'=>$time_duration,
            'notes'=>$notes,
            'provider_id'=>$provider_id,
            'customer_id'=>$user_id,
            'task_id'=>$task_id,
            'quote_id'=> 'QuoID-'.$randid,
            ]);
        $insertid = $insert_quote;
        if($insertid){
            //echo $user_id;exit;
            $insert_quoteid = DB::table('chat')->insert([
                'req_quoteid'=>$insertid,
                'user_id'=>$user_id,
                'provider_id'=>$provider_id,
                'task_id'=>$task_id,
                'sender_id'=>$provider_id,
                'reciver_id'=>$user_id,
            ]);
            return redirect()->back();
        }
        // echo $insertid;exit;
        // $insert_id = session()->put('usersessionid',$insertid);
        // return Redirect::back();

        

        
    }
}
