<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Redirect;
use Hash;
use DB;
use File;
use Mail;
use Carbon\Carbon;


class ProviderController extends Controller
{
    public function pro_profile($id){
        $provider = DB::table('users')->where('id',$id)->first(); 
        $review_comment = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->get();
        $sociallink = DB::table('bluebis_socialmedia')->where('provider_id',$id)->first();
       

        $star_5 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',5)->count();
        $star_4 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',4)->count();
        $star_3 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',3)->count();
        $star_2 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',2)->count();
        $star_1 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',1)->count();
        $average = DB::table('bluebis_review')->select('starrating')->where('provider_id',$id)->where('senderreview','user')->avg('starrating');
        $average_rating = round($average, 1);  

        
        if(isset($review_comment)){
            $count_review = count($review_comment);
        }       

        $prov = DB::table('provider_listing')->where('provider_id',$id)
        ->join('users','provider_listing.provider_id', "=" ,'users.id')
        ->select(
            'users.id as id',
            'users.image as image',
            'users.name as name',
            'users.lastname as lastname',
            'users.email as email',
            'provider_listing.provider_id as provider_id',
            'provider_listing.business_name as business_name',
            'provider_listing.business_number as business_number',
            'provider_listing.business_website as business_website',
            'provider_listing.business_email as business_email',
            'provider_listing.description as description',
            'provider_listing.business_date as business_date',
            'provider_listing.n_employees as n_employees',
            'provider_listing.licence_number as licence_number',
            'provider_listing.reg_id_number as reg_id_number',
            'provider_listing.price_per_hour as price_per_hour',
            'provider_listing.loc_address as loc_address',
            'provider_listing.loc_address2 as loc_address2',
            'provider_listing.loc_city as loc_city',
            'provider_listing.loc_state as loc_state',
            'provider_listing.loc_country as loc_country',
            'provider_listing.loc_zip as loc_zip',
            'provider_listing.image as business_image',
            'provider_listing.reimbursement as reimbursement',
            'provider_listing.late_fee as late_fee',
            'provider_listing.money_back as money_back',
            'provider_listing.services_insured as services_insured',
            'provider_listing.identity_document as identity_document',
            'provider_listing.address_proof as address_proof',
            'provider_listing.bus_registration as bus_registration',
            'provider_listing.police_cer as police_cer'
        )
        ->where('provider_listing.provider_id',$provider->id)->first();
        $pro = json_decode($prov->business_image,true);
            if($pro>0)
            {
               $pro = $pro; 
            }else{
                $pro = [];
            }
            return view('provider.provider-profile',compact('provider','pro','prov','review_comment','count_review','average_rating','star_4','star_3','star_2','star_1','star_5','sociallink'));
    }

    public function pro_profile_edit($id){
        $aboutleads = DB::table('broadcast_ids')->where('provider_id',Auth::user()->id)->get();
        if(count($aboutleads) == 0 ){
          $about_leads = 0;
          $un_opends = DB::table('provider_revert')->select('task_id')->where('provider_id',Auth::user()->id)->get();
        $un_open = count($un_opends);
            
        }else{
        $about_leads = count($aboutleads);
        $un_opends = DB::table('provider_revert')->select('task_id')->where('provider_id',Auth::user()->id)->get();
        $un_open = count($un_opends);
    }
        $alldeals = DB::table('deals')->where('deal_providerid',$id)->get();
        $total_deals = count($alldeals);
        $onlive = DB::table('deals')->where('deal_providerid',$id)->where('drafts_status',0)->where('deal_status',0)->get();
        $total_onlive = count($onlive);
        $indraft = DB::table('deals')->where('deal_providerid',$id)->where('drafts_status',1)->get();
        $total_indraft = count($indraft);
        $foradmin = DB::table('deals')->where('deal_providerid',$id)->where('deal_status',1)->where('drafts_status',0)->get();
        $total_foradmin = count($foradmin);
        $social_link = DB::table('bluebis_socialmedia')->where('provider_id',$id)->first();
        





        $edit_provider = DB::table('users')->where('id',$id)->first();
        $all_categories = DB::table('category')->where('cat_status', 0)->orderBy('name','asc')->get();
        $categories = DB::table('sub_category')->where('sub_cat_status', 0)->orderBy('name','asc')->get();
        $company_list = DB::table('company_type')->select('company_name','id')->get();
        $business_profile = DB::table('users')->where('users.id',$id)
        ->join('provider_listing','users.id','=','provider_listing.provider_id')->first();
        $referal = DB::table('users')->where('r_id',$id)->get();
        $total_refno = count($referal); 
        $review_comment = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->get(); 
        if(isset($review_comment)){
            $count_review = count($review_comment);
        }
        $average = DB::table('bluebis_review')->select('starrating')->where('provider_id',$id)->where('senderreview','user')->avg('starrating');
        $average_rating = round($average, 1); 
        return view('provider.provider-edit-profile',compact('edit_provider','company_list','total_refno','business_profile','all_categories','about_leads','un_open','total_deals','total_onlive','total_indraft','total_foradmin','social_link','count_review','average_rating','categories'));
    }

    public function pro_profile_update(Request $request,$id){
        $edit_provider = DB::table('users')->where('id',$id)->first();

        if($request->image){
            $destination = 'uploads/provider/'.$id.'/business_profile/'.$edit_provider->image;

            if($destination)
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $location = 'uploads/provider/'.$id.'/business_profile';
            $file->move($location,$filename);
            $filepath = url('uploads/'.$filename);
            $provider_image = $filename;
        }else{
            $provider_image = $edit_provider->image;            
        }
        $update = DB::table("users")->where('id',$id)->update([
                'name'=>$request['name'],
                'lastname'=>$request['lastname'],
                'number'=>$request['number'],
                'email'=>$request['email'],
                'gender'=>$request['gender'],
                'dob'=>$request['dob'],
                'company_type'=>$request['company_type'],
                'image'=>$provider_image,
            ]); 
        return Redirect::back()->with('success', 'Record updated successfully');
    }

    public function delete_img($id){
        $delete_image = DB::table('users')->select('image','id')
        ->where('id',$id)->first();
        DB::table('users')->where('id',$delete_image->id)
        ->update(['image' => ""]);
        $image_path = public_path("uploads/provider/".$delete_image->id) .$delete_image->image;
        if(File::exists($image_path)) {
            File::delete($delete_image->image);
        }
        return redirect()->back();
    }

    public function add_list(Request $request, $id)
    {

        //dd($request);exit;
        $get_address_detail = DB::table('provider_listing')->where('provider_id',$id)->get();

        $loc_address = $get_address_detail[0]->loc_address;
        $loc_address2 = $get_address_detail[0]->loc_address2;
        $loc_city = $get_address_detail[0]->loc_city;
        $loc_state = $get_address_detail[0]->loc_state;
        $loc_state = $get_address_detail[0]->loc_state;
        $loc_country = $get_address_detail[0]->loc_country;
        $loc_radius = $get_address_detail[0]->loc_radius;
        $loc_zip = $get_address_detail[0]->loc_zip;
        $lat = $get_address_detail[0]->lat;
        $lng = $get_address_detail[0]->lng;

        if($request->list_img){
            $file = $request->file('list_img');
            $extension = $file->getClientOriginalName();            
            $filename = time().'_'.$extension;
            $location = 'uploads/provider/'.$id.'/listing_image';
            $file->move($location,$filename);
            //$filepath = url('uploads/'.$filename);
            $list_img = $filename;

            $add_listing = DB::table("listed_services")->insert([
                'lis_providerid'=>$id,
                'category'=>$request['subject'],
                'service_name'=>$request['title'],
                'service_des'=>$request['list_text'],
                'loc_address'=>$loc_address,
                'loc_address2'=>$loc_address2,
                'loc_city'=>$loc_city,
                'loc_state'=>$loc_state,
                'loc_state'=>$loc_state,
                'loc_country'=>$loc_country,
                'loc_radius'=>$loc_radius,
                'loc_zip'=>$loc_zip,
                'lat'=>$lat,
                'lng'=>$lng,
                'service_image'=>$list_img,
            ]); 
        }else{
            $add_listing = DB::table("listed_services")->insert([
                'lis_providerid'=>$id,
                'service_name'=>$request['title'],
                'service_des'=>$request['list_text'],
                'loc_address'=>$loc_address,
                'loc_address2'=>$loc_address2,
                'loc_city'=>$loc_city,
                'loc_state'=>$loc_state,
                'loc_state'=>$loc_state,
                'loc_country'=>$loc_country,
                'loc_radius'=>$loc_radius,
                'loc_zip'=>$loc_zip,
                'lat'=>$lat,
                'lng'=>$lng,
            ]);
        }
        return redirect()->back();
    }

    public function edit_listing(Request $request, $id){
        //dd($request);exit;
        $provider_id = Auth::user()->id;
        $list = DB::table('listed_services')->where('listing_id',$id)->first();
        //echo $list->service_image;exit();
        if($request->edit_list_img){
            $destination = 'uploads/provider/'.$provider_id.'/listing_image/'.$list->service_image;

            if($destination)
            {
                File::delete($destination);
            }
            $file = $request->file('edit_list_img');
            $extension = $file->getClientOriginalName();            
            $filename = time().'_'.$extension;
            $location = 'uploads/provider/'.$provider_id.'/listing_image';
            $file->move($location,$filename);
            //$filepath = url('uploads/'.$filename);
            $editlist_img = $filename;

            $add_listing = DB::table("listed_services")->where('listing_id',$id)->update([
                
                'service_image'=>$editlist_img,
            ]); 
        }
        return redirect()->back()->with('messageupdate', 'List update successfully ');
    }

    public function pause_listing($id)
    {
        $list_status = DB::table("listed_services")->select('status')->where('listing_id',$id)->get();
        // echo "<pre>";
        // print_r($list_status);exit();
        // echo "</pre>";

        if($list_status[0]->status == 0)
        {
            $pauselist = DB::table("listed_services")->where('listing_id',$id)
            ->update(['status'=>1,]);
        }
        elseif($list_status[0]->status == 1)
        {
            $pauselist = DB::table("listed_services")->where('listing_id',$id)
            ->update(['status'=>0,]);
        }
        
        return redirect()->back()->with('messagestatus', 'Status change successfully ');
    }

    public function list_destroy($id){
        $delete_list = DB::table('listed_services')->where('listing_id', $id)->update(['status'=>1]);
        return redirect()->back()->with('message', 'List deleted successfully ');

    }

    public function pro_paymentdetail(Request $request,$id)
    {
        if(isset($_POST['saveinfo'])){
            $get_proaddress = DB::table('provider_listing')
            ->select('loc_address','loc_address2','loc_city','loc_zip','loc_state','loc_country')
            ->where('provider_id',$id)->get();
            
            $loc_address = $get_proaddress[0]->loc_address;
            $loc_address2 = $get_proaddress[0]->loc_address2;
            $loc_city = $get_proaddress[0]->loc_city;
            $loc_zip = $get_proaddress[0]->loc_zip;
            $loc_state = $get_proaddress[0]->loc_state;
            $loc_country = $get_proaddress[0]->loc_country;

            $insert_propayment = DB::table('provider_billing')->insert([
            'pro_id'=>$id,
            'card_no'=>$request['pro_card_no'],
            'cvv'=>$request['pro_cvv'],
            'expiry'=>$request['pro_expiry'],
            'bank_name'=>$request['pro_bank_name'],
            'account_name'=>$request['pro_account_name'],
            'account_no'=>$request['pro_account_no'],
            'branch_code'=>$request['pro_branch_code'],
            'account_type'=>$request['pro_account_type'],
            'additional_information'=>$request['pro_additional_information'],
            'saveinfo'=>$request['saveinfo'],
            'street_address'=>$loc_address,
            'address_line2'=>$loc_address2,
            'city'=>$loc_city,
            'zip'=>$loc_zip,
            'state'=>$loc_state,
            'country'=>$loc_country,
        ]);
        }else{
            $insert_propayment = DB::table('provider_billing')->insert([
            'pro_id'=>$id,
            'card_no'=>$request['pro_card_no'],
            'cvv'=>$request['pro_cvv'],
            'expiry'=>$request['pro_expiry'],
            'bank_name'=>$request['pro_bank_name'],
            'account_name'=>$request['pro_account_name'],
            'account_no'=>$request['pro_account_no'],
            'branch_code'=>$request['pro_branch_code'],
            'account_type'=>$request['pro_account_type'],
            'additional_information'=>$request['pro_additional_information'],
            'saveinfo'=>$request['saveinfo'],
            'street_address'=>$request['pro_street_address'],
            'address_line2'=>$request['pro_address_line2'],
            'city'=>$request['pro_city'],
            'zip'=>$request['pro_zip'],
            'state'=>$request['pro_state'],
            'country'=>$request['pro_country'],
        ]);
        }
        return redirect()->back()->with('messagebank', 'Payment & billing details added successfully ');
    }

    public function pro_refbonus(Request $request){

        $current_user = Auth::id();
        $subject=$request->pro_refemail;
        $email = $request->pro_refemail;
        $data = array(
            'referralemail'=>$request->pro_refemail,
            'referralsubject'=>$request->pro_refsub,
            'referralmessage'=>$request->refmessage,
            'referal_id'=>$current_user,
        );
        Mail::send('frontend.mail.mail', $data, function($message)use($subject) {
        $message->to($subject, 'Referral Bonus')->subject
        ('Referral Bonus.');
        $message->from('vinay.k@imarkinfotech.com','BlueBis');

         });
        return redirect('go-to-mail');
    }

    public function pro_pass(Request $request, $id){
        $newpass = $request->pro_newpass;
        $newpass = Hash::make($newpass);
        $changepass = DB::table('users')
        ->where('id',$id)
        ->update(['password'=>$newpass,]);
        return redirect()->back()->with('messagepass','Password changed successfully ');
    }

    public function pr()
    {
        $data = [
    ['user_id'=>'Coder 1', 'subject_id'=> 4096],
    ['user_id'=>'Coder 2', 'subject_id'=> 2048],
    //...
];
        
        

      
       $data = json_encode($data,true);
      
        

        $insert = DB::table('pr')->insert([
            'pr'=>$data
        ]);
        if($insert)
        {
            echo "Ok";
        }
    }

    public function provider_account()
    {
        $senderid = array();
        $providerid = auth::user()->id;
        $pro_broadcasts = DB::table('broadcast_ids')->get();

        foreach($pro_broadcasts as $pro_broadcast ){
            $array = explode(',', $pro_broadcast->provider_id);
            if (in_array($providerid, $array)){
                $senderid[]=$pro_broadcast->sender_id;
                //$task_point[]=$pro_broadcast->task_point;
            }
        }

        $broadcasts = DB::table('tsk_detail')->whereIn('tsk_detail.id',$senderid)
        ->join('users','tsk_detail.user_id','=','users.id')
        ->select(
            'tsk_detail.id as task_id',
            'tsk_detail.user_id as user_id',
            'tsk_detail.requstid as requstid',
            'tsk_detail.status as task_status',
            'tsk_detail.cleaning_radio as cleaning_radio',
            'tsk_detail.qty as qty',
            'tsk_detail.qty_bath as qty_bath',
            'tsk_detail.stand_clean_radio as stand_clean_radio',
            'tsk_detail.cat_radio as cat_radio',
            'tsk_detail.house_cleaned as house_cleaned',
            'tsk_detail.hire_radio as hire_radio',
            'tsk_detail.task_image as task_image',
            'tsk_detail.task_des as task_des',
            'tsk_detail.task_address as task_address',
            'tsk_detail.task_budget as task_budget',
            'tsk_detail.know as know',
            'tsk_detail.datetimes as datetimes',
            'tsk_detail.shipping as shipping',
            'tsk_detail.created_at as created_at',
            'tsk_detail.updated_at as updated_at', 
            'users.name as task_username', 
            'users.lastname as task_userlastname', 
            'users.image as task_image',)
        ->get();
        // echo "<pre>";
        // print_r($broadcasts);exit;
        // echo "</pre>";
        $cus_requests = DB::table('tsk_detail')->where('requstid',$providerid)
        ->join('users','tsk_detail.user_id','=','users.id')->get();
        return view('provider.provider-account', compact('cus_requests','broadcasts'));
    }

    public function tasks_detail_provider($id){
        $taskdetail_pro = DB::table('tsk_detail')->where('tsk_detail.id',$id)
        ->join('users','tsk_detail.user_id','=','users.id')
        ->select(
            'tsk_detail.id as task_id',
            'tsk_detail.cleaning_radio as cleaning_radio',
            'tsk_detail.qty as qty',
            'tsk_detail.qty_bath as qty_bath',
            'tsk_detail.stand_clean_radio as stand_clean_radio',
            'tsk_detail.cat_radio as cat_radio',
            'tsk_detail.house_cleaned as house_cleaned',
            'tsk_detail.hire_radio as hire_radio',
            'tsk_detail.task_image as task_image',
            'tsk_detail.task_des as task_des',
            'tsk_detail.task_address as task_address',
            'tsk_detail.task_budget as task_budget',
            'tsk_detail.datetimes as datetimes',
            'tsk_detail.shipping as shipping',
            'tsk_detail.created_at as created_at',
            'tsk_detail.updated_at as updated_at',
            'tsk_detail.task_image as task_image',
            'tsk_detail.long_text as long_text',
            'users.id as user_id',
            'users.name as name',
            'users.lastname as lastname',
            'users.image as user_image',
        )->first();
        $task_cat_detail = $taskdetail_pro->cleaning_radio;
        $get_que = DB::table('admin_task_page')->where('selected_cat',$task_cat_detail)->get();
        $long_text = $taskdetail_pro->long_text;
        $long_text_decode = json_decode($long_text, true);

        $broadcast_status = DB::table('broadcast_ids')->where('sender_id',$id)->where('provider_id',Auth::user()->id)->first();

        $task_images = json_decode($taskdetail_pro->task_image, true);
        
        // echo "<pre>";
        // print_r($broadcast_status);exit;
        // echo "</pre>";
        return view('provider.tasks-detail-provider',compact('taskdetail_pro','broadcast_status','task_images','get_que','long_text_decode'));
    }  

    // public function provider_revert($id){
    //     $provider_id = auth::user()->id;
    //     $task_id = $id;


    //     $insert_revert = DB::table('provider_revert')->insert([
    //         'task_id'=>$task_id,
    //         'provider_id'=>$provider_id,
    //     ]);
    //     return redirect()->back();
    // }

    public function customer_chat()
    {
        $provider_id = Auth::user()->id;
        $user_id = $_GET['user_id'];
        $task_id = $_GET['task_id'];

        $tasks_detail = DB::table('tsk_detail')->where('id',$task_id)->first();
        $task_cat_detail = $tasks_detail->cleaning_radio;
        $long_text = $tasks_detail->long_text;
        $long_text_decode = json_decode($long_text, true);
        $task_images = json_decode($tasks_detail->task_image, true);
        $get_que = DB::table('admin_task_page')->where('selected_cat',$task_cat_detail)->get();
        $customer_detail = DB::table('users')->where('id',$user_id)->first();
        $provider_detail = DB::table('users')->where('id',$provider_id)->first();
        return view('provider.customer-chat',compact('tasks_detail','customer_detail','provider_detail','get_que','long_text_decode','task_images'));
    }

    public function pro_create_chat(Request $request){
        $provider_id = $request->provider_id;
        $user_id = $request->user_id;
        $task_id = $request->task_id;
        $pro_chat_file = "";

        if($request->hasfile('pro_chat_file'))
            {
                $file = $request->file('pro_chat_file');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/Chat_Files';
                $file->move($location,$filename);
                $pro_chat_file = $filename;                                       
            }

        $insert_chat = DB::table('chat')->insert([
            'message'=>$request->msg,
            'chat_file'=>$pro_chat_file,            
            'user_id'=>$request->user_id,
            'provider_id'=>$request->provider_id,
            'task_id'=>$request->task_id,
            'sender_id'=>$request->provider_id,
            'reciver_id'=>$request->user_id,
        ]);
        return redirect()->back();
    }

    public function edit_business_profile($id){
        $business_detail = DB::table('provider_listing')->where('provider_id',$id)->first();
        $user_business_detail = DB::table('users')->where('id',$id)->first();
        $listed_services = DB::table('listed_services')->where('lis_providerid',$id)->get();

        return view('provider.edit-business-profile',compact('business_detail','user_business_detail'));
    }

    public function update_business_profile(Request $request,$id){

        

        if($request->hasfile('work_image'))
            {
                foreach($request->file('work_image') as $file)
                {
                    $imagename = $file->getClientOriginalName();
                    $location = 'uploads/provider/'.$id.'/business';
                    $file->move($location,$imagename);                            
                    $data[] = $imagename;
                }
                $image=json_encode($data);
                $update = DB::table('provider_listing')->where('provider_id',$id)->update(['image'=>$image,]);
                return Redirect::back()->with('business', 'Business profile updated successfully');
            }

        if($request->hasfile('bus_img'))
            {
                $file = $request->file('bus_img');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/provider/'.$id.'/business_profile';
                $file->move($location,$filename);
                $bus_img = $filename;   
                $update = DB::table('provider_listing')->where('provider_id',$id)->update(['bus_img'=>$bus_img,]);
                return Redirect::back()->with('business', 'Business profile updated successfully');                                    
            }

        $update = DB::table('provider_listing')->where('provider_id',$id)->update([
            'company_type'=>$request->company_type,
            'business_name'=>$request->business_name,
            'business_number'=>$request->business_number,
            'business_website'=>$request->business_website,
            'business_email'=>$request->business_email,
            'description'=>$request->description,
            'business_date'=>$request->business_date,
            'n_employees'=>$request->n_employees,
            'licence_number'=>$request->licence_number,
            'reg_id_number'=>$request->reg_id_number,
            'price_per_hour'=>$request->price_per_hour,
            'hours'=>$request->hours,
            'offered_category'=>$request->offered_category,
            'sub_key'=>$request->sub_key,
            'des2'=>$request->des2,
            'loc_address'=>$request->loc_address,
            'loc_address2'=>$request->loc_address2,
            'loc_city'=>$request->loc_city,
            'loc_state'=>$request->loc_state,
            'loc_country'=>$request->loc_country,
            'loc_radius'=>$request->loc_radius,
            'loc_zip'=>$request->loc_zip,
            'lat'=>$request->g_lat,
            'lng'=>$request->g_lng,
        ]);
        return Redirect::back()->with('business', 'Business profile updated successfully');
        //
    }
    
    public function process_broadcast($id){
        $broadcast_pro = DB::table('broadcast_ids')->where('id',$id)->first();
        
        $provider_detail = DB::table('total_credit')->where('provider_id',$broadcast_pro->provider_id)->first();
        

        if($broadcast_pro->task_point<=$provider_detail->total_credit){
            $broadcast_status = DB::table('broadcast_ids')->where('id',$id)->update(['status'=>0]);
            if($broadcast_status){
                $totalredtit = $provider_detail->total_credit-$broadcast_pro->task_point;
                $update_credit = DB::table('total_credit')->where('provider_id',$broadcast_pro->provider_id)->update(['total_credit'=>$totalredtit]);

                $admin_detail = DB::table('users')->where('user_type',1)->select('email')->first();
                $provider_detail = DB::table('users')->where('id',$broadcast_pro->provider_id)->first();
                $task_data = DB::table('tsk_detail')->where('id',$broadcast_pro->sender_id)->first();
                $user_data = DB::table('users')->where('id',$task_data->user_id)->first();

                $redeem_task_data_admin = DB::table('bluebis_emailtemplate')->where('template_slug','redeem_task_data_admin')->first();
                $redeem_task_data_pro = DB::table('bluebis_emailtemplate')->where('template_slug','redeem_task_data_admin')->first();

                // Mail to Admin
                $subject = $admin_detail->email;
                $data = array(
                'header_text'=>$redeem_task_data_admin->header,
                'body_text'=>$redeem_task_data_admin->body,
                'footer_text'=>$redeem_task_data_admin->footer,
                'user_name'=>$user_data->name,
                'user_lastname'=>$user_data->lastname,
                'category'=> $task_data->cleaning_radio,
                'quote_amount'=> $task_data->task_budget,
                'provider_name'=> $provider_detail->name,
                'provider_lastname'=> $provider_detail->lastname,
            );

                Mail::send('frontend.mail.redeem_task_admin', $data, function($message)use($subject) {
                    $message->to($subject, 'Redeem Task')->subject('Redeem Task');
                    $message->from('vinay.k@imarkinfotech.com','BlueBis');
                });

                // User Notification
                $data_for_noti = array(
                    'user_name'=>$user_data->name,
                    'user_lastname'=>$user_data->lastname,
                    'category'=> $task_data->cleaning_radio,
                    'quote_amount'=> $task_data->task_budget,
                    'provider_name'=> $provider_detail->name,
                    'provider_lastname'=> $provider_detail->lastname,
                );

                $insertdata = json_encode($data_for_noti);
                $insert_notification = DB::table('bluebis_notification')->insert([
                    'notification_type'=>'redeem_task',
                    'notification_data'=>$insertdata,
                    'notification_status'=>0
                ]);
                //Mail to Provider
                $subject = $provider_detail->email;
                $data = array(
                'header_text'=>$redeem_task_data_provider->header,
                'body_text'=>$redeem_task_data_provider->body,
                'footer_text'=>$redeem_task_data_provider->footer,
                'user_name'=>$user_data->name,
                'user_lastname'=>$user_data->lastname,
                'category'=> $task_data->cleaning_radio,
                'quote_amount'=> $task_data->task_budget,
                'provider_name'=> $provider_detail->name,
                'provider_lastname'=> $provider_detail->lastname,
                'totalredtit'=>$totalredtit
            );
                Mail::send('frontend.mail.redeem_task_provider', $data, function($message)use($subject) {
                    $message->to($subject, 'Redeem Task')->subject('Redeem Task');
                    $message->from('vinay.k@imarkinfotech.com','BlueBis');
                });
            }
            $revert = DB::table('provider_revert')->insert([
                'task_id'=>$broadcast_pro->sender_id,
                'provider_id'=>Auth::user()->id,
            ]);
            return Redirect::back();
        }else{
            echo "Low Credit";
        }
    }


    public function add_deal(Request $request, $id){
        //dd($request);exit;
        $request->validate([
                'tcdeal' => 'required|string|max:50',                
            ]);
        //dd($request);exit;
        $tit = $request->input('offer_title');
        $offer_title = json_encode($tit);

        $pri = $request->input('offer_price');
        $offer_price = json_encode($pri);

        $disco = $request->input('offer_discount');
        $offer_discount = json_encode($disco);


       
       if($request->details_images)
            {
                foreach($request->file('details_images') as $file)
                {
                    $imagename = $file->getClientOriginalName();
                    $location = 'uploads/provider/detail_image';
                    $file->move($location,$imagename);                            
                    $data[] = $imagename;
                }
                $details_images=json_encode($data);
            }
            else{
                $details_images = '';
            }
        if($request->file('deal_image')){
            $file = $request->file('deal_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/deals';
            $file->move($location,$filename);
            $deal_image = $filename; 
            $insert_deal = DB::table('deals')->insert([
                'deal_providerid'=>$id,
                'dealid'=>$request->deal_cat_id,
                'deal_title'=>$request->input('deal_title'),
                'deal_description'=>$request->input('deal_desc'),                
                'deal_expiry'=>$request->input('deal_expiry'),
                'deal_image'=>$deal_image,                
                'detail_highlight'=>$request->input('detail_highlight'),
                'detail_about'=>$request->input('detail_about'),
                'offer_title'=>$offer_title,
                'offer_price'=>$offer_price,
                'offer_discount'=>$offer_discount,
                'details_images'=>$details_images,
                'drafts_status' =>$request->drafts_status,
                'tcdeal' =>$request->tcdeal,
            ]);
        }else{
            $insert_deal = DB::table('deals')->insert([
                'deal_providerid'=>$id,
                'deal_title'=>$request->input('deal_title'),
                'deal_description'=>$request->input('deal_desc'),
                'deal_mrp'=>$request->input('deal_mrp'),
                'deal_dis'=>$request->input('deal_dis'),
                'deal_expiry'=>$request->input('deal_expiry'),
                'detail_title'=>$request->input('detail_title'),
                'detail_highlight'=>$request->input('detail_highlight'),
                'detail_about'=>$request->input('detail_about'),
                'offer_title'=>$offer_title,
                'offer_price'=>$offer_price,
                'offer_discount'=>$offer_discount,
                'details_images'=>$details_images,
                'drafts_status' =>$request->drafts_status,
                'tcdeal' =>$request->tcdeal,
            ]);
        }
        return redirect()->back()->with('adddeal', 'Deal added successfully ');
    }

    public function deal_detail($id){
        $deal_detail = DB::table('deals')->where('id',$id)->first();
        $all_categories = DB::table('category')->where('cat_status', 0)->get();

        return view('provider.deals-and-discount-detail',compact('deal_detail','all_categories'));
    }

    public function edit_deal(){
      //  
    }

    public function delete_deal($id){
        $provider_id = Auth::user()->id;
        $delete_daeal = DB::table('deals')->where('id',$id)->delete();
        return redirect('provider-edit-profile/'. $provider_id)->with('delete_deal', 'Deal deleted successfully ');
    }

    public function report_customer($id){
        $customer_id = $id;
        $provider_id = Auth::user()->id; 
        return view('frontend.dispute',compact('customer_id'));
    }

    public function dispute(Request $request){
        $provider_id = Auth::user()->id; 
        $dispute = DB::table('bluebis_dispute')->insert([
            'radio'=>$request->radio,
            'dispute_issue'=>$request->dispute_issue,
            'dispute_outcome'=>$request->dispute_outcome,
            'provider_id'=>$provider_id,
            'customer_id'=>$request->customer_id,
            'dispute_from'=>'provider',
        ]);
        return redirect()->back()->with('Report', 'Dispute initiated successfully.');  
    }

    public function update_deal_detail(Request $request, $id){
        $old_img = DB::table('deals')->where('id',$id)->select('deal_image')->first();
        $old_img_multi = DB::table('deals')->where('id',$id)->select('details_images')->first();

        if($request->drafts_status == ''){
            $draft = 0;
        }else{
           $draft =  $request->drafts_status;
        }

        if($request->deal_image == ''){
            $deal_image = $old_img->deal_image;
        }else{
            $file = $request->file('deal_image');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/deals';
            $file->move($location,$filename);
            $deal_image = $filename; 
        }

        if($request->details_images == ''){
            $details_images = $old_img_multi->details_images;
        }else{
            foreach($request->file('details_images') as $file)
            {
                $imagename = $file->getClientOriginalName();
                $location = 'uploads/provider/detail_image';
                $file->move($location,$imagename);                            
                $data[] = $imagename;
            }
            $details_images=json_encode($data);
        }

        $offer_title = json_encode($request->offer_title);
        $offer_price = json_encode($request->offer_price);
        $offer_discount = json_encode($request->offer_discount);

        $insert_deal = DB::table('deals')->where('id',$id)->update([
            'deal_title'=>$request->input('deal_title'),
            'deal_description'=>$request->input('deal_desc'),
            'deal_mrp'=>$request->input('deal_mrp'),
            'deal_dis'=>$request->input('deal_dis'),
            'deal_expiry'=>$request->input('deal_expiry'),
            'deal_image'=>$deal_image,
            'detail_title'=>$request->input('detail_title'),
            'detail_highlight'=>$request->input('detail_highlight'),
            'detail_about'=>$request->input('detail_about'),
            'offer_title'=>$offer_title,
            'offer_price'=>$offer_price,
            'offer_discount'=>$offer_discount,
            'details_images'=>$details_images,
            'drafts_status' =>$draft,
            'tcdeal' =>$request->tcdeal,
            

        ]);
        return Redirect::back()->with('dealupdtae', 'Deal & discount updated successfully');
    }


    public function provider_review(Request $request){
        $provider_id = Auth::user()->id; 
        $provider_review = DB::table('bluebis_review')->insertGetId([
            'starrating'=>$request->starrating,
            'task_id'=>$request->task_id,
            'user_id'=>$request->user_id,
            'provider_id'=>$provider_id,
            'sender'=>$provider_id,
            'recever'=>$request->user_id,
            'comment'=>$request->pro_review_com,
            'senderreview'=>'provider',
        ]);
        
        $review_id = $provider_review;
        if($review_id){
            $insert_reviewid = DB::table('chat')->insert([
                'review_id'=>$review_id,
                'user_id'=>$request->user_id,
                'provider_id'=>$provider_id,
                'task_id'=>$request->task_id,
                'sender_id'=>$provider_id,
                'reciver_id'=>$request->user_id,
                'provider_comment'=>'provider_comm',
            ]);
           
        }
        return redirect()->back();
    }



    public function get_subcat_list(Request $request){
        $post = $request['category_id'];
        $all_subcategory = DB::table('sub_category')->where('name',$post)->first();
        $all_subca = DB::table('sub_category')->where('name',$post)->get();
        $fff = count($all_subca);
        if($fff == 0){
            $rrr = "Not Exit";
            return response()->json(['rrr' => $rrr]);
        }else{

            $all_subcategory_check = DB::table('category')->orderBy('name','asc')->where('show_sub_cat',0)->where('catid',$all_subcategory->id)->get();

        $outputsub ="";
        $outputsub.= '<select class="form-select form-control" name="title" id="test_sub">';
        $outputsub.= '<option>Select Sub category</option>';
        // generate the options for the select
        foreach ($all_subcategory_check as $status) {
            $outputsub.= '<option value="'.$status->name.'">'.$status->name.'</option>';
        }



        // close the select input
        $outputsub.= '</select>';
        $outputsub.= '<p id="show_error" style="display:none; color:red">Sub category already exist.</p>';
        $outputsub.= '<script>
        $(document).ready(function() {
            $("#test_sub").change(function(){
                var sub_cat_id =  this.value;
                $.ajax({
                url: "/check-sub-cat",
                type: "GET",
                data: {
                    sub_cat_name: sub_cat_id
                },
                
                cache: false,
                success: function(outputsub){
                    if(outputsub.msg == "exist"){
                        $("#show_error").show(); 
                        $("#save_sub_cat").prop("disabled", true);
                        }else{
                            $("#show_error").hide(); 
                            $("#save_sub_cat").prop("disabled", false);
                        }
                }
            });
                });
        });</script>';  

         

        return  $outputsub;}  

    }

    // public function get_subcat_list_edit(Request $request){
    //     $post = $request['category_id'];
    //     $all_subcategory = DB::table('sub_category')->where('name',$post)->first();
    //     $all_subcategory_check = DB::table('category')->where('show_sub_cat',0)->where('catid',$all_subcategory->id)->get();

    //     $output_edit ="";
    //     $output_edit.= '<select class="form-select form-control" name="edit_title">';
    //     $output_edit.= '<option>Select Sub category</option>';
    //     // generate the options for the select
    //     foreach ($all_subcategory_check as $status) {
    //         $output_edit.= '<option value="'.$status->name.'">'.$status->name.'</option>';
    //     }
    //     // close the select input
    //     $.= '</select>';     

    //     return  $output_edit;
    // }


    public function get_sub(Request $request){
        $post = $request['catego'];
        $all_subcategory = DB::table('category')->where('catid',$post)->get();
        $outputsub ="";
        $outputsub.= '<div class="form-field mb-0">';
        $outputsub.= '<label>Select sub-category</label>';
        $outputsub.= '<select class="form-select form-control" name="deal_cat_id">';
        $outputsub.= '<option>Select Sub category</option>';
        // generate the options for the select
        foreach ($all_subcategory as $all_subcategory_value) {
            $outputsub.= '<option value="'.$all_subcategory_value->id.'">'.$all_subcategory_value->name.'</option>';
                        
        }



        // close the select input
        $outputsub.= '</select>';
        $outputsub.= '</div>';
        
        

        return  $outputsub;


    }


    public function provider_socialmedia(Request $request, $id){
        $request->validate([
                'facebook' => 'required|url',
                'instagram' => 'required|url',
                'tiktok' => 'required|url',
                // 'youtube' => 'required|url',
                // 'snapchat' => 'required|url',
                // 'pinterest' => 'required|url',
                // 'twitter' => 'required|url',
            ]);

        $check_id = DB::table('bluebis_socialmedia')->where('provider_id',$id)->first();

        if($check_id){
            $update_link = DB::table('bluebis_socialmedia')->where('provider_id',$id)->update([
                'provider_id'=>$id,
                'facebook_link'=>$request->facebook,
                'instagram_link'=>$request->instagram,
                'tiktok_link'=>$request->tiktok,
                // 'youtube_link'=>$request->youtube,
                // 'snapchat_link'=>$request->snapchat,
                // 'pinterest_link'=>$request->pinterest,
                // 'twitter_link'=>$request->twitter,
            ]);

        }else{
            $update_link = DB::table('bluebis_socialmedia')->insert([
                'provider_id'=>$id,
                'facebook_link'=>$request->facebook,
                'instagram_link'=>$request->instagram,
                'tiktok_link'=>$request->tiktok,
                // 'youtube_link'=>$request->youtube,
                // 'snapchat_link'=>$request->snapchat,
                // 'pinterest_link'=>$request->pinterest,
                // 'twitter_link'=>$request->twitter,
            ]);
        }
        return redirect('provider-edit-profile/'.Auth::user()->id);
    }

    public function edit_business_details(Request $request, $id){
        $business_detail = DB::table('provider_listing')->where('provider_id',$id)->first();
        $profile_image = DB::table('users')->where('id',$id)->select('image')->first();

        if($request->hasfile('bus_img')){
                $file = $request->file('bus_img');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/provider/'.$id.'/business_profile';
                $file->move($location,$filename);
                $bus_img = $filename;}
            else{
                $bus_img = $profile_image->image;
            }
        $update_profile_img = DB::table('users')->where('id',$id)->update(['image'=>$bus_img]);

        if($request->hasfile('identity_document')){
                $file = $request->file('identity_document');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/provider/'.$provider_id.'/business_doc';
                $file->move($location,$filename);
                $identity = $filename;
                $identity_array = array("identity_document"=>$identity,"status"=>"1");
                $identity_document = json_encode($identity_array);
            }
            else{
                $identity_document = $business_detail->identity_document;
            }


        if($request->hasfile('address_proof')){
                $file = $request->file('address_proof');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/provider/'.$provider_id.'/business_doc';
                $file->move($location,$filename);
                $address_p = $filename; 
                $add = array("address_proof"=>$address_p,"status"=>"1");
                $address_proof = json_encode($add);
            }
            else{
                $address_proof = $business_detail->address_proof;
            }

        if($request->hasfile('bus_registration')){
                $file = $request->file('bus_registration');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/provider/'.$provider_id.'/business_doc';
                $file->move($location,$filename);
                $bus_r = $filename; 
                $bus_reg = array("bus_registration"=>$bus_r,"status"=>"1");
                $bus_registration = json_encode($bus_reg);
            }
            else{
                $bus_registration = $business_detail->bus_registration;
            }


        if($request->hasfile('police_cer')){
                $file = $request->file('police_cer');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/provider/'.$provider_id.'/business_doc';
                $file->move($location,$filename);
                $pol = $filename; 
                $police_c = array("police_cer"=>$pol,"status"=>"1");
                $police_cer = json_encode($police_c);
            }
            else{
                $police_cer = $business_detail->police_cer;
            }


            $update_user_business_detail = DB::table('users')->where('id', $id)->update(['company_type'=>$request->company_type]);

            $update_business_detail = DB::table('provider_listing')->where('provider_id', $id)->update([
                'business_name'=>$request->business_name,
                'business_number'=>$request->business_number,
                'business_website'=>$request->business_website,
                'business_email'=>$request->business_email,
                'description'=>$request->description,
                'business_date'=>$request->business_date,
                'n_employees'=>$request->n_employees,
                'licence_number'=>$request->licence_number,
                'reg_id_number'=>$request->reg_id_number,
                'price_per_hour'=>$request->price_per_hour,
                'hours'=>$request->hours,
                'loc_address'=>$request->probus_str_add,
                'loc_address2'=>$request->probus_add_lin2,
                'loc_city'=>$request->probus_city,
                'loc_zip'=>$request->probus_zip,
                'loc_state'=>$request->probus_state,
                'loc_country'=>$request->probus_country,
                'lat'=>$request->probus_lat,
                'lng'=>$request->probus_lng,
                'loc_radius'=>$request->loc_radius,
                'reimbursement'=>$request->reimbursement,
                'late_fee'=>$request->late_fee,
                'money_back'=>$request->money_back,
                'services_insured'=>$request->services_insured,
                'identity_document'=>$identity_document,
                'address_proof'=>$address_proof,
                'bus_registration'=>$bus_registration,
                'police_cer'=>$police_cer,
            ]);
        return Redirect('provider-edit-profile/'.$id)->with('business_detail', 'Business Profile updated successfully');
    }

    public function check_sub_cat(){
        $pro_id = Auth::user()->id;
        $sub_cat_name = $_GET['sub_cat_name'];
        $validate_sub_cat = DB::table('listed_services')->where('lis_providerid',$pro_id)->where('service_name', $sub_cat_name)->get();
        $count_validate_sub_cat = count($validate_sub_cat);

        if($count_validate_sub_cat == 0){
            $msg = "Not_exist";
        }else{
            $msg = "exist";
        }
        return response()->json(['msg'=>$msg]);
    }

    public function provider_rofile_customer($id)
    {
        $providerid = $id;
        $pro_profile = DB::table('provider_listing')
                 ->join('users','provider_listing.provider_id', "=" ,'users.id')
                 ->join('listed_services','provider_listing.provider_id', "=" ,'listed_services.lis_providerid')
                 ->where('provider_id',$id)->first();
        $pro_business_image = DB::table('provider_listing')->where('provider_id',$id)->select('image')->first();
        $business_image = $pro_business_image->image;
        if(isset($business_image)){
            $decode_business_image = json_decode($business_image, true);
           // $count_business_image = count($decode_business_image);

        } 

        $review_comment = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->get();
        $sociallink = DB::table('bluebis_socialmedia')->where('provider_id',$id)->first();
       

        $star_5 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',5)->count();
        $star_4 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',4)->count();
        $star_3 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',3)->count();
        $star_2 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',2)->count();
        $star_1 = DB::table('bluebis_review')->where('provider_id',$id)->where('senderreview','user')->where('starrating',1)->count();
        $average = DB::table('bluebis_review')->select('starrating')->where('provider_id',$id)->where('senderreview','user')->avg('starrating');
        $average_rating = round($average, 1);  

        
        if(isset($review_comment)){
            $count_review = count($review_comment);
        }              

        return view('provider.provider-rofile-customer',compact('pro_profile','providerid','decode_business_image','count_review','review_comment','average_rating','star_4','star_3','star_2','star_1','star_5'));
    }

    

    


    
}
