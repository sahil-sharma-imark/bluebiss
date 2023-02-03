@include('layouts.header')
<main id="main">
<section class="login_account verfy_nubr">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="account_form">
              <div class="ctnt_row mail_sent">
                <div class="ctnt_col">
                  <figure>
                    <img src="images/check_mark.jpg" alt="check"> 
                  </figure>
                  <h4>Success!</h4>
                  <p>Thank you for registering</p>
                  <div class="login_btn ok_btn">
                    <!-- <input type="submit" class="btn" value="Ok"> -->
                    <!-- <button type="submit" class="btn">{{ url()->previous() }}</button> -->
                    <a type="submit" class="btn" href="{{ url()->previous() }}">Ok</a>
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