<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Redirect;

class AdminHomeController extends Controller
{
    public function how_it_work(){
        return view('admin.how-it-work.add');
    }

    public function how_it_work_all(){
        $how_it_work_all = DB::table('bluebis_how_it_work')->where('how_it_work_status',0)->get();
        return view('admin.how-it-work.all',compact('how_it_work_all'));
    }

    public function how_it_work_add(Request $request){
        //dd($request);exit;
        $request->validate([
                'title' => 'required',
            ]);

        if($request->hasfile('img')){
                $file = $request->file('img');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/admin/how-it-work';
                $file->move($location,$filename);
                $how_it_work_img = $filename;
            }
            else{
                $how_it_work_img = '';
            }

        $insert = DB::table('bluebis_how_it_work')->insert([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'how_it_work_status'=>0,
            'how_it_work_image'=>$how_it_work_img,
            'how_it_work_des'=>$request->des,
        ]);

         return Redirect('how-it-work-all')->with('how-it-workadd', 'Add successfully');
    }

    public function how_it_work_edit(Request $request, $id){
        $edit_how_it_work_all = DB::table('bluebis_how_it_work')->where('id',$id)->first();

        return view('admin.how-it-work.edit', compact('edit_how_it_work_all'));
    }

    public function how_it_work_update(Request $request, $id){
        $edit_img = DB::table('bluebis_how_it_work')->where('id',$id)->first();

        if($request->hasfile('img')){
                $file = $request->file('img');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/admin/how-it-work';
                $file->move($location,$filename);
                $how_it_work_img = $filename;
            }
            else{
                $how_it_work_img = $edit_img->how_it_work_image;
            }

        $update = DB::table('bluebis_how_it_work')->where('id',$id)->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'how_it_work_image'=>$how_it_work_img,
            'how_it_work_des'=>$request->des,

        ]);
        return Redirect('how-it-work-all')->with('how-it-workadd-update', 'Update successfully');
    }

    public function how_it_work_delete($id){
        $destroy = DB::table('bluebis_how_it_work')->where('id',$id)->delete();
        return Redirect('how-it-work-all')->with('how-it-workadd-delete', 'Delete successfully');

    }

    public function privacy_policy(){
        $privacy_policy =  DB::table('bluebis_privacy_policy')->where('id',1)->first();
        return view('admin.Privacy Policy.privacy-policy', compact('privacy_policy'));
    }

    public function privacy_policy_update(Request $request){
        $privacy_policy_update = DB::table('bluebis_privacy_policy')->get();
        if(count($privacy_policy_update) == 0){
            $insert = DB::table('bluebis_privacy_policy')->insert([
                'privacy_policy_detail'=>$request->privacy_policy_detail,
            ]);
        }else{
            $update = DB::table('bluebis_privacy_policy')->where('id',1)->update([
                'privacy_policy_detail'=>$request->privacy_policy_detail,
            ]);
            return Redirect('privacy-policy-update')->with('privacy-policy-detail', 'Detail updated successfully');
        }

    }

    public function review_policy(){
        $review_policy =  DB::table('bluebis_review_policy')->where('id',1)->first();
        return view('admin.Review-Policy.review_policy', compact('review_policy'));
    }

    public function review_policy_update(Request $request){
        $review_policy_update = DB::table('bluebis_review_policy')->get();
        if(count($review_policy_update) == 0){
            $insert = DB::table('bluebis_review_policy')->insert([
                'review_policy_detail'=>$request->review_policy_detail,
            ]);
        }else{
            $update = DB::table('bluebis_review_policy')->where('id',1)->update([
                'review_policy_detail'=>$request->review_policy_detail,
            ]);
            return Redirect('review-policy-update')->with('review-policy-detail', 'Detail updated successfully');
        }

    }

    public function terms_conditions(){
        $terms_conditions =  DB::table('bluebis_terms_conditions')->where('id',1)->first();
        return view('admin.Terms-Conditions.terms_conditions', compact('terms_conditions'));
    }

    public function terms_conditions_update(Request $request){
        $terms_conditions_update = DB::table('bluebis_terms_conditions')->get();
        if(count($terms_conditions_update) == 0){
            $insert = DB::table('bluebis_terms_conditions')->insert([
                'terms_conditions_detail'=>$request->terms_conditions_detail,
            ]);
        }else{
            $update = DB::table('bluebis_terms_conditions')->where('id',1)->update([
                'terms_conditions_detail'=>$request->terms_conditions_detail,
            ]);
            return Redirect('terms-conditions-update')->with('terms-conditions-detail', 'Detail updated successfully');
        }

    }

    public function cancellation_policy(){
        $cancellation_policy =  DB::table('bluebis_cancellation_policy')->where('id',1)->first();
        return view('admin.Cancellation-Policy.cancellation_policy', compact('cancellation_policy'));
    }

    public function cancellation_policy_update(Request $request){
        $cancellation_policy_update = DB::table('bluebis_cancellation_policy')->get();
        if(count($cancellation_policy_update) == 0){
            $insert = DB::table('bluebis_cancellation_policy')->insert([
                'cancellation_policy_detail'=>$request->cancellation_policy_detail,
            ]);
        }else{
            $update = DB::table('bluebis_cancellation_policy')->where('id',1)->update([
                'cancellation_policy_detail'=>$request->cancellation_policy_detail,
            ]);
            return Redirect('cancellation-policy-update')->with('cancellation-policy-detail', 'Detail updated successfully');
        }

    }

    public function faq_add(){
        return view('admin.FAQ.add-faq');
    }

    public function faq_all(){
        $all_faq = DB::table('bluebis_faq')->get();
        return view('admin.FAQ.faq',compact('all_faq'));
    }

    public function add_faq(Request $request){
        $request->validate([
            'faq_question' => 'required',
            'faq_answer' => 'required',
        ]);

        $insert_faq = DB::table('bluebis_faq')->insert([
            'faq_question'=>$request->faq_question,
            'faq_answer'=>$request->faq_answer
        ]);
        return Redirect('faq-all')->with('faq', 'FAQ add successfully');
    }

    public function update_faq_status(Request $request){

        $change_status = DB::table('bluebis_faq')->where('id',$_GET['faq_id'])->update([
            'faq_status'=>$_GET['status']]);

        return response()->json(['success'=>'Status change successfully.']); 
     }

     public function testimonials_all(){
        $testimonial_all = DB::table('bluebis_testimonials')->get();
        return view('admin.Testimonial.all',compact('testimonial_all'));
     }

     public function testimonial_add(){
        return view('admin.testimonial.add');
    }


    public function add_testimonial(Request $request){
        $request->validate([
            'name' => 'required',
            'testimonial_slug'=>'required|unique:bluebis_testimonials',
            'testimonial_star'=>'required|integer|min:1|max:5',
        ]);

        if($request->hasfile('testimonial_img')){
                $file = $request->file('testimonial_img');
                $extension = $file->getClientOriginalName();
                $filename = time().'_'.$extension;
                $location = 'uploads/admin/testimonial';
                $file->move($location,$filename);
                $testimonial_img = $filename;
            }
            else{
                $testimonial_img = "";
            }

        $insert_testimonial = DB::table('bluebis_testimonials')->insert([
            'name'=>$request->name,
            'profile'=>$request->profile,
            'testimonial_slug'=>$request->testimonial_slug,            
            'testimonial_star'=>$request->testimonial_star,
            'testimonials_text'=>$request->testimonials_text,
            'testimonial_img'=>$testimonial_img,
        ]);
        return Redirect('testimonials-all')->with('testimonials-insert', 'Testimonials add successfully');
    }

    public function testimonial_edit($id){
        $testimonial_first = DB::table('bluebis_testimonials')->where('id',$id)->first();
        return view('admin.Testimonial.edit', compact('testimonial_first'));

    }

    public function update_testimonial(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'testimonial_star'=>'required|integer|min:1|max:5',
        ]);

        $testimonial_first = DB::table('bluebis_testimonials')->where('id',$id)->first();
        if($request->hasfile('testimonial_img')){
            $file = $request->file('testimonial_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/testimonial';
            $file->move($location,$filename);
            $testimonial_img = $filename;
        }
        else{
            $testimonial_img = $testimonial_first->testimonial_img;
        }
        $update_testimonial = DB::table('bluebis_testimonials')->where('id',$id)->update([
            'name'=>$request->name,
            'profile'=>$request->profile,
            'testimonials_status'=>$request->testimonials_status,
            'testimonial_star'=>$request->testimonial_star,
            'testimonials_text'=>$request->testimonials_text,
            'testimonial_img'=>$testimonial_img,
        ]);
        return Redirect('testimonials-all')->with('testimonials-update', 'Testimonials updated successfully');
    }

    public function testimonial_delete($id){
        $destroy = DB::table('bluebis_testimonials')->where('id',$id)->delete();
        return Redirect('testimonials-all')->with('testimonials-delete', 'Testimonials delete successfully');
    }

    public function update_testimonial_status(Request $request){

        $change_status = DB::table('bluebis_testimonials')->where('id',$_GET['faq_id'])->update([
            'testimonials_status'=>$_GET['status']]);

        return response()->json(['success'=>'Status change successfully.']); 
     }

     public function right_price_all(){
        $rightprice_all = DB::table('bluebis_rightprice')->get();
        return view('admin.Right-Price.all',compact('rightprice_all'));
     }

     public function right_price_add(){
        return view('admin.Right-Price.add');
     }

     public function add_right_price(Request $request){
        if($request->hasfile('rightprice_img')){
            $file = $request->file('rightprice_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/rightprice';
            $file->move($location,$filename);
            $rightprice_img = $filename;
        }
        else{
            $rightprice_img = '';
        }
        $insert_rightprice = DB::table('bluebis_rightprice')->insert([
            'rightprice_title'=>$request->rightprice_title,
            'rightprice_subtitle'=>$request->rightprice_subtitle,
            'rightprice_min'=>$request->rightprice_min,
            'rightprice_max'=>$request->rightprice_max,
            'rightprice_img'=>$rightprice_img,
            'rightprice_slug'=>$request->rightprice_slug
        ]);
        return Redirect('right-price-all')->with('right-price-add', 'Right price add successfully');
     }

    public function rightprice_desktop(Request $request){
        $rightprice_desktop = DB::table('bluebis_rightprice')->where('id',$_GET['desktop_id'])->update([
            'rightprice_desktop'=>$_GET['desktop_status']]);
        }

    public function rightprice_status(Request $request){
        $rightprice_status = DB::table('bluebis_rightprice')->where('id',$_GET['rightprice_id'])->update([
            'rightprice_status'=>$_GET['rightprice_status']]);
        }

    public function rightprice_edit(Request $request, $id){
        $rightprice_first = DB::table('bluebis_rightprice')->where('id',$id)->first();
        return view('admin.Right-Price.edit', compact('rightprice_first'));
    }

    public function update_right_price(Request $request, $id){
        $rightprice_first = DB::table('bluebis_rightprice')->where('id',$id)->first();
        if($request->hasfile('rightprice_img')){
            $file = $request->file('rightprice_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/rightprice';
            $file->move($location,$filename);
            $rightprice_img = $filename;
        }
        else{
            $rightprice_img = $rightprice_first->rightprice_img;
        }

        $update_rightprice = DB::table('bluebis_rightprice')->where('id',$id)->update([
            'rightprice_title'=>$request->rightprice_title,
            'rightprice_subtitle'=>$request->rightprice_subtitle,
            'rightprice_min'=>$request->rightprice_min,
            'rightprice_max'=>$request->rightprice_max,
            'rightprice_img'=>$rightprice_img,
        ]);
        return Redirect('right-price-all')->with('right-price-update', 'Right price update successfully');
    } 

    public function right_price_delete($id){
        $rightprice_delete = DB::table('bluebis_rightprice')->where('id',$id)->delete();
        return Redirect('right-price-all')->with('right-price-delete', 'Right price delete successfully');
    }   

    public function homepage_edit(){
        $homepage_first_edit = DB::table('bluebis_admin_home')->where('id',1)->first();
        return view('admin.Home-Page.edit',compact('homepage_first_edit'));
    }

    public function homepage_update(Request $request){
        $homepage_update = DB::table('bluebis_admin_home')->get();
        $homepage_first = DB::table('bluebis_admin_home')->where('id',1)->first();
        if($request->hasfile('sec1_img')){
            $file = $request->file('sec1_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/homepage';
            $file->move($location,$filename);
            $sec1_img = $filename;
        }
        else{
            $sec1_img = $homepage_first->sec1_img;
        }
        if($request->hasfile('sec5_img')){
            $file = $request->file('sec5_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/homepage';
            $file->move($location,$filename);
            $sec5_img = $filename;
        }
        else{
            $sec5_img = $homepage_first->sec5_img;
        }
        if(count($homepage_update) == 0){
            $insert = DB::table('bluebis_admin_home')->insert([
                'sec1_title'=>$request->sec1_title,
                'sec1_img'=>$sec1_img,
                'sec2_title'=>$request->sec2_title,
                'sec3_title'=>$request->sec3_title,
                'sec4_title'=>$request->sec4_title,
                'sec5_title'=>$request->sec5_title,
                'sec5_des'=>$request->sec5_des,
                'sec5_img'=>$sec5_img,
                'sec6_subtitle'=>$request->sec6_subtitle,
                'sec6_title'=>$request->sec6_title,
                'sec7_title'=>$request->sec7_title,
                'sec7_subtitle'=>$request->sec7_subtitle,

            ]);
        }else{
            $update = DB::table('bluebis_admin_home')->where('id',1)->update([
                'sec1_title'=>$request->sec1_title,
                'sec1_img'=>$sec1_img,
                'sec2_title'=>$request->sec2_title,
                'sec3_title'=>$request->sec3_title,
                'sec4_title'=>$request->sec4_title,
                'sec5_title'=>$request->sec5_title,
                'sec5_des'=>$request->sec5_des,
                'sec5_img'=>$sec5_img,
                'sec6_subtitle'=>$request->sec6_subtitle,
                'sec6_title'=>$request->sec6_title,
                'sec7_title'=>$request->sec7_title,
                'sec7_subtitle'=>$request->sec7_subtitle,
            ]);
        }
        return Redirect('homepage-edit')->with('homepage-edit', 'Updated successfully');
    }

    public function aboutus_edit(){
        $homepage_first_edit = DB::table('bluebis_admin_aboutus')->where('id',1)->first();
        return view('admin.About-Us.edit', compact('homepage_first_edit'));
    }

    public function aboutus_update(Request $request){
        $aboutus_update = DB::table('bluebis_admin_aboutus')->get();
        $aboutus_first = DB::table('bluebis_admin_aboutus')->where('id',1)->first();
        
        if(count($aboutus_update) == 0){
            $insert = DB::table('bluebis_admin_aboutus')->insert([
                'sec1_title'=>$request->sec1_title,
                'sec1_des'=>$request->sec1_des,
                // 'sec1_img_1'=>$sec1_img_1,
                // 'sec1_img_2'=>$sec1_img_2,
                // 'sec1_img_3'=>$sec1_img_3,
                'sec2_title'=>$request->sec2_title,
                'sec2_des'=>$request->sec2_des,
                'sec2_point1_title'=>$request->sec2_point1_title,
                'sec2_point1_des'=>$request->sec2_point1_des,
                'sec2_point2_title'=>$request->sec2_point2_title,
                'sec2_point2_des'=>$request->sec2_point2_des,
                'sec2_point3_title'=>$request->sec2_point3_title,
                'sec2_point3_des'=>$request->sec2_point3_des,
                'sec3_title'=>$request->sec3_title,
                'sec3_des'=>$request->sec3_des,
                'sec3_p1'=>$request->sec3_p1,
                'sec3_p2'=>$request->sec3_p2,
                'sec3_p3'=>$request->sec3_p3,
                'sec3_p4'=>$request->sec3_p4,
                'sec3_p5'=>$request->sec3_p5,
                'sec3_p6'=>$request->sec3_p6,
                'sec4_title'=>$request->sec4_title,
                'sec4_des'=>$request->sec4_des,
                'sec5_title'=>$request->sec5_title,
                'sec6_title'=>$request->sec6_title,
                'sec6_des'=>$request->sec6_des,
                // 'sec6_img1'=>$sec6_img1,
                // 'sec6_img2'=>$sec6_img2,
                // 'sec6_img3'=>$sec6_img3,
                // 'sec6_img4'=>$sec6_img4,


            ]);
        }else{
            $update = DB::table('bluebis_admin_aboutus')->where('id',1)->update([
                'sec1_title'=>$request->sec1_title,
                'sec1_des'=>$request->sec1_des,
                // 'sec1_img_1'=>$sec1_img_1,
                // 'sec1_img_2'=>$sec1_img_2,
                // 'sec1_img_3'=>$sec1_img_3,
                'sec2_title'=>$request->sec2_title,
                'sec2_des'=>$request->sec2_des,
                'sec2_point1_title'=>$request->sec2_point1_title,
                'sec2_point1_des'=>$request->sec2_point1_des,
                'sec2_point2_title'=>$request->sec2_point2_title,
                'sec2_point2_des'=>$request->sec2_point2_des,
                'sec2_point3_title'=>$request->sec2_point3_title,
                'sec2_point3_des'=>$request->sec2_point3_des,
                'sec3_title'=>$request->sec3_title,
                'sec3_des'=>$request->sec3_des,
                'sec3_p1'=>$request->sec3_p1,
                'sec3_p2'=>$request->sec3_p2,
                'sec3_p3'=>$request->sec3_p3,
                'sec3_p4'=>$request->sec3_p4,
                'sec3_p5'=>$request->sec3_p5,
                'sec3_p6'=>$request->sec3_p6,
                'sec4_title'=>$request->sec4_title,
                'sec4_des'=>$request->sec4_des,
                'sec5_title'=>$request->sec5_title,
                'sec6_title'=>$request->sec6_title,
                'sec6_des'=>$request->sec6_des,
                // 'sec6_img1'=>$sec6_img1,
                // 'sec6_img2'=>$sec6_img2,
                // 'sec6_img3'=>$sec6_img3,
                // 'sec6_img4'=>$sec6_img4,
            ]);
        }
        return Redirect('aboutus-edit')->with('homepage-edit', 'Updated successfully');
    }

    public function contactus_edit(){
        $contactus_edit = DB::table('bluebis_admin_contactus')->where('id',1)->first();
        return view('admin.Contact-Us.edit', compact('contactus_edit'));
    }

    public function contactus_update(Request $request){
        $contactus_update = DB::table('bluebis_admin_contactus')->get();
        $contactus_first = DB::table('bluebis_admin_contactus')->where('id',1)->first();
        
        if(count($contactus_update) == 0){
            $insert = DB::table('bluebis_admin_contactus')->insert([
                'contactus_heading'=>$request->contactus_heading,
                'contactus_title'=>$request->contactus_title,                
                'contactus_sub_title'=>$request->contactus_sub_title,
                'contactus_msg'=>$request->contactus_msg,
            ]);
        }else{
            $update = DB::table('bluebis_admin_contactus')->where('id',1)->update([
                'contactus_heading'=>$request->contactus_heading,
                'contactus_title'=>$request->contactus_title,                
                'contactus_sub_title'=>$request->contactus_sub_title,
                'contactus_msg'=>$request->contactus_msg,               
            ]);
        }
        return Redirect('contactus-edit')->with('contact-edit', 'Updated successfully');
    }
       

    public function our_team_all(){
        $team_all = DB::table('bluebis_our_team')->get();
        return view('admin.our-team.all',compact('team_all'));
    }

    public function our_team_add(){
        return view('admin.our-team.add');
    }

    public function add_our_team(Request $request){
        $request->validate([
            'team_name' => 'required',
            'team_designation'=>'required',
            'team_slug'=>'required|unique:bluebis_our_team',
        ]);

        if($request->hasfile('team_img')){
            $file = $request->file('team_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/team';
            $file->move($location,$filename);
            $team_img = $filename;
        }
        else{
            $team_img = '';
        }
        $insert_team = DB::table('bluebis_our_team')->insert([
            'team_name'=>$request->team_name,
            'team_designation'=>$request->team_designation,
            'team_img'=>$team_img,
            'team_slug'=>$request->team_slug,
        ]);
        return Redirect('our-team-all')->with('team_insert', 'Add team successfully');
    }

    public function update_team_status(Request $request){

        $change_status = DB::table('bluebis_our_team')->where('id',$_GET['team_id'])->update([
            'team_status'=>$_GET['status']]);
        return response()->json(['success'=>'Status change successfully.']); 
     }

     public function update_team_show_status(Request $request){

        $change_status = DB::table('bluebis_our_team')->where('id',$_GET['team_id'])->update([
            'show_status'=>$_GET['status']]);
        return response()->json(['success'=>'Status change successfully.']); 
     }

     public function team_edit($id){
        $team_first = DB::table('bluebis_our_team')->where('id',$id)->first();
        return view('admin.our-team.edit',compact('team_first'));
     }

     public function update_team(Request $request, $id){
        $request->validate([
            'team_name' => 'required',
            'team_designation'=>'required',            
        ]);

        $team_first = DB::table('bluebis_our_team')->where('id',$id)->first();
        if($request->hasfile('team_img')){
            $file = $request->file('team_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/team';
            $file->move($location,$filename);
            $team_img = $filename;
        }
        else{
            $team_img = $team_first->team_img;
        }

        $update_team = DB::table('bluebis_our_team')->where('id',$id)->update([
            'team_name'=>$request->team_name,
            'team_designation'=>$request->team_designation,
            'team_img'=>$team_img,
        ]);
        return Redirect('our-team-all')->with('update-team', 'Team update successfully');

     }

     public function team_delete($id){
        $destroy = DB::table('bluebis_our_team')->where('id',$id)->delete();
        return Redirect('our-team-all')->with('delete-team', 'Team delete successfully');
     }

     public function all_image_link(){
        $all_links = DB::table('bluebis_image_link')->get();
        return view('admin.image-link.all',compact('all_links'));
     }

     public function image_link_add(){
        return view('admin.image-link.add');
     }

     public function add_image_link(Request $request){
        $request->validate([
            'image_link_img' => 'required',
            'image_link_slug'=>'required|unique:bluebis_image_link',  
                  
        ]);

        if($request->hasfile('image_link_img')){
            $file = $request->file('image_link_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/image-link';
            $file->move($location,$filename);
            $image_link_img = $filename;
        }

        $insert_link = DB::table('bluebis_image_link')->insert([
            'image_link_img'=>$image_link_img,
            'image_link_slug'=>$request->image_link_slug,
            'note'=>$request->note,
            ]);
        return Redirect('all-image-link')->with('link-create', 'Link created successfully');
    }

    public function edit_image($id){
        $get_image_byid = DB::table('bluebis_image_link')->where('id',$id)->first();
        return view('admin.image-link.edit',compact('get_image_byid'));
    }

    public function update_image_link(Request $request, $id){
        $get_image_byid = DB::table('bluebis_image_link')->where('id',$id)->first();
        if($request->file('image_link_img')){
            $file = $request->file('image_link_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/image-link';
            $file->move($location,$filename);
            $image_link_img = $filename;
        }
        else{
            $image_link_img = $get_image_byid->image_link_img;
        }
        $update_image = DB::table('bluebis_image_link')->where('id',$id)->update([
            'image_link_img'=>$image_link_img
        ]);
        return Redirect('all-image-link')->with('link-update', 'Link update successfully');

    }

    public function delete_image($id){
        $delete_image = DB::table('bluebis_image_link')->where('id',$id)->delete();
        return Redirect('all-image-link')->with('link_image_delete', 'Image delete successfully');
    }

    

    public function create_project(){
        $create_project =  DB::table('bluebis_create_project')->where('id',1)->first();
        return view('admin.create-project.create-project', compact('create_project'));
    }

    public function create_project_update(Request $request){
        $create_project_update = DB::table('bluebis_create_project')->get();
        if(count($create_project_update) == 0){
            $insert = DB::table('bluebis_create_project')->insert([
                'create_project_detail'=>$request->create_project_detail,
            ]);
        }else{
            $update = DB::table('bluebis_create_project')->where('id',1)->update([
                'create_project_detail'=>$request->create_project_detail,
            ]);
        }
        return Redirect('create-project-update')->with('create_project', 'Detail updated successfully');

     }
     
     public function dashboard_setting(){
         $get_logo = DB::table('bluebis_admin_setting')->where('id',1)->first();
         return view('admin.setting.admin-setting',compact('get_logo'));
     }
     
     public function update_dashboard_setting(Request $request){
         $get_logo = DB::table('bluebis_admin_setting')->where('id',1)->first();
         $get_setting_update = DB::table('bluebis_admin_setting')->get();
         
         if($request->hasfile('logo_img')){
            $file = $request->file('logo_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/setting';
            $file->move($location,$filename);
            $logo_img = $filename;
        }else{
            $logo_img = $get_logo->logo_img;
        }
        
        // For Favicon
        if($request->hasfile('favicon_img')){
            $file = $request->file('favicon_img');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/setting';
            $file->move($location,$filename);
            $favicon_img = $filename;
        }else{
            $favicon_img = $get_logo->favicon_img;
        }
        
        if(count($get_setting_update) == 0){
            $insert_setting_data = DB::table('bluebis_admin_setting')->insert([
             'logo_img'=>$logo_img,
             'favicon_img'=>$favicon_img,
             'setting_facebook_link'=>$request->setting_facebook_link,
             'setting_insta_link'=>$request->setting_insta_link,
             'setting_twitter_link'=>$request->setting_twitter_link,
             'setting_youtube_link'=>$request->setting_youtube_link,
             'setting_tiktok_link'=>$request->setting_tiktok_link,
             ]);
        }else{
            $update = DB::table('bluebis_admin_setting')->where('id',1)->update([
                'logo_img'=>$logo_img,
                'favicon_img'=>$favicon_img,
                'setting_facebook_link'=>$request->setting_facebook_link,
                'setting_insta_link'=>$request->setting_insta_link,
                'setting_twitter_link'=>$request->setting_twitter_link,
                'setting_youtube_link'=>$request->setting_youtube_link,
                'setting_tiktok_link'=>$request->setting_tiktok_link,
            ]);
        }
        return redirect('dashboard-setting');
     }

     public function subject_all(){
        $all_subject = DB::table('bluebis_contact_subject')->get();
        return view('admin.Contact-Us.subject.all',compact('all_subject')); 
     }

    public function contact_subject(Request $request){
        $contact_subject = DB::table('bluebis_contact_subject')->where('id',$_GET['subject_id'])->update([
            'subject_status'=>$_GET['subject_status']]);
    }

    public function subject_add(){
        return view ('admin.Contact-Us.subject.add');
    }

    public function add_subject(Request $request){
        $request->validate([
            'subject' => 'required',
            'subject_slug'=>'required',                  
        ]);

        $insert_subject = DB::table('bluebis_contact_subject')->insert([
            'subject'=>$request->subject,
            'subject_slug'=>$request->subject_slug
        ]);
        return Redirect('subject-all')->with('add_subject', 'Subject add successfully');
    }

    public function subject_edit($id){
        $get_by_id = DB::table('bluebis_contact_subject')->where('id',$id)->first();
        return view('admin.Contact-Us.subject.edit',compact('get_by_id'));
    }

    public function subject_update(Request $request, $id){
        $update_subject = DB::table('bluebis_contact_subject')->where('id',$id)->update([
            'subject'=>$request->subject,
            'subject_slug'=>$request->subject_slug
        ]);
        return Redirect('subject-all')->with('update_subject', 'Subject update successfully');
    }

    public function subject_delete($id){
        $destroy_subject = DB::table('bluebis_contact_subject')->where('id',$id)->delete();
        return Redirect('subject-all')->with('delete_subject', 'Subject delete successfully');
    }










    public function home_top_all(){
        $header_top_all = DB::table('bluebis_home_top')->get();
        return view('admin.header-top.all',compact('header_top_all'));
    }

    public function home_top_add(){
        return view('admin.header-top.add');
    }

    public function add_header_top(Request $request){
        $request->validate([
            'title_one' => 'required',
            'title_two'=>'required',
            'header_slug'=>'required|unique:bluebis_home_top',
        ]);

        if($request->hasfile('icon')){
            $file = $request->file('icon');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/header_top';
            $file->move($location,$filename);
            $icon = $filename;
        }
        else{
            $icon = '';
        }
        $insert_header_top = DB::table('bluebis_home_top')->insert([
            'title_one'=>$request->title_one,
            'title_two'=>$request->title_two,
            'icon'=>$icon,
            'header_slug'=>$request->header_slug,
        ]);
        return Redirect('home-top-all')->with('header_top', 'Add section successfully');
    }

    public function update_headertop_status(Request $request){

        $change_status = DB::table('bluebis_home_top')->where('id',$_GET['top_id'])->update([
            'header_top_status'=>$_GET['status']]);
        return response()->json(['success'=>'Status change successfully.']); 
     }
    

     public function header_top_edit($id){
        $header_top_edit = DB::table('bluebis_home_top')->where('id',$id)->first();
        return view('admin.header-top.edit',compact('header_top_edit'));
     }

     public function update_header_top(Request $request, $id){
        $request->validate([
            'title_one' => 'required',
            'title_two'=>'required',            
        ]);

        $headertop_first = DB::table('bluebis_home_top')->where('id',$id)->first();
        if($request->hasfile('icon')){
            $file = $request->file('icon');
            $extension = $file->getClientOriginalName();
            $filename = time().'_'.$extension;
            $location = 'uploads/admin/header_top';
            $file->move($location,$filename);
            $icon = $filename;
        }
        else{
            $icon = $headertop_first->icon;
        }

        $update_header_top = DB::table('bluebis_home_top')->where('id',$id)->update([
            'title_one'=>$request->title_one,
            'title_two'=>$request->title_two,
            'icon'=>$icon,
        ]);
        return Redirect('home-top-all')->with('update-headertop', 'Section update successfully');

     }

     public function header_top_delete($id){
        $destroy = DB::table('bluebis_home_top')->where('id',$id)->delete();
        return Redirect('home-top-all')->with('section_team', 'Section delete successfully');
     }

    public function all_author(){
        $all_author = DB::table('bluebis_author')->get();        
        return view('admin.author.all', compact('all_author'));
    }

    public function author_add(){
        return view('admin.author.add');
     }

    public function add_author(Request $request){
        $request->validate([
            'author_name' => 'required',
        ]);

        $insert_link = DB::table('bluebis_author')->insert([
            'author_name'=>$request->author_name,
            ]);
        return Redirect('all-author')->with('author_add', 'Author created successfully');
    }

    public function edit_author($id){
        $get_author_byid = DB::table('bluebis_author')->where('id',$id)->first();
        return view('admin.author.edit',compact('get_author_byid'));
    }

    public function update_author(Request $request, $id){
        $get_author_byid = DB::table('bluebis_author')->where('id',$id)->first();
    
        $update_author = DB::table('bluebis_author')->where('id',$id)->update([
            'author_name'=>$request->author_name
        ]);
        return Redirect('all-author')->with('author_update', 'Author update successfully');
    }

    public function delete_author($id){
        $delete_author = DB::table('bluebis_author')->where('id',$id)->delete();
        return Redirect('all-author')->with('author_delete', 'Author delete successfully');

    }
    
}
