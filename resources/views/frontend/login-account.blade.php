@include('layouts.header')
<?php if($_GET){
  $refer = $_GET['refrerl_id'];
}else{
  $refer="";
}?>
  <main id="main">
    <section class="login_account">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="ctnt">
              <h5>#1 Trinidad and Tobago ondemand Service Provider platform for cleaning, painting & more.</h5>
              <figure>
                <img src="images/login_account.png" alt="Login_account">
              </figure>
            </div>
          </div>
          <div class="col-md-6">
            
              <div class="account_form">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <ul>
                  <li><a href="javascript:void(0);" data-tag="login" class="active">Log In</a></li>
                  <li><a href="javascript:void(0);" data-tag="signup">Signup</a></li>
                </ul>
                <div class="ctnt_row">
                  <form id="loin" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="ctnt_col" id="login">
                      <h4>Log In Account</h4>

                      <div class="form-field">
                        <label>Email/mobile number *</label>
                        <input type="text" class="form-control" name="email" id="logemail" :value="old('email')" placeholder="Enter email or Mobile number" required>
                      </div>
                      <div class="form-field">
                        <label>Password</label>
                        <div class="pass-field">
                          <input id="password-field" type="password" name="password" id="logpassword" class="form-control" placeholder="Password*" required>
                          <span toggle="#password-field" class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                        </div>
                      </div>
                      <div class="remember_field">
                        <div class="check-box">
                          <input type="checkbox" id="Remember" checked >
                          <label for="Remember">Remember me</span></label>
                        </div>
                        <a href="{{url('forget-password')}}" class="forgot">Forgot Password</a>
                      </div>
                      <div class="login_btn">
                        <input type="submit" class="btn" value="Log In">
                      </div>
                    </div>
                  </form>
                  <div class="ctnt_col hide_ctnt" id="signup">
                    <h4>Signup Account</h4>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <form id="reg" method="POST" action="/create_account">
                      @csrf


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-field">
                          <input type="hidden" name="refer_id" value="{{$refer}}">
                          <label>First name</label>
                          <input type="hidden" name="r_id" value="">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Enter first name" value="{{ old('name') }}" required>
                          <span class="text-danger" id="name-error"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-field">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter last name" value="{{ old('lastname') }}" required>
                          <span class="text-danger" id="lastname-error"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-field">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" required>
                          <span class="text-danger" id="email-error"></span>

                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-field">
                          <label>Mobile Number</label>
                          <input type="number" class="form-control" name="number" id="number" placeholder="Enter number only" value="{{ old('number') }}" required>
                          <span class="text-danger" id="number-error"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-field">
                          <label>Password</label>
                          <div class="pass-field">
                            <input id="password" type="password" name="password" class="form-control" placeholder="Enter Password*" required>
                            <span toggle="#password-field"
                              class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                              <span class="text-danger" id="password-error"></span>
                          </div>

                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-field">
                          <label>Confirm Password</label>
                          <div class="pass-field">
                            <input type="password" class="form-control" name="conpassword" id="conpassword" placeholder="Confirm Password*" required >
                            <span toggle="#password-field"
                              class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="remember_field">
                          <div class="check-box">
                            <input type="checkbox" name="saveinfo" id="saveinfo" checked>
                            <label for="Saveinfo">I Agree to the <span>Terms of Service</span> and <span>Privacy
                                Policy</span></label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="login_btn">
                          <!-- <input type="submit" class="btn sign_up" value="Create an Account"> -->
                          <button type="submit" class="btn">Create an Account</button>
                        </div>
                      </div>
                    </div>
                    </form>



                  </div>
                  <span class="or_log">-- Or Log in with --</span>
                  <div class="social_icon">
                    <a href="{{ route('facebook.login') }}" class="fb"><svg fill="#1877F2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"
                        width="30px" height="30px">
                        <path
                          d="M12,27V15H8v-4h4V8.852C12,4.785,13.981,3,17.361,3c1.619,0,2.475,0.12,2.88,0.175V7h-2.305C16.501,7,16,7.757,16,9.291V11 h4.205l-0.571,4H16v12H12z" />
                        </svg> Facebook</a>
                    <a href="{{url('google')}}" class="google">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">
                        <path fill="#FFC107"
                          d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                        <path fill="#FF3D00"
                          d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                        <path fill="#4CAF50"
                          d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                        <path fill="#1976D2"
                          d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                        </svg>
                      Gmail</a>
                  </div>
                </div>
              </div>
            
          </div>
        </div>
      </div>
    </section>
  </main>

@include('layouts.footer')
  
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
<!-- Script for registration -->  
<script>
  $(document).ready(function() {
    $("#reg").validate({
      errorClass: "error text-danger",
      validClass: "valid success-alert",
      rules: {
        name: {
          required: true,
           lettersonly: true,
           nowhitespace: true,
           
        },
        lastname: {
          required: true,
           lettersonly: true,
           nowhitespace: true

        },
        email: {
          required: true,
          email: true,
        },
        number: {
          required: true,
          maxlength: 12,
          minlength: 10,
         
        } ,
        password: {
          required:true,
          minlength: 5,
        },
        conpassword: {
          required: true,
          equalTo : "#password",
        }
      }
    });
  });
</script>
<!-- End Script for registration --> 
<script>
  $(document).ready(function() {
    $("#loin").validate({
      errorClass: "error text-danger",
      validClass: "valid success-alert",
      rules: {
/*        email: {
          required: true,
          email: true,
        },*/
        
        logpassword: "required",
        
      }
    });
  });
</script>



</html>