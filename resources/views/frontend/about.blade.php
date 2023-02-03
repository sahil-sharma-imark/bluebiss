@include('layouts.header')

  <main id="main">
    <section class="inner-page-top">
      <div class="container">
        <h1>About Us</h1>

        <div class="menu-link-home">
          <ul>
            <li><a href="#">Home</a></li>
            <li>About Us</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="about-content">
              <div class="about-text">About Us</div>
              <h3>{{$aboutus_first->sec1_title}}</h3>

              {!!$aboutus_first->sec1_des!!}
            </div>
          </div>

          <div class="col-md-6">
            <div class="about-images">
              <div class="row">
                <div class="col-md-5 about-img-left">
                  <div class="about-img-top">
                    <figure>
                      <img src="images/about-img1.png" alt="">
                    </figure>
                  </div>

                  <div class="about-img-bottom">
                    <figure>
                      <img src="images/about-img2.png" alt="">
                    </figure>
                  </div>
                </div>

                <div class="col-md-7 about-img-right">

                  <figure>
                    <img src="images/about-img3.png" alt="">
                  </figure>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="communit">
      <div class="container">
        <div class="communit-content">
          <div class="title">
            <h3>{{$aboutus_first->sec2_title}}</h3>

            {!!$aboutus_first->sec2_des!!}
          </div>

          <div class="communit-row">
            <div class="communit-col">
              <strong>{{$aboutus_first->sec2_point1_title}}</strong>

              <span>{{$aboutus_first->sec2_point1_des}}</span>
            </div>
            <div class="communit-col">
              <strong>{{$aboutus_first->sec2_point2_title}}</strong>

              <span>{{$aboutus_first->sec2_point2_des}}</span>
            </div>
            <div class="communit-col">
              <strong>{{$aboutus_first->sec2_point3_title}}</strong>

              <span>{{$aboutus_first->sec2_point3_des}}</span>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="promot-about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="promot-about-images">
              <div class="row">
                <div class="col-md-6 promot-about-img-left">
                  <figure>
                    <img src="images/promot-about-img1.png" alt="">
                  </figure>
                </div>

                <div class="col-md-6 promot-about-img-right">

                  <div class="promot-about-img-top">
                    <figure>
                      <img src="images/promot-about-img2.png" alt="">
                    </figure>
                  </div>

                  <div class="promot-about-img-bottom">
                    <figure>
                      <img src="images/promot-about-img3.png" alt="">
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="promot-about-content">
              <h3>{{$aboutus_first->sec3_title}}</h3>

              {!!$aboutus_first->sec3_des!!}

              <ul class="dots-list">
                <li>{{$aboutus_first->sec3_p1}}</li>
                <li>{{$aboutus_first->sec3_p2}}</li>
                <li>{{$aboutus_first->sec3_p3}}</li>
                <li>{{$aboutus_first->sec3_p4}}</li>
                <li>{{$aboutus_first->sec3_p5}}</li>
                <li>{{$aboutus_first->sec3_p6}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="our-services">
      <div class="container">
        <div class="our-services-content">
          <div class="title">
            <h3>{{$aboutus_first->sec4_title}}</h3>

            {!!$aboutus_first->sec4_des!!}
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="our-services-box">
                <figure>
                  <!-- <img src="images/" alt=""> -->
                </figure>

                <h5>Tell us what you need</h5>

                <P>It is a long established fact that a reader will be distracted by the readable content of a page when
                  looking .</P>
              </div>
            </div>

            <div class="col-md-4">
              <div class="our-services-box">
                <figure>
                  <!-- <img src="images/" alt=""> -->
                </figure>

                <h5>Tell us what you need</h5>

                <P>It is a long established fact that a reader will be distracted by the readable content of a page when
                  looking .</P>
              </div>
            </div>

            <div class="col-md-4">
              <div class="our-services-box">
                <figure>
                  <!-- <img src="images/" alt=""> -->
                </figure>

                <h5>Tell us what you need</h5>

                <P>It is a long established fact that a reader will be distracted by the readable content of a page when
                  looking .</P>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>





    <!-- <section class="team">
      <div class="container">
        <h3>{{$aboutus_first->sec5_title}}</h3>

        <div class="team-slider-main">
          <div class="teamSlider">
            @foreach($our_team as $our_team_value)
            <div>
              <div class="team-slid-item">
                <figure>
                  <img src="{{asset('uploads/admin/team/'.$our_team_value->team_img)}}" alt="">
                </figure>

                <div class="team-content">
                  <div class="name">{{$our_team_value->team_name}}</div>

                  <div class="designation">-{{$our_team_value->team_designation}}</div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section> -->

    <!-- <section class="platform">
      <div class="container">
        <div class="title">
          <h4>{{$aboutus_first->sec6_title}}</h4>

          {!!$aboutus_first->sec6_des!!}
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="platform-img platform-img-largeheight ">
              <figure>
                <img src="images/platform-img1.png" alt="">
              </figure>
            </div>
          </div>

          <div class="col-md-4">
            <div class="platform-img platform-img-small-height mb-30">
              <figure>
                <img src="images/platform-img3.png" alt="">
              </figure>
            </div>

            <div class="platform-img platform-img-small-height">
              <figure>
                <img src="images/platform-img4.png" alt="">
              </figure>
            </div>
          </div>

          <div class="col-md-4">
            <div class="platform-img platform-img-largeheight">
              <figure>
                <img src="images/platform-img2.png" alt="">
              </figure>
            </div>
          </div>
        </div>
      </div>
    </section> -->

  </main>

  @include('layouts.footer')