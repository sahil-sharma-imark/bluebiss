@include('layouts.header')

  <main id="main">
    <section class="login_account">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="ctnt">
              <h5>#1 Trinidad and Tobago ondemand service provider platform for cleaning, painting & more.</h5>
              <figure>
                <img src="images/sign_up.jpg" alt="Login_account">
              </figure>
            </div>
          </div>
          <div class="col-md-6">
            <form method="POST" action="{{ route('password.email') }}">
            @csrf
              <div class="account_form">
                <div class="ctnt_row">
                  <div class="ctnt_col" id="login">
                    <h4>Forgot Password</h4>
                    <p>Enter the email address associated with your account and we'll send you a link to reset your
                      password.</p>
                    <div class="form-field">
                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Enter email addressr" required autofocus  />
                      <!-- <input type="text" class="form-control" placeholder="Enter email addressr"> -->
                        @if (session('status'))
                          <div class="alert alert-success" role="alert">
                            <script>window.location = "/go-to-mail";</script>
                          </div>
                        @endif
                      <small style="color: #FF5757;">This is not the registered email address</small>
                    </div>
                    <div class="login_btn">
                      <!-- <input type="submit" class="btn" value="Submit"> -->
                      <x-button class="btn">{{ __('Submit') }}</x-button>
                    </div>
                    <p class="signup_btn">Don't have an account ? <a href="#">Sign Up</a></p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer">
    <div class="container">
      <div class="footer-top">
        <div class="ftr-grid">
          <div class="footer-col footer-left">
            <div class="footer-left-logo">
              <a class="footer-logo" href="#">
                <img src="images/logo.png" alt="">
              </a>

              <p>I work in project management and joined Zaaruu because I get great for less.</p>
            </div>
          </div>

          <div class="footer-col">
            <h6>Discover</h6>

            <ul class="footer-link">
              <li><a href="#">Sign Up</a></li>
              <li><a href="#">Become a Provider</a></li>
              <li><a href="#">All Services</a></li>
              <li><a href="#">Deals & Discounts</a></li>
              <li><a href="#">Get a Quote</a></li>
              <li><a href="#">Career Opportunities</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">About Us</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h6>Support</h6>

            <ul class="footer-link">
              <li><a href="#">Help</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">How it Works</a></li>
              <li><a href="#">How to create a project</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h6>Policies</h6>

            <ul class="footer-link">
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Review Policy</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Cancellation Policy</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h6>Follow Us</h6>

            <ul class="social">
              <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="copy-write">
      <div class="container">
        <p>Copyright © 2021 All rights reserved</p>
      </div>
    </div>
  </footer>

  <!-- jQuery first, then Bootstrap JS. -->
  <script src="js/bundle.min.js"></script>
  <script src="js/custom.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/latest/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/latest/respond.min.js"></script>
     <![endif]-->
</body>

</html>
