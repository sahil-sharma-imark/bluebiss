@include('layouts.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <main id="main">
    <section class="provider-list-banner">
      <div class="container">
        <div class="provider-list-row">
          <div class="provider-list-title">
            
            <h1>Broadcast your task</h1>
  
              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
          </div>
  
          <div class="broad-task-btn"> 
            <a class="btn" href="#">Broadcast Task</a>
          </div>
        </div>
      </div>
    </section>

    <section class="provider-listing">
      <div class="container">
        <h4> {{ $search_service['searchitem']}} near you</h4>

        <div class="provider-listing-row">
          <div class="provider-listing-left">
              <div class="provider-listing-box">
                <strong>Sort by</strong>

                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="shipping">
                    <span></span>
                    Latest

                  </label>
                </div>

                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="shipping">
                    <span></span>
                    Recommended

                  </label>
                </div>

                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="shipping">
                    <span></span>
                    Price (lowest to highest)

                  </label>
                </div>

                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="shipping">
                    <span></span>
                    Price (highest to lowest)

                  </label>
                </div>
              </div>

              <div class="provider-listing-box">
                <strong>Time of day</strong>

                <div class="check-box-radius check-box-radius-forPX">
                  <label>
                    <input type="radio" name="shipping">
                    <span><i class="check-icon"></i></span>
                    Morning (8am - 12pm)

                  </label>
                </div>

                <div class="check-box-radius check-box-radius-forPX">
                  <label>
                    <input type="radio" name="shipping">
                    <span><i class="check-icon"></i></span>
                    Afternoon (12pm - 5pm)

                  </label>
                </div>

                <div class="check-box-radius check-box-radius-forPX">
                  <label>
                    <input type="radio" name="shipping">
                    <span><i class="check-icon"></i></span>
                    Evening (5pm - 9:30pm)

                  </label>
                </div>

                <div class="check-box-radius check-box-radius-forPX">
                  <label>
                    <input type="radio" name="shipping">
                    <span><i class="check-icon"></i></span>
                    Flexible Timing

                  </label>
                </div>
              </div>

              <div class="provider-listing-box">
                <div class="price-reset">
                  <strong>Price</strong>

                  <a class="link" href="#">Reset</a>
                </div>

                <div class="Price-by-range-main">
                  <div id="Price-by-range" class="check-box-radius">
                    <label>
                      <input type="radio" name="shipping">
                      <span><i class="check-icon"></i></span>
                      Price by range
  
                    </label>
                  </div>
   
                  <div id="PriceRange" class="range" style="display: none;">
                    <form>
                        <input type="hidden" name="min-value" value="">
                        <input type="hidden" name="max-value" value="">
                    </form>
                    <div id="slider-range"></div>
  
                    <div class="price-range-row">
                      <span class="slid-range-value" id="slider-range-value1"></span>
  
                      <span class="das"></span>
  
                      <span class="slid-range-value" id="slider-range-value2"></span>
                     </div>
                  </div>
                </div>
  
              </div>

              <div class="provider-listing-box provider-listing-bottom-box">
                  <figure>
                    <img src="images/" alt="">
                  </figure>              
                  
                  <p>Always have peace of mind. All provider undergo ID and criminal background checks. 
                    <a class="link" href="#">Learn More</a>
                  </p>
              </div>
          </div>

          <div class="provider-listing-right">
                 
            @foreach($all_s_details as $all_s_detail)
            
              
             @php

                $latitude1 = $search_service['lat'];
                $longitude1 = $search_service['lng'];
                $latitude2 = $all_s_detail->lat; 
                $longitude2 = $all_s_detail->lng;
                $unit = 'kilometers';
                $theta = $longitude1 - $longitude2;
                $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
                $distance = acos($distance);
                $distance = rad2deg($distance);
                $distance = $distance * 60 * 1.1515;
                switch($unit) {
                  case 'miles':
                  break;
                  case 'kilometers' :
                  $distance = $distance * 1.609344;
                }
                $dis =  round($distance,2);

                @endphp
                @if($dis - $all_s_detail->loc_radius <= $all_s_detail->loc_radius )

               <?php $rr = DB::table("listed_services")->where("listing_id",$all_s_detail->listing_id)
                 ->join('users','listed_services.lis_providerid', "=" ,'users.id')
                 ->join('provider_listing','listed_services.lis_providerid', "=" ,'provider_listing.provider_id')
                 ->where('listed_services.service_name',$all_s_detail->service_name)
                 ->select(
                  'users.id as providerid',
                  'users.image as providerimage',
                  'users.name as providername',
                  'users.lastname as providerlastname',
                  'provider_listing.price_per_hour as price',
                  'provider_listing.description as providerdes',)
                 ->first();
               
               ?>

               <div class="provider-listing-box-right">
                <div class="provider-listing-info">
                  <div class="provider-listing-info-top">
                    <div class="provider-listing-about-info">
                      <figure>
                        <img src="{{asset('uploads/provider/'.$rr->providerid.'/'.$rr->providerimage)}}" alt="">
                      </figure>
                      <div class="provider-listing-about">
                        <h5 id="kdldl">{{$rr->providername.' '.$rr->providerlastname}}
                          <svg xmlns="http://www.w3.org/2000/svg" width="15.104" height="20" viewBox="0 0 15.104 20">
                            <g id="badge" transform="translate(-0.002 0.001)">
                              <path id="Path_24108" data-name="Path 24108" d="M14.9,367.339a2.405,2.405,0,0,1-2.762-1.005,2.41,2.41,0,0,1-1.448-.561q-.078-.065-.149-.136l-1.306,2.734a.593.593,0,0,0,.667.835l2.619-.594,1.183,2.411a.594.594,0,0,0,.533.332h0a.593.593,0,0,0,.532-.338l1.519-3.178a2.411,2.411,0,0,1-1.39-.5Zm0,0" transform="translate(-8.819 -351.355)" fill="#47bbd0"></path>
                              <path id="Path_24109" data-name="Path 24109" d="M200.978,365.773a5.056,5.056,0,0,0-2.658,1.534,2.41,2.41,0,0,1-1.552.032,2.411,2.411,0,0,1-1.39.5l1.519,3.178a.594.594,0,0,0,.532.337h0a.593.593,0,0,0,.533-.332l1.183-2.411,2.619.594a.593.593,0,0,0,.667-.835l-1.307-2.734Q201.056,365.708,200.978,365.773Zm0,0" transform="translate(-187.745 -351.355)" fill="#47bbd0"></path>
                              <path id="Path_24110" data-name="Path 24110" d="M14.846,7.284A1.22,1.22,0,0,0,14.531,5.5a.593.593,0,0,1-.25-.686,1.22,1.22,0,0,0-.907-1.571.593.593,0,0,1-.47-.559,1.22,1.22,0,0,0-1.389-1.166.593.593,0,0,1-.632-.365,1.219,1.219,0,0,0-1.7-.62A.594.594,0,0,1,8.46.4,1.22,1.22,0,0,0,6.647.4.594.594,0,0,1,5.927.53a1.219,1.219,0,0,0-1.7.62.593.593,0,0,1-.632.365A1.22,1.22,0,0,0,2.2,2.682a.594.594,0,0,1-.47.56,1.22,1.22,0,0,0-.907,1.57.594.594,0,0,1-.25.686A1.22,1.22,0,0,0,.26,7.284a.593.593,0,0,1,0,.73A1.22,1.22,0,0,0,.575,9.8a.593.593,0,0,1,.25.686,1.22,1.22,0,0,0,.907,1.571.593.593,0,0,1,.47.56,1.22,1.22,0,0,0,1.389,1.166.593.593,0,0,1,.632.365,1.22,1.22,0,0,0,1.7.62.593.593,0,0,1,.719.127,1.22,1.22,0,0,0,1.813,0,.593.593,0,0,1,.719-.127,1.22,1.22,0,0,0,1.7-.62.593.593,0,0,1,.633-.365,1.22,1.22,0,0,0,1.389-1.166.593.593,0,0,1,.469-.56,1.22,1.22,0,0,0,.907-1.571.593.593,0,0,1,.25-.686,1.219,1.219,0,0,0,.315-1.786.593.593,0,0,1,0-.73ZM7.553,12.848a5.2,5.2,0,1,1,5.2-5.2A5.205,5.205,0,0,1,7.553,12.848Zm0,0" fill="#f9a52b"></path>
                              <path id="Path_24111" data-name="Path 24111" d="M94.614,93.105a4.013,4.013,0,1,0,4.013,4.013A4.017,4.017,0,0,0,94.614,93.105Zm-2.506,3.277a.593.593,0,0,1,.839,0l1.183,1.183,2.152-2.152a.593.593,0,0,1,.839.839l-2.571,2.572a.593.593,0,0,1-.839,0l-1.6-1.6a.593.593,0,0,1,0-.839Zm0,0" transform="translate(-87.06 -89.469)" fill="#f9a52b"></path>
                            </g>
                          </svg>
                        </h5>
                        <div class="ratings">4.3 <i class="fa-solid fa-star"></i> Ratings</div>
                        <ul class="task-list">
                          <li>
                            <img src="images/check-icon.png" alt="">
                              3 Tasks Complete
                          </li>
                          <li>
                            <img src="images/check-icon.svg" alt="">
                            All Information verifed
                            <span class="info-icon">
                              <img src="images/info-gray-icon.svg" alt="">
                              <div class="info-detail">
                                -Registered business <br>-(Insert Number) Year(s) in business <br>-Licensed to operate <br>-No-Show Reimbursement Guarantee <br>-Late-Fee Guarantee <br>-Money Back Guarantee <br>-Insured
                              </div>
                            </span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="right-view">
                      <div class="hou-price">${{$rr->price}}/Hour </div>
                      <form method="POST" action="/send-request">
                        @csrf
                        <a class="btn send-request-bnt" href="{{url('task-details/?requstid=' .$rr->providerid)}}"> <img src="images/send.svg" alt="">Send Request</a>
                        
                         
                        


                        <a class="btn view-profile-bnt" href="{{ url('provider-profile-preview/'.$rr->providerid)}}">View Profile</a>
                      </form>
                    </div>
                  </div>
                  <h6>About Me :</h6>
                  <p>{{$rr->providerdes}}</p>
                  <div class="read-more"><a class="link" href="#">Read More</a></div>
                  <div class="task-detail-info"><img src="images/info-icon.svg" alt=""> You can chat with your provider adjust task details, or change task time after booking.</div>
                </div>
              </div>
              @endif
              @endforeach

            <main id="main" class="notfound">
              <section class="recent-requests"> 
                <div class="container">
                  <div class="recent-requests-content">
                    <figure>
                      <img src="images/requests-img.svg" alt="">
                    </figure>
            
                    <h5>No Data Found </h5>
                    <p>No one service provider is in your range</p>
                  </div>
                </div>
              </section>
            </main>

























            <ul class="pagination-mn">
              <div class="page-count">
                  <span>Page 1 of 18</span>
              </div>
              <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-left"></i></a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link active" href="#"><i class="fa-solid fa-angle-right"></i></a></li>
            </ul>

          </div>
        </div>
      </div>
    </section>

    <section class="FAQ_main">
      <div class="container">
        <h4>Frequently Asked Questions</h4>

        <div class="FAQ_content">
          <h5>What about your pets?</h5>

          <p>Cleaning services in Durban know they must handle your home with all its unique features, even your pets. But they may have additional guidelines:</p>

          <p>1. They may ask additional fees to clean up after pets.</p>

          <p>2. They may request pets be placed outside for the duration of the cleaning.</p>

          <hr>

          <h5>What cleaning products will be used?</h5>
          <P>You should have a say about what products are used in your home. This is especially important if your family or your pets are allergic to certain chemicals. You may also prefer eco-friendly products be used.</P>

           <p>Cleaning services in Durban know how important this is to home owners and are usually flexible in this regard. You can ask them to use the products you purchase or you can ask what they use so you can research the ingredients.</p>

          <hr>


          <h5>What about your leather furniture?</h5>

          <p>Yes it’s nerve wrecking leaving your valuable possessions in other people’s hands. But through Snupit’s process you’ll get capable cleaning services in Durban that know how to handle unique home features.</p>

        <p>Some cleaning services in Durban have specialities. Pick ones that are known to take good care of leather or wooden furniture. You can ask for references or ask them about which products they plan on using. You may find someone who will look after your furniture better than you can.</p>

        <hr>

        <h5>What are your responsibilities towards the cleaning staff?</h5>

        <p>Yes you’re responsible for anyone working on your premises. There are certain health and safety requirements, but cleaning services in Durban will take care of this on your behalf. They have contracts with all workers so you don’t have to be concerned about safety, liability or wages.</p>

        <p>You can discuss additional responsibilities with the cleaning service to prevent misunderstandings and create a healthy working environment:</p>

        <p>1. Ask if tips are expected</p>

        <p>2. Enquire if meals must be supplied</p>

        <p> 3. Will staff take a lunch break on your premises?</p>

        <hr>

        <h5>Why Bluebis?</h5>

        <p>1. You never pay to use Bluebis. It’s free and you get to compare multiple quotes from the best cleaning services in Durban.</p>

         <p>2. Professionals listed on the Bluebis platform are experienced, friendly and background-checked. Our numbers say it all! Of the 76 reviews for cleaning services, our customers have had a positive and a rewarding experience with 64 cleaning service projects.</p> 

        <p>3. Choose from 24302 trusted and high quality professionals in Durban who can assist you with just about anything you need done.</p>

          <p class="mb-0">4. Don’t overpay for any service, hire a local expert from our talent pool of 173 cleaning service professionals in Durban who are skilled and vetted.</p>
        
        </div> 

        <div>

        </div>
      </div>
    </section>
    

  </main>

<script type="text/javascript">
  $(document).ready(function(){
    var idkdldl = $("#kdldl").text();
    if(idkdldl.length>0){
      $(".notfound").hide();
    }else{
       $(".notfound").show();
    }
  })
</script>
  @include('layouts.footer')