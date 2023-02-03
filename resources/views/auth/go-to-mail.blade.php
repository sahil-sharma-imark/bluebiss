@include('layouts.header')

  <main id="main">
    <section class="login_account verfy_nubr">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <form>
              <div class="account_form">
                <div class="ctnt_row mail_sent">
                  <div class="ctnt_col">
                    <figure>
                      <img src="images/go_to.jpg">
                    </figure>
                    <h4>Mail Sent</h4>
                    <p>Click hear to go your inbox <a  href="mailto:example@gmail.com" target="_blank">example@gmail.com</a></p>
                    <div class="login_btn">
                      <!-- <input type="submit" class="btn" value="Go to mail"> -->
                      <a href="https://mail.google.com/" type="submit" class="btn" target="_blank">Go to mail</a>
                    </div>
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