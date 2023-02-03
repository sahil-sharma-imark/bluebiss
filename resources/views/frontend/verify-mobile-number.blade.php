<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>BlueBis</title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png" sizes="32x32" type="image/x-icon">

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/main.css">

</head>

<body>

  <header id="header">
    <div class="container">
      <div class="header-row">
        <div class="header-left">
          <div class="logo">
            <a href="#"><img src="images/logo.png" alt="Logo"></a>
          </div>

       <!--    <div class="search-input">
            <form>
              <input type="search" class="form-control" placeholder="Search Service provider & service you need">

              <button class="search-btn">
                <svg version="1.1" id="Layer_1" x="0px" y="0px" width="122.879px" height="119.799px"
                  viewBox="0 0 122.879 119.799" enable-background="new 0 0 122.879 119.799" xml:space="preserve">
                  <g>
                    <path
                      d="M49.988,0h0.016v0.007C63.803,0.011,76.298,5.608,85.34,14.652c9.027,9.031,14.619,21.515,14.628,35.303h0.007v0.033v0.04 h-0.007c-0.005,5.557-0.917,10.905-2.594,15.892c-0.281,0.837-0.575,1.641-0.877,2.409v0.007c-1.446,3.66-3.315,7.12-5.547,10.307 l29.082,26.139l0.018,0.016l0.157,0.146l0.011,0.011c1.642,1.563,2.536,3.656,2.649,5.78c0.11,2.1-0.543,4.248-1.979,5.971 l-0.011,0.016l-0.175,0.203l-0.035,0.035l-0.146,0.16l-0.016,0.021c-1.565,1.642-3.654,2.534-5.78,2.646 c-2.097,0.111-4.247-0.54-5.971-1.978l-0.015-0.011l-0.204-0.175l-0.029-0.024L78.761,90.865c-0.88,0.62-1.778,1.209-2.687,1.765 c-1.233,0.755-2.51,1.466-3.813,2.115c-6.699,3.342-14.269,5.222-22.272,5.222v0.007h-0.016v-0.007 c-13.799-0.004-26.296-5.601-35.338-14.645C5.605,76.291,0.016,63.805,0.007,50.021H0v-0.033v-0.016h0.007 c0.004-13.799,5.601-26.296,14.645-35.338C23.683,5.608,36.167,0.016,49.955,0.007V0H49.988L49.988,0z M50.004,11.21v0.007h-0.016 h-0.033V11.21c-10.686,0.007-20.372,4.35-27.384,11.359C15.56,29.578,11.213,39.274,11.21,49.973h0.007v0.016v0.033H11.21 c0.007,10.686,4.347,20.367,11.359,27.381c7.009,7.012,16.705,11.359,27.403,11.361v-0.007h0.016h0.033v0.007 c10.686-0.007,20.368-4.348,27.382-11.359c7.011-7.009,11.358-16.702,11.36-27.4h-0.006v-0.016v-0.033h0.006 c-0.006-10.686-4.35-20.372-11.358-27.384C70.396,15.56,60.703,11.213,50.004,11.21L50.004,11.21z" />
                  </g>
                </svg>
              </button>
            </form>
          </div> -->
        </div>

        <!-- <div class="header-right">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
              aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Post a task</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Login/Signup</a>
                </li>
              </ul>
            </div>

          </nav>

          <div class="right-btn">
            <a href="#" class="btn">Become a Provider</a>
          </div>
        </div> -->


      </div>
    </div>
  </header>

<style type="text/css">


/* remove the up/down spinner in number input
   source - https://css-tricks.com/snippets/css/turn-off-number-input-spinners/
*/

</style>

  <main id="main">
    
    <!-- <div class="alert verfy_number" role="alert">
      <i class="fa-solid fa-envelope"></i> A verification link has been sent to your email account
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fal fa-times"></i></span>
      </button>
    </div> -->
    <section class="login_account verfy_nubr">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <form action="{{url('otpverfy_mail')}}" method="post">
              @csrf
              <div class="account_form">
                <div class="ctnt_row">
                  <div class="ctnt_col" id="login">
                    <h4>Check your inbox</h4>
                    <p>Sent via SMS to your phone number <br> {{Auth::user()->number}} ( Number incorrect? Change )</p>
                    <p>@if(session()->has('successful_message'))
<div class="alert alert-success">
{{ session()->get('successful_message') }}
</div></p>
@endif
<!--                     <div class="row">
  <input id="otp-first" type="number" min="0" max="9" step="1" aria-label="first digit" />
  <input id="otp-second" type="number" min="0" max="9" step="1" aria-label="second digit" />
  <input id="otp-third" type="number" min="0" max="9" step="1" aria-label="third digit" />
  <input id="otp-fourth" type="number" min="0" max="9" step="1" aria-label="fourth digit" />
</div> -->
                    <div class="form-field group_input">
                      <input type="number" name="otp_first" id="otp-first" class="form-control" placeholder="7" maxlength="1" >
                      <input type="number" name="otp_second" id="otp-second" class="form-control" placeholder="0">
                      <input type="number" name="otp_third" id="otp-third" class="form-control" placeholder="2">
                      <input type="number" name="otp_fourth"  id="otp-fourth" class="form-control" placeholder="0">
                    </div>
                    <div class="login_btn">
                      <input type="submit" class="btn" value="Submit" id="submitvalue">
                    </div>
                  </form>
                    <div id="countdown"></div>

                   <a href="{{url('very_otpresend_mobile')}}"> <input type="button" class="btnLarge" value="Resend" name="submit" id="submit-form" disabled>
                   </a>

                  </div>
                </div>
              </div>
            <
          </div>
        </div>
      </div>
    </section>
  </main>

 @include('layouts.footer')
  
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
<script type="text/javascript" src="https://harshen.github.io/jquery-countdownTimer/jquery.countdownTimer.min.js"></script>
<script type="text/javascript">
 /* $(function(){
  $("#seconds_timer").countdowntimer({
  });
})*/
  var timeleft = 30;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "Time Over";
  } else {
    document.getElementById("countdown").innerHTML = timeleft + " seconds remaining";
  }
  timeleft -= 1;
}, 1000);
  window.setTimeout(setEnabled, 30000);
 window.setTimeout(setEnableder, 30000);
function setEnabled() {
  var submitButton = document.getElementById('submit-form');
  if (submitButton) {
    submitButton.disabled = false;
  }
}
function setEnableder() {
  var submitButton = document.getElementById('submitvalue');
  if (submitButton) {
    submitButton.disabled = true;
  }
}

console.clear();
let inputs = document.querySelectorAll("input");
let values = Array(4);
let clipData;
inputs[0].focus();

inputs.forEach((tag, index) => {
  tag.addEventListener('keyup', (event) => {
    if(event.code === "Backspace" && hasNoValue(index)) {
      if(index > 0) inputs[index - 1].focus();
    }
    
    //else if any input move focus to next or out
    else if (tag.value !== "") {
      (index < inputs.length - 1) ? inputs[index + 1].focus() : tag.blur();
    }
    
    //add val to array to track prev vals
    values[index] = event.target.value;
  });
  
  tag.addEventListener('input', () => {
    //replace digit if already exists
    if(tag.value > 10) {
      tag.value = tag.value % 10;
    }
  });
  
  tag.addEventListener('paste', (event) => {
    event.preventDefault();
    clipData = event.clipboardData.getData("text/plain").split('');
    filldata(index);
  })
})

function filldata(index) {
  for(let i = index; i < inputs.length; i++) {
    inputs[i].value = clipData.shift();
  }
}

function hasNoValue(index) {
  if(values[index] || values[index] === 0) 
    return false;
  
  return true;
}
</script>
<!-- Script for registration -->  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/latest/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/latest/respond.min.js"></script>
     <![endif]-->
</body>

</html>