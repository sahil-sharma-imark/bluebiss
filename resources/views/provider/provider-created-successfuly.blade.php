@include('layouts.header')




<main id="main" class="bg-color-gray">
  <section class="business-detail task-detail-sec">
    <div class="container">
      <div class="main_wrap">
        <fieldset>
          <div class="wrap_bg">
            <div class="congratulations">
              <figure>
                <img src="images/Congratulations.jpg" alt="Congratulations! You're well on your way to being a Blue Ibis Member.">
              </figure>
              <h6>Congratulations! <br>  You're well on your way to being <br> a Blue Ibis Member.</h6>
              <P>Once your application is processed, you will receive a  <br> notification. You will then be able to receive job <br> opportunities that match your profile.</P>
              <div class="bnt-right">
                <a class="btn" href="{{url('login')}}">View Profile</a>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </section>
</main>
@include('layouts.footer')

<!-- jQuery first, then Bootstrap JS. -->
<script src="js/bundle.min.js"></script>
<script src="js/custom.js"></script>

<!-- Script for google map -->

    

    






</body>
</html>