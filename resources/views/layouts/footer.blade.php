@php
$get_header_data = DB::table('bluebis_admin_setting')->where('id',1)->first();
@endphp
<!-- <section class="pop-up-product">
    <div class="overlay"></div>
    <div class="quick-popup">

        <div class="popup__close">
            <h6 class="cancel">X</h6>
        </div>
        <figure>
            <img src="{{asset('/images/check_mark.jpg')}}" alt="icn">
        </figure>
        <p id="replacetxt">An account is successfully created.</p>
    </div>
</section> -->
<footer id="footer">
    <div class="container">
      <div class="footer-top">
        <div class="ftr-grid">
          <div class="footer-col footer-left">
            <div class="footer-left-logo">
              <a class="footer-logo" href="#">
                <img src="{{asset('uploads/admin/setting/'.$get_header_data->logo_img)}}" alt="">
                
              </a>

              <p>I work in project management and joined Zaaruu because I get great for less.</p>
            </div>
          </div>

          <div class="footer-col">
            <h6>Discover</h6>

            <ul class="footer-link">
              <li><a href="{{url('sign-up')}}">Sign Up</a></li>
              <li><a href="{{url('become-provider')}}">Become a Provider</a></li>
              <li><a href="{{url('all-services')}}">All Services</a></li>
              <li><a href="{{url('deals-discount/?id=1')}}">Deals & Discounts</a></li>
              <li><a href="{{url('career-opportunities')}}">Get a Quote</a></li>
              <li><a href="{{url('career-opportunities')}}">Career Opportunities</a></li>
              <li><a href="{{url('blogs')}}">Blog</a></li>
              <li><a href="{{url('about')}}">About Us</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h6>Support</h6>

            <ul class="footer-link">
              <li><a href="{{url('help')}}">Help</a></li>
              <li><a href="{{url('contact')}}">Contact Us</a></li>
              <li><a href="{{url('faq')}}">FAQ</a></li>
              <li><a href="{{url('how-its-work')}}">How it Works</a></li>
              <li><a href="{{url('how-to-create-project')}}">How to create a project</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h6>Policies</h6>

            <ul class="footer-link">
              <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
              <li><a href="{{url('review-policy')}}">Review Policy</a></li>
              <li><a href="{{url('terms-&-conditions')}}">Terms of Use</a></li>
              <li><a href="{{url('cancellation-policy')}}">Cancellation Policy</a></li>
            </ul>
          </div>

          <div class="footer-col">
            <h6>Follow Us</h6>

            <ul class="social">
                @if(isset($get_header_data->setting_facebook_link))
                <li><a href="{{ $get_header_data->setting_facebook_link}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                @endif
                @if(isset($get_header_data->setting_insta_link))
                <li><a href="{{ $get_header_data->setting_insta_link}}"><i class="fa-brands fa-instagram"></i></a></li>
                @endif
                @if(isset($get_header_data->setting_twitter_link))
                <li><a href="{{ $get_header_data->setting_twitter_link}}"><i class="fa-brands fa-twitter"></i></a></li>
                @endif
                @if(isset($get_header_data->setting_youtube_link))
                <li><a href="{{ $get_header_data->setting_youtube_link}}"><i class="fa-brands fa-youtube"></i></a></li>
                @endif
                @if(isset($get_header_data->setting_tiktok_link))
                <li><a href="{{ $get_header_data->setting_tiktok_link}}"><i class="fa-brands fa-tiktok"></i></a></li>
                @endif
              @endphp
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
  <script src="{{asset('js/bundle.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
  <!-- <script src="{{asset('js/gapp.js')}}"></script> -->

  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<!-- Custom Css -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> 
<!-- for ckeditor -->
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<!-- For select 2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!-- Home page slider search category start -->
<script>
  var availableTags = [];
  $.ajax({
    method: "GET",
    url: "/product-list",
    success: function(response){
    //console.log(response);
      startAutoComplete(response);
    }
  });
  function startAutoComplete(availableTags)
  {
    $( "#search_item" ).autocomplete({
      source: availableTags
    });
  }
</script>
<!-- Home page slider search category end -->



  <!-- Script for header search -->

<script>
  $(document).ready(function(){
    $('#sea').on('keyup',function(){
      var value = $(this).val();
      
        $.ajax({
          url:"/searchheader",
          method:"GET",
          data:{'name':value},
          success:function(data)
          {
            $("#header_sug").html(data);
          }
        });
     
    });
    $(document).on('click','li .r',function(){
      var value = $(this).text();
      $("#sea").val(value);
      $("#header_sug").html("");
    });
  });
</script>
<!-- Don not remove -->
<!-- <script type="text/javascript">
  var route = "{{ url('autocomplete-search') }}";
  $('#sea').typeahead({
    source: function (query, process) {
      return $.get(route, {
        query: query
      }, function (data) {
        return process(data);
      });
    }
  });
</script> -->



</body>
</html>