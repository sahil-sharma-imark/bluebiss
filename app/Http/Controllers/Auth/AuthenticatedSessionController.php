<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use Twilio\Rest\Client;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        return view('frontend.login-account');

    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user_detail = DB::table('users')->where("number",$_POST['email'])->first();
        

        if(isset($user_detail)){
             $receiverNumber = $_POST['email'];

if(auth()->attempt(array('number' => $request['email'], 'password' => $request['password']))){

  
             
    
$user['user_id_data'] = Auth::user()->id;
$user['otp_number'] =  rand(1231,7879);
$insert_verify = DB::table('veryfy_mobile_no')->insert($user);


        $message = "This is otp from Bluebiss ".$user['otp_number'];
  
        try {
  
            $account_sid = getenv("TWILIO_SID");

            $auth_token = getenv("TWILIO_TOKEN");
            
            $twilio_number = getenv("TWILIO_FROM");
   
            $client =  new Twilio\Rest\Client($account_sid, $auth_token);
            $client->messages->create('+91'.$receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            //dd('SMS Sent Successfully.');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
         return redirect('verify-mobile-number');
     }
        }else{
           $request->authenticate();
        $request->session()->regenerate();

        if(auth()->attempt(array('email' => $request['email'], 'password' => $request['password'], 'user_type' => 1)))
            {
                return redirect()->route('dashboard');
            }elseif(session('insert-task_url')){
            // echo Session::get(key:'insert-task_url');
            return redirect(session('insert-task_url'));
            //return redirect('task-details');
        }else{ 
                return redirect("/");
                }  
        }
       

        //return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
