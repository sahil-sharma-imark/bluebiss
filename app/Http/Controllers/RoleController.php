<?php

namespace App\Http\Controllers;

use App\PasswordSecurity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Socialite;
use Hash;
use Auth;
use DB;
use Mail;
use App\Notifications\UserfollowNotification;
use App\Notifications\Newvisit;

class RoleController extends Controller
{
    public function index($id){
        echo $id;exit;
        return view('frontend.login-account');
    }

    public function create_account(Request $request){
      request()->validate([
        'email' => 'required|email|unique:users,email',
    ]);
        //dd($request);exit;
        $insert = DB::table("users")->insertGetId([
            'name'=>$request['name'],
            'lastname'=>$request['lastname'],
            'email'=>$request['email'],
            'number'=>$request['number'],
            'password'=>Hash::make($request['password']),
            'email_verified_at'=>$request['password'],
            'r_id'=>$request['refer_id'],
        ]);

        // New User Mail - This mail will deliver to user
        $signup_data = DB::table('bluebis_emailtemplate')->where('template_slug','login')->first();
        $signup_data_admin = DB::table('bluebis_emailtemplate')->where('template_slug','login_admin')->first();
        $admin_data = DB::table('users')->where('user_type',1)->first();

        $subject = $request['email'];
        $data = array(
            'header_text'=>$signup_data->header,
            'body_text'=>$signup_data->body,
            'footer_text'=>$signup_data->footer,
            'name'=>$request['name'],
            'lname'=>$request['lastname'],
            'email'=>$request['email'],
            'password'=>$request['password'],
        );
        Mail::send('frontend.mail.newuser', $data, function($message)use($subject) {
            $message->to($subject, 'Registration mail')->subject
            ('Registration mail');
            $message->from('vinaykgupta04@gmail.com','BlueBis');
        });

        
        // New User Mail - This mail will deliver to admin
        $subject = 'vinaykgupta04@gmail.com';
        $data = array(
            'header_text'=>$signup_data_admin->header,
            'body_text'=>$signup_data_admin->body,
            'footer_text'=>$signup_data_admin->footer,
            'name'=>$request['name'],
            'lname'=>$request['lastname'],
            'email'=>$request['email'],
        );
        Mail::send('frontend.mail.newuser_admin', $data, function($message)use($subject) {
            $message->to($subject, 'Registration mail')->subject
            ('Registration mail');
            $message->from('vinaykgupta04@gmail.com','BlueBis');
        });
        return view('frontend.registred');
    }

    public function delete_img(){
        
    }

    public function redirecttogoogle()
    {
        return Socialite::driver('google')->redirect();
       // Socialite::driver('google')->stateless()->user();
    }

    public function handleGoogleCallback()
    {
       $user = Socialite::driver('google')->user();
     
       $values = array('name' => $user['name'],'email' => $user['email'], 'google_id' => $user['id']);

       $finduser =  User::where('google_id', $user->id)->first();
       
       if($finduser){
        //if the user exists, login and show dashboard
            Auth::login($finduser);
            return redirect('/');
        }else{
            
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->save();
                
                
                //login as the new user
                Auth::login($newUser);
                // go to the dashboard
                return redirect('/');
        }
        
       
       
       
    }




    public function autocomplete(Request $request)
    {
        $data = User::select("name")
                    ->where('name', 'LIKE', '%'. $request->get('query'). '%')
                    ->get();
     
        return response()->json($data);
    }

}
