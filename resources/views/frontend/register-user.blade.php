@include('layouts.header')
<main id="main">
  <div class="alert verfy_number" role="alert">
    
  </div>
  <section class="login_account verfy_nubr">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="account_form">
            <div class="ctnt_row">
              <div class="ctnt_col" id="login">
                <h4>Email ID already registered as aprovider</h4>
                <div class="login_btn">
                  <a href="{{url('login')}}" class="btn">Go to Login or Forget Password</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@include('layouts.footer')