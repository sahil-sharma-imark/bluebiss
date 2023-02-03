<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Home;
use App\Models\User;
use Hash;
use Response;
use Session;
use DB;
use Mail;
use File;

class HomeController extends Controller
{
    public function index(){
        $services = DB::table('sub_category')->where('show_desk',0)->where('sub_cat_status',0)->get();
        $sub_category_show = DB::table('category')->where('show_sub_cat',0)->where('cat_status',0)->get();
        $popular_cat = DB::table('category')->where('show_pop_cat',0)->where('cat_status',0)->get();

        $how_it_work = DB::table('bluebis_how_it_work')->where('how_it_work_status',0)->get();
        $testimonials_all = DB::table('bluebis_testimonials')->where('testimonials_status',0)->get();
        $rightprice_all = DB::table('bluebis_rightprice')->where('rightprice_desktop',0)->where('rightprice_status',0)->get();
        $headertop_all = DB::table('bluebis_home_top')->where('header_top_status',0)->get();
        $homepahe_first = DB::table('bluebis_admin_home')->where('id',1)->first();
        $aboutus_first = DB::table('bluebis_admin_aboutus')->where('id',1)->first();


        //dd($services);
        return view('frontend.home',compact('services','sub_category_show','how_it_work','testimonials_all','rightprice_all','homepahe_first','aboutus_first','headertop_all','popular_cat'));
    }

    public function become_provider(){
        return view('frontend.become-provider');        
    }

    public function create_provider_account(Request $request){
        $valid_email = DB::table('users')->where('email',$request->email)->first();
        $all_category = DB::table('sub_category')->where('sub_cat_status',0)->get();

        //dd($valid_email); exit();
        if($valid_email)
        {
            return view('frontend.register-user');
        }else{

            $request_data = array(
            'name'=>$request['name'],
            'lastname'=>$request['lastname'],
            'email'=>$request['email'],
            'number'=>$request['number'],
            'password'=>$request['password'],
        );

        $insert = DB::table('users')->insertGetId([
            'name'=>$request['name'],
            'lastname'=>$request['lastname'],       
            'email'=>$request['email'],     
            'number'=>$request['number'],
            'as_a'=>"pro",        

            'password'=>Hash::make($request['password'])
            ]);        
            $insertid = $insert;
            $userision = session()->put('usersessionid',$insertid);
            return view('frontend.business-detail',compact('all_category'));
        }
    }

    public function bus_details(){
       //dd($request);exit;
        // $testsub = [];
        // $testsub = $request->sub;
        // foreach($testsub as $test){
        // $insert = DB::table('test_detail')->insert(['sub'=>$test]);
        // }

        return view('frontend.bus');
    }

    public function business_details(Request $request){
        if(session('usersessionid')){
            $provider_id = session('usersessionid');
            $image='';
            $bus_img = '';
            if($request->hasfile('work_image')){
                foreach($request->file('work_image') as $file){
                    $imagename = $file->getClientOriginalName();
                    $location = 'uploads/provider/'.$provider_id.'/business';
                    $file->move($location,$imagename);                            
                    $data[] = $imagename;
                }
                $image=json_encode($data);
            }
            else{
                $image = '';
            }

            if($request->hasfile('bus_img')){
                $file = $request->file('bus_img');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/provider/'.$provider_id.'/business_profile';
                $file->move($location,$filename);
                $bus_img = $filename; 
                $insert_profile_img = DB::table('users')->where('id',$provider_id)->update(['image'=>$bus_img]);
            }

            if($request->company_type){
                $insert_company_type = DB::table('users')->where('id',$provider_id)->update(['company_type'=>$request->company_type]);
            }

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
                $identity_document = '';
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
                $address_proof = '';
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
                $bus_registration = '';
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
                $police_cer = '';
            }

            $insert = DB::table('provider_listing')->insert([
                'provider_id'=>session('usersessionid'),
                'business_name'=>$request['business_name'],
                'business_number'=>$request['business_number'],
                'business_website'=>$request['business_website'],
                'business_email'=>$request['business_email'],
                'description'=>$request['description'],            
                'business_date'=>$request['business_date'],
                'n_employees'=>$request['n_employees'],
                'licence_number'=>$request['licence_number'],
                'reg_id_number'=>$request['reg_id_number'],
                'price_per_hour'=>$request['price_per_hour'],
                'hours'=>$request['hours'],
                'offered_category'=>$request['offered_category'],
                'des2'=>$request['des2'],
                'loc_address'=>$request['probus_str_add'],
                'loc_address2'=>$request['probus_add_lin2'],
                'loc_city'=>$request['probus_city'],
                'loc_zip'=>$request['probus_zip'],
                'loc_state'=>$request['probus_state'],
                'loc_country'=>$request['probus_country'],
                'lat' => $request['probus_lat'],
                'lng' => $request['probus_lng'],
                'loc_radius' => $request['loc_radius'],
                'image' => $image,
                'reimbursement' => $request['reimbursement'],
                'late_fee' => $request['late_fee'],
                'money_back' => $request['money_back'],
                'services_insured' => $request['services_insured'],
                'identity_document' => $identity_document,
                'address_proof' => $address_proof,
                'bus_registration' => $bus_registration,
                'police_cer' => $police_cer,
            ]);

            $subcat = [];
            $subcat = $request->sub_key;
            foreach($subcat as $sub){
                $insert = DB::table('listed_services')->insert([
                    'lis_providerid'=>session('usersessionid'),
                    'category'=>$request['subject'],
                    'service_name'=>$sub,
                    'service_des'=>$request['des2'],
                    'service_image'=>$request['des2'],
                    'loc_address'=>$request['probus_str_add'],
                    'loc_address2'=>$request['probus_add_lin2'],
                    'loc_city'=>$request['probus_city'],
                    'loc_zip'=>$request['probus_zip'],
                    'loc_state'=>$request['probus_state'],
                    'loc_country'=>$request['probus_country'],
                    'lat' => $request['probus_lat'],
                    'lng' => $request['probus_lng'],
                    'loc_radius' => $request['loc_radius'],
                ]);
            }
        }
        $signup_data = DB::table('bluebis_emailtemplate')->where('template_slug','become_provider_admin')->first();
        $admin_data = DB::table('users')->where('user_type',1)->select('email')->first();
        $mail_data_admin = DB::table('bluebis_emailtemplate')->where('template_slug','become_provider_admin')->first();
        $mail_data_provider = DB::table('bluebis_emailtemplate')->where('template_slug','become_provider_provider')->first();
        $current_provider = DB::table('users')->where('id',$provider_id)->first();
        
        // Admin Mail
        $subject = $admin_data->email;
        $data = array(
            'header_text'=>$mail_data_admin->header,
            'body_text'=>$mail_data_admin->body,
            'footer_text'=>$mail_data_admin->footer,
            'name'=>$current_provider->name,
            'lname'=>$current_provider->lastname,
            'email'=>$current_provider->email,
            'business_name'=>$request->business_name,
            'offered_category'=>$request->offered_category,
            'loc_address'=>$request->probus_str_add,
            'loc_address2'=>$request->probus_add_lin2,
            'loc_city'=>$request->probus_city,
            'loc_zip'=>$request['probus_zip'],
            'loc_state'=>$request['probus_state'],
            'loc_country'=>$request['probus_country'],

        );
        Mail::send('frontend.mail.become_provider_admin', $data, function($message)use($subject) {
            $message->to($subject, 'Become Provider')->subject
            ('Become Provider');
            $message->from('vinay.k@imarkinfotech.com','BlueBis');
        });

        // Provider Mail
        $subject = $current_provider->email;
        $data = array(
            'header_text'=>$mail_data_provider->header,
            'body_text'=>$mail_data_provider->body,
            'footer_text'=>$mail_data_provider->footer,
            'name'=>$current_provider->name,
            'lname'=>$current_provider->lastname,
            'email'=>$current_provider->email,
            'password'=>$current_provider->email_verified_at,
        );
        Mail::send('frontend.mail.become_provider_provider', $data, function($message)use($subject) {
            $message->to($subject, 'Become Provider')->subject
            ('Become Provider');
            $message->from('vinay.k@imarkinfotech.com','BlueBis');
        });

        return redirect('provider-created-successfuly');
    }

    public function pro_cre_successfuly(){
        return view('provider.provider-created-successfuly');
    }

    public function provider_profile_preview($id)
    {
        $pro_profile = DB::table('provider_listing')
                 ->join('users','provider_listing.provider_id', "=" ,'users.id')
                 ->join('listed_services','provider_listing.provider_id', "=" ,'listed_services.lis_providerid')
                 ->where('provider_id',$id)->first();
        return view('frontend.provider-profile-preview',compact('pro_profile'));
    }

     public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = DB::table('users')
          ->where('name', 'LIKE', '%'. $query. '%')
          ->get();
          return response()->json($filterResult);
    } 


    public function searchheader(Request $request)
    {

        if($_GET['name'])
        {
            $data = DB::table('category')->where('name', 'LIKE','%'.$request->name.'%')->orderBy('name', 'asc')->get();
            $output = '';

            if(count($data)>0)
            {
                $output = '<ul style="display:block; position:relative; z-index:1">';
                    foreach ($data as $row) {
                    $output .= '<li><a href="task-details?name='.$row->name.'">'.$row->name.'</a></li>';
                }
                $output .= '</ul>';
            }
            else
            {
                $output .= '<li>No Data Found</li>';
            }
            return $output;
        }        
    }

    // public function search_header($id)
    // {
    //     $data = DB::table('listed_services')
    //      ->where('service_name',$id)
    //      ->where('listed_services.status','=',0)
        
         
    //      ->join('users','listed_services.lis_providerid','=','users.id')
    //      ->join('provider_listing','listed_services.lis_providerid','=','provider_listing.provider_id')
        
    //      ->select('users.name as provider_name',
    //         'listed_services.status as provider_status',
    //         'users.id as provider_id',
    //         'users.lastname as provider_last',
    //         'users.image as provider_image',            
    //         'provider_listing.description as provider_des',
    //         'provider_listing.price_per_hour as provider_price',
    //         'provider_listing.sub_key as sub_key',)->get()->toarray();
    //     return view('frontend.header', compact('data'));     
    // }

    public function deals_discount(Request $req){
        $dealid = $_GET['id'];
        $all_deals = DB::table('deals')->where('dealid',$dealid)->where('deal_status',0)->get();
        $all_categorys = DB::table('category')->get();
        return view('frontend.deals-and-discount',compact('all_deals','all_categorys'));
    }

     public function deadetail($id){
        $deal_detail = DB::table('deals')->where('id',$id)->first();
        return view('frontend.deals-and-discount-detail',compact('deal_detail'));
    }

    public function blogs(){
        $all_blogs = DB::table('bluebis_blog')->where('status', 0)->get();
        return view('frontend.blogs',compact('all_blogs'));
    }

    public function blog_detail($id){
        $blog_detail = DB::table('bluebis_blog')->where('blog_slug', $id)->first();
        $author_name = DB::table('bluebis_author')->where('id', $blog_detail->author_name)->first();
        return view('frontend.blog-detail',compact('blog_detail','author_name'));
    }


    public function get_subcat(Request $request){
        $post = $request['category_id'];
        $all_subcategory = DB::table('sub_category')->where('name',$post)->first();
        $all_subcategory_check = DB::table('category')->where('cat_status',0)->where('catid',$all_subcategory->id)->get();

        $output ="";
        $output.= '<select multiple class="form-select form-control multi_select" name="sub_key[]" required>';
        $output.= '<option value="">Select Sub category</option>';
        // generate the options for the select
        foreach ($all_subcategory_check as $status) {
            $output.= '<option value="'.$status->name.'">'.$status->name.'</option>';
        }
        // close the select input
        $output.= '</select>
        <script>
        $(document).ready(function() {
            $(".multi_select").select2({

            });

            
        });




        </script>';

        return  $output;
    }

    public function logout () {
        auth()->logout();
        return redirect('/');
    }


    public function privacy_policy(){
        $privacy_policy_detail = DB::table('bluebis_privacy_policy')->where('id',1)->first();
        
        return view('frontend.privacy-policy',compact('privacy_policy_detail'));
    }

    public function review_policy(){
        $review_policy_detail = DB::table('bluebis_review_policy')->where('id',1)->first();
        
        return view('frontend.review-policy',compact('review_policy_detail'));
    }
    
    public function terms_conditions(){
        $terms_conditions_detail = DB::table('bluebis_terms_conditions')->where('id',1)->first();
        
        return view('frontend.terms-&-conditions',compact('terms_conditions_detail'));
    }

    public function cancellation_policy(){
        $cancellation_policy_detail = DB::table('bluebis_cancellation_policy')->where('id',1)->first();
        return view('frontend.cancellation-policy',compact('cancellation_policy_detail'));
    }

    public function fetch_all_faq(){
        $fetch_all_faq = DB::table('bluebis_faq')->where('faq_status',0)->get();
        return view('frontend.faq',compact('fetch_all_faq'));
    }

    public function about(){
        $aboutus_first = DB::table('bluebis_admin_aboutus')->where('id',1)->first();
        $our_team = DB::table('bluebis_our_team')->where('show_status',0)->where('team_status',0)->get();

        return view('frontend.about',compact('aboutus_first','our_team'));
    }

    public function how_create_project(){
        $how_create_project = DB::table('bluebis_create_project')->where('id',1)->first();
        return view('frontend.how-to-create-project',compact('how_create_project'));
    }
    
    

    

    

    


    
}
