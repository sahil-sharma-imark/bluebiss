@include('layouts.header')
  <main id="main">
    <section class="banner">
      <figure class="banner-img">
        <img src="{{asset('uploads/admin/homepage/'.$homepahe_first->sec1_img)}}" alt="">
      </figure>

      <div class="container">
        <div class="banner-content">
          <h1> <?php echo Session::get('qty');?> {{$homepahe_first->sec1_title}} </h1>

          <div class="location">
            <form method="POST" action="/products-list">

              <div class="location-sear">
                 @csrf
                <input type="search" class="form-control"  name="google_address" id="autocomplete" placeholder="Location" required>

                 <input type="hidden" name="g_lat" id="lat">
                 <input type="hidden" name="g_lng" id="lng">

                <span class="search-btn">
                  <svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 368.553 368.553"
                    style="enable-background:new 0 0 368.553 368.553;" xml:space="preserve">
                    <g>
                      <g>
                        <path d="M184.277,0c-71.683,0-130,58.317-130,130c0,87.26,119.188,229.855,124.263,235.883c1.417,1.685,3.504,2.66,5.705,2.67
      c0.011,0,0.021,0,0.032,0c2.189,0,4.271-0.957,5.696-2.621c5.075-5.926,124.304-146.165,124.304-235.932
      C314.276,58.317,255.96,0,184.277,0z M184.322,349.251C160.385,319.48,69.277,201.453,69.277,130c0-63.411,51.589-115,115-115
      s115,51.589,115,115C299.276,203.49,208.327,319.829,184.322,349.251z" />
                        <path d="M184.277,72.293c-30.476,0-55.269,24.793-55.269,55.269s24.793,55.269,55.269,55.269s55.269-24.793,55.269-55.269
      S214.753,72.293,184.277,72.293z M184.277,167.83c-22.204,0-40.269-18.064-40.269-40.269s18.064-40.269,40.269-40.269
      s40.269,18.064,40.269,40.269S206.48,167.83,184.277,167.83z" />

                      </g>
                    </g>

                  </svg>
                </span>
              </div>

              <div class="location-sear">
                <input type="search" class="form-control" name="item_name" id="search_item" placeholder="What service you need" required >
                <!-- <input type="search" class="form-control" placeholder="What service you need"> -->
                

                <span class="search-btn">
                  <svg version="1.1" id="Layer_1" x="0px" y="0px" width="122.879px" height="119.799px"
                    viewBox="0 0 122.879 119.799" enable-background="new 0 0 122.879 119.799" xml:space="preserve">
                    <g>
                      <path
                        d="M49.988,0h0.016v0.007C63.803,0.011,76.298,5.608,85.34,14.652c9.027,9.031,14.619,21.515,14.628,35.303h0.007v0.033v0.04 h-0.007c-0.005,5.557-0.917,10.905-2.594,15.892c-0.281,0.837-0.575,1.641-0.877,2.409v0.007c-1.446,3.66-3.315,7.12-5.547,10.307 l29.082,26.139l0.018,0.016l0.157,0.146l0.011,0.011c1.642,1.563,2.536,3.656,2.649,5.78c0.11,2.1-0.543,4.248-1.979,5.971 l-0.011,0.016l-0.175,0.203l-0.035,0.035l-0.146,0.16l-0.016,0.021c-1.565,1.642-3.654,2.534-5.78,2.646 c-2.097,0.111-4.247-0.54-5.971-1.978l-0.015-0.011l-0.204-0.175l-0.029-0.024L78.761,90.865c-0.88,0.62-1.778,1.209-2.687,1.765 c-1.233,0.755-2.51,1.466-3.813,2.115c-6.699,3.342-14.269,5.222-22.272,5.222v0.007h-0.016v-0.007 c-13.799-0.004-26.296-5.601-35.338-14.645C5.605,76.291,0.016,63.805,0.007,50.021H0v-0.033v-0.016h0.007 c0.004-13.799,5.601-26.296,14.645-35.338C23.683,5.608,36.167,0.016,49.955,0.007V0H49.988L49.988,0z M50.004,11.21v0.007h-0.016 h-0.033V11.21c-10.686,0.007-20.372,4.35-27.384,11.359C15.56,29.578,11.213,39.274,11.21,49.973h0.007v0.016v0.033H11.21 c0.007,10.686,4.347,20.367,11.359,27.381c7.009,7.012,16.705,11.359,27.403,11.361v-0.007h0.016h0.033v0.007 c10.686-0.007,20.368-4.348,27.382-11.359c7.011-7.009,11.358-16.702,11.36-27.4h-0.006v-0.016v-0.033h0.006 c-0.006-10.686-4.35-20.372-11.358-27.384C70.396,15.56,60.703,11.213,50.004,11.21L50.004,11.21z" />
                    </g>
                  </svg>
                </span>

                <button type="submit" class="btn" >Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>



    <section class="rating">
      <div class="container">
        <div class="row">

          @foreach($headertop_all as $headertop_all_value)
          <div class="col-md-3">
            <div class="rating-content">
              <figure class="warning-bg">
                <img src="{{asset('uploads/admin/header_top/'.$headertop_all_value->icon)}}" alt="">
              </figure>

              <div class="rating-right-content">
                <div class="rating-text">{{$headertop_all_value->title_one}}<br>{{$headertop_all_value->title_two}}</div>
              </div>
            </div>
          </div>
          @endforeach
          
          
        </div>
      </div>
    </section>

    <section class="need">
      <div class="container">
        <h2 class="heading-mb">{{$homepahe_first->sec2_title}}</h2>

        <div class="need-row">
          

          
          @foreach($sub_category_show as $sub_category_value)
          <div class="need-col">
            <figure>
              <a style="color: #000" href="{{url('task-details?name='.$sub_category_value->name)}}"><img src="{{asset('uploads/sub-category/'.$sub_category_value->image)}}" alt=""> 
            </figure></a> 

            <div class="need-text">
              <a style="color: #000" href="{{url('task-details?name='.$sub_category_value->name)}}">{{$sub_category_value->name}}</a> 
              
            </div>
          </div>
          @endforeach

          


        </div>
      </div>
    </section>
    @if(count($popular_cat)>0)
    <section class="categor">
      <div class="container">
        <h4 class="heading-mb">{{$homepahe_first->sec3_title}}</h4>

        <div class="row">
          @foreach($popular_cat as $service)
          <div class="col-md-3">
            <div class="categor-content">
              <figure>
                <a style="color: #000" href="{{url('task-details?name='.$service->name)}}"><img src="{{asset('uploads/sub-category/'.$service->image)}}" alt=""></a>
              </figure>

              <div class="categor-bottom-content">
                <a style="color: #000" href="{{url('task-details?name='.$service->name)}}"><h6>{{$service->name}}</h6></a>

                
              </div>
            </div>
          </div>
          @endforeach

          
        </div>

        <div class="all-see-btn text-center">
          <a class="btn" href="{{url('all-services')}}">See all Catagories</a>
        </div>
      </div>
    </section>
    @endif

    <section class="work">
      <div class="container">
        <div class="title">
          <h3>{{$homepahe_first->sec4_title}}</h3>
        </div>

        <div class="row">

          
          @foreach($how_it_work as $how_it_work_data)
          <div class="col-md-4">
            <div class="work-content">
              <figure>
                <img src="{{asset('uploads/admin/how-it-work/'.$how_it_work_data->how_it_work_image)}}" alt="">
              </figure>

              <div class="work-content-bottm">
                <h5>{{$how_it_work_data->title}}</h5>

                <p>{!!$how_it_work_data->how_it_work_des!!}</p>
              </div>
            </div>
          </div>
          @endforeach

          

        </div>
      </div>
    </section>

    <section class="happiness">

      <div class="happiness-row">
        <div class="happiness-col">
          <div class="happiness-content">
            <h3>{{$homepahe_first->sec5_title}}</h3>

            {!!$homepahe_first->sec5_des!!}
          </div>
        </div>

        <div class="happiness-col">
          <figure>
            <img src="{{asset('uploads/admin/homepage/'.$homepahe_first->sec5_img)}}" alt="">
          </figure>
        </div>
      </div>
    </section>


    <section class="clients">
      <div class="container">
        <div class="title">
          <div class="small-text">{{$homepahe_first->sec6_subtitle}}</div>
          <h4>{{$homepahe_first->sec6_title}}</h4>
        </div>
      </div>

      <div class="clients-slider">
        <div class="clientsSlider1 client-slider-mb ">
          @foreach($testimonials_all as $testimonials_all_value)
          <div>
            <div class="clients-item">
              <div class="clients-item-top">
                <figure>
                  <img src="{{asset('uploads/admin/testimonial/'.$testimonials_all_value->testimonial_img)}}" alt="Client images">
                </figure>

                <div class="clients-info">
                  <h6>{{$testimonials_all_value->name}}</h6>

                  <p>{{$testimonials_all_value->profile}}</p>

                  <div class="start-list">
                    <a href="#">
                      <?php $star = $testimonials_all_value->testimonial_star?>
                      
                      @for($i=1; $i<=$star; $i++)
                      <i class="fa-solid fa-star"></i>                      
                      @endfor
                    </a>
                  </div>
                </div>
              </div>

              <div class="clients-item-bottom">
                <p>{!!$testimonials_all_value->testimonials_text!!}</p>
              </div>
            </div>
          </div>
          @endforeach

          

        </div>

        <div class="clientsSlider2 clients-slid-rtl" dir="rtl">
          @foreach($testimonials_all as $testimonials_all_value)
          <div>
            <div class="clients-item">
              <div class="clients-item-top">
                <figure>
                  <img src="{{asset('uploads/admin/testimonial/'.$testimonials_all_value->testimonial_img)}}" alt="Client images">
                </figure>

                <div class="clients-info">
                  <h6>{{$testimonials_all_value->name}}</h6>

                  <p>{{$testimonials_all_value->profile}}</p>

                  <div class="start-list">
                    <a href="#">
                      <?php $star = $testimonials_all_value->testimonial_star?>
                      
                      @for($i=1; $i<=$star; $i++)
                      <i class="fa-solid fa-star"></i>
                      @endfor
                    </a>
                  </div>
                </div>
              </div>

              <div class="clients-item-bottom">
                <p>{!!$testimonials_all_value->testimonials_text!!}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @php $count_rightprice = count($rightprice_all) @endphp
    @if($count_rightprice > 0)
    <section class="categor">
      <div class="container">
        <div class="title">
          <h4>{{$homepahe_first->sec7_title}}</h4>

          <p>{{$homepahe_first->sec7_subtitle}}</p>
        </div>
        <div class="row">
          @foreach($rightprice_all as $rightprice_all_value)
          <div class="col-md-3">
            <div class="categor-content">
              <figure>
                <img src="{{asset('uploads/admin/rightprice/'.$rightprice_all_value->rightprice_img)}}" alt="">
              </figure>

              <div class="categor-bottom-content">
                <h6>{{$rightprice_all_value->rightprice_title}}</h6>

                <div class="price"><span>$</span> {{$rightprice_all_value->rightprice_subtitle.' $'.$rightprice_all_value->rightprice_min.' — $'.$rightprice_all_value->rightprice_max}}0</div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="all-see-btn text-center">
        <a class="btn" href="#">See more cost Guides</a>
      </div>
      </div>
    </section>
    @endif

    <!--<section class="browse-service">-->
    <!--  <div class="container">-->
    <!--    <div class="title">-->
    <!--      <h4>Browse Top Service Professionals in USA</h4>-->

    <!--      <p>It is a long established fact that a reader will be distracted by the readable content of a page when-->
    <!--        looking at its layout. The</p>-->
    <!--    </div>-->

    <!--    <div class="row">-->
    <!--      <div class="col-md-3">-->
    <!--        <ul class="service-link">-->
    <!--          <li><a href="#">Trinidad and Tobago</a></li>-->
    <!--          <li><a href="#">District of Columbia</a></li>-->
    <!--          <li><a href="#">Arizona</a></li>-->
    <!--          <li><a href="#">Arkansas</a></li>-->
    <!--          <li><a href="#">California</a></li>-->
    <!--        </ul>-->
    <!--      </div>-->

    <!--      <div class="col-md-3">-->
    <!--        <ul class="service-link">-->
    <!--          <li><a href="#">Colorado</a></li>-->
    <!--          <li><a href="#">Connecticut</a></li>-->
    <!--          <li><a href="#">Delaware</a></li>-->
    <!--          <li><a href="#">District of Columbia</a></li>-->
    <!--          <li><a href="#">Florida</a></li>-->
    <!--        </ul>-->
    <!--      </div>-->

    <!--      <div class="col-md-3">-->
    <!--        <ul class="service-link">-->
    <!--          <li><a href="#">Georgia</a></li>-->
    <!--          <li><a href="#">Hawaii</a></li>-->
    <!--          <li><a href="#">Idaho</a></li>-->
    <!--          <li><a href="#">Illinois </a></li>-->
    <!--          <li><a href="#">Indiana</a></li>-->
    <!--        </ul>-->
    <!--      </div>-->

    <!--      <div class="col-md-3">-->
    <!--        <ul class="service-link">-->
    <!--          <li><a href="#">Iowa </a></li>-->
    <!--          <li><a href="#">Kansas</a></li>-->
    <!--          <li><a href="#">Kentucky</a></li>-->
    <!--          <li><a href="#">Louisiana</a></li>-->
    <!--          <li><a href="#">Massachusetts</a></li>-->
    <!--        </ul>-->
    <!--      </div>-->
    <!--    </div>-->

    <!--  </div>-->
    <!--</section>-->

    <section class="getnow" style="background-image: url('././images/getnow-bg-img.png');">
      <div class="container">
        <h3>Have something to do? Get it done today.</h3>

        <a class="get-btn" href="#">Get Quote Now</a>
      </div>
    </section>

  </main>


  @include('layouts.footer')
  <script type="text/javascript">
     
      var placeSearch, autocomplete;
      function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
         autocomplete.setComponentRestrictions({'country': ['in']});
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
         $("#hidden_address").val($("#autocomplete").val());
        $("#lat").val(place.geometry.location.lat());
        $("#lng").val(place.geometry.location.lng());
        $("#lat_lng").val(''+$("#lat").val()+' '+$("#lng").val()+'')
       
       $("#hidden_address").val($("#autocomplete").val());
   

      }
   
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtZNVT318F-HYweBrZWJBM5k0KgSiMDKc&libraries=places&callback=initAutocomplete" async defer></script>

  