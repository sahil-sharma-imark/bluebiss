<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Mail;

class ContactController extends Controller
{
    public function index(){
        $get_subjects = DB::table('bluebis_contact_subject')->where('subject_status',0)->get();
        $contactus_first = DB::table('bluebis_admin_contactus')->where('id',1)->first();
        
    
        return view('frontend.contact',compact('get_subjects','contactus_first'));
    }

    public function store(Request $request){
        $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|email',
                'message' => 'required',
            ]);

        
        $insert = DB::table('contact')->insert([
            'name'=>$request['name'],
            'lastname'=>$request['lastname'],
            'email'=>$request['email'],
            'subject'=>$request['subject'],
            'message'=>$request['message'],

        ]);

        $contact_email_data = DB::table('bluebis_emailtemplate')->where('template_slug','contact_us_admin')->first(); 
        $contact_email_data_user = DB::table('bluebis_emailtemplate')->where('template_slug','contact_us_user')->first(); 



        if($insert){

            // Send to admin

            $subject = $request->email;
            $send_to = $contact_email_data->send_to;
            $data = array(
                'header_text'=>$contact_email_data->header,
                'body_text'=>$contact_email_data->body,
                'footer_text'=>$contact_email_data->footer,
                'name' => $request->name,
                'lname' => $request->lastname,
                'email'=>$request->email,
                'sub'=>$request->subject,
                'mess'=>$request->message,
            );
            Mail::send('frontend.mail.contact-mail', $data, function($message)use($subject,$send_to) {
                $message->to($send_to, 'Contact Us')->subject('Contact Us Mail');
                $message->from($subject,'Ahlookin');
            });

            // Send to user
            $send_to = $contact_email_data_user->send_to;
            $subject = $request->email;
            $data = array(
                'header_text'=>$contact_email_data_user->header,
                'body_text'=>$contact_email_data_user->body,
                'footer_text'=>$contact_email_data_user->footer,
                'name' => $request->name,
                'lname' => $request->lastname,
                'email'=>$request->email,
                'sub'=>$request->subject,
                'mess'=>$request->message,
            );
            Mail::send('frontend.mail.contact-mail-user', $data, function($message)use($subject,$send_to) {
                $message->to($subject, 'Contact Us')->subject('Contact Us Mail');
                $message->from($send_to,'Ahlookin');
            });
            return redirect('/thank-you');
        }
    }

    public function thank_you()
    {
        return view('success.thank-you');
    }

    
}
