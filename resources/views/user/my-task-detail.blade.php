@include('layouts.header')

  <main id="main">

    <section class="tasks-detail-main">
      <div class="container">
        <div class="pro-tast-title">
          <h4>
            
            <a class="back-arrow" href="#"><i class="fa-solid fa-arrow-left"></i></a>

            {{$tasks_detail->cleaning_radio}}
            
          </h4>

          <div class="pro-tast-title-right">
            <ul class="list-trinid">
              <li>
                <span>
                  <img src="images/calendar.png" alt="">
                </span>

               {{date('d-M-Y', strtotime($tasks_detail->cleaning_radio))}}
              </li>
              
              <li>
                <span>
                  <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                    <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.75 -0.75)">
                      <path id="Path_24078" data-name="Path 24078" d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z" transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                      <path id="Path_24079" data-name="Path 24079" d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z" transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                    </g>
                  </svg>
                </span>

                {{$tasks_detail->task_address}}
              </li>

              <li>
               <a class="dots-icon" href="#"><i class="fa-solid fa-ellipsis"></i></a>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="provider-tast-row">
            <div class="provider-tast-Lbox provider-tast-left ">
              <div class="provider-tast-slider">
                <div class="slider slider-for">
                  
                  @php
                  
                  $task_images = json_decode($tasks_detail->task_image);
                  if(isset($tasks_detail->task_image)){
                  $count = count($task_images);
                  $i=1;
                  }
                
                  @endphp
                  @if(isset($task_images))
                  @foreach($task_images as $task_image)
                  <div class="item">
                    <figure>
                      <img src="{{asset('uploads/task_image/'.$task_image)}}" alt="">
                    </figure>
                  </div>
                  @endforeach
                  @else{
                    <div class="item">
                    <figure>
                      
                    </figure>
                  </div>
                  }
                  @endif

                  
                  
                </div>

                <div class="action">
                  @if(isset($task_images))
                  @foreach($task_images as $task_image)

                  <a href="#" data-slide="<?php echo $i++; ?>">
                     <figure>
                      <img src="{{asset('uploads/task_image/'.$task_image)}}" alt="">
                    </figure>
                  </a>
                  @endforeach
                  @else
                  <a><figure></figure></a>
                  <a><figure></figure></a>
                  <a><figure></figure></a>
                  <a><figure></figure></a>
                  @endif
                  
                  
                 </div>
              </div>

                <div class="provider-tast-content">
                    <h5>Request Description</h5>

                    <p>{{$tasks_detail->task_des}}</p>                    

                    <!-- <a class="link-text" href="#">Show more</a> -->

                    <hr>

                    <h5>Other Details</h5>

                    <div class="text-para">When do you need this service?</div>

                    <div class="text-med">{{$tasks_detail->datetimes.''.$tasks_detail->shipping}}</div>

                    <div class="text-para">What type of cleaning do you need?</div>

                    <div class="text-med">{{$tasks_detail->cleaning_radio}}</div>
                    @foreach($get_que as $get_question)
                    <div class="text-para">{{$get_question->question}}</div>
                    <div class="text-med">
                    <?php
                    if($long_text_decode !==NULL){
                      if(in_array($get_question->field_name, array_keys($long_text_decode))){
                        if(is_array($long_text_decode[$get_question->field_name])){
                          $arrya_using = $long_text_decode[$get_question->field_name];
                          foreach($arrya_using as $arrya_using_value){
                            echo $arrya_using_value;
                          }
                        }else{
                          echo $long_text_decode[$get_question->field_name];
                        }
                      }
                    }
                    ?>
                    </div>
                    @endforeach

                    

                    <div class="text-para">Choose the status for this project.</div>

                    <div class="text-med">{{$tasks_detail->hire_radio}}</div>
 
                  <hr>

                  <h5>Task Budget & Payment</h5>

                  <div class="text-para">What is your budget for this offer?</div>

                  <div class="text-med">${{$tasks_detail->task_budget}}</div>

                  <div class="text-para">How would you like to pay ?</div>

                  <div class="text-med">Pay with credit card in milestones</div>

                  <hr>

                  <h5>Location</h5>

                  <div class="location-text">
                    <span class="location-icon">
                      <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.75 -0.75)">
                          <path id="Path_24078" data-name="Path 24078" d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z" transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                          <path id="Path_24079" data-name="Path 24079" d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z" transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                        </g>
                      </svg>
                    </span>
    
                    {{$tasks_detail->task_address}}
                  </li>
                </div>

                <div class="map">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55565170.29301636!2d-132.08532758867793!3d31.786060306224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1659507631691!5m2!1sen!2sin"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <hr>

                <h5>Request ID</h5>
                
                <p>{{$tasks_detail->task_requestID}}</p>

                <hr>

                <h5>Interested provider (0/5)</h5>
                
                <ul class="provider-user-list">
                  <li><a class="active" href="#"><i class="fa-solid fa-user"></i></a></li>
                  <li><a class="active" href="#"><i class="fa-solid fa-user"></i></a></li>
                  <li><a class="active" href="#"><i class="fa-solid fa-user"></i></a></li>
                  <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
                  <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
                </ul>

                <hr>

                <h5>Task create</h5>
                
                <p>{{ \Carbon\Carbon::parse($tasks_detail->created_at)->diffForHumans() }}</p>

                <hr>

                <h5>Need help ?</h5>

                <div class="need-help-contact">
                  <div class="need-help">
                    <figure>
                      <img src="{{asset('images/need-icon.png')}}" alt="">
                    </figure>
  
                    <div class="need-contact">
                      <h6>Contact Us</h6>
  
                      <p>If you need help contact with us.</p>
                    </div>
                  </div>

                <a class="chat-icon" href="#"><i class="fa-solid fa-message"></i></a>
                </div>


            </div>
            </div>
            @if(count($intrested_providers)<=0)
            <div class="provider-tast-Rbox provider-tast-right">
              <h5>Interested provider</h5>

              <div class="interested-providerBox">
                <figure>
                  <img src="{{asset('images/interested-provider.png.png')}}" alt="">
                </figure>

                  <p>When your request is approved <br> then you will see interested provider</p>
              </div>
            </div>
            @else           
            
            <div class="provider-tast-Rbox provider-tast-right">
              <h5>Interested provider <span class="badge">{{count($intrested_providers)}}</span></h5>
              @foreach($intrested_providers as $intrested_provider)
              <div class="interested-provider-box-list">
                <div class="ratings-provider-box">
                  <div class="interested-provider-left-col">
                    <figure>
                      <img src="{{asset('uploads/provider/'.$intrested_provider->provider_id.'/business_profile/'.$intrested_provider->provider_image)}}" alt="">
                    </figure>

                    <div class="interested-provider-right-content">
                      <div class="inter-name">
                        <a href="{{url('interested-provider-chat?provider_id='.$intrested_provider->provider_id.'&task_id='.$tasks_detail->id)}}"> {{$intrested_provider->provider_name.' '.$intrested_provider->provider_lname}}</a>
                        </div>

                      <div class="inter-rating"><span>4.3 <i class="fa-solid fa-star"></i></span> Ratings (12 tasks)</div>
                    </div>
                  </div> 

                  <a class="chat-icon active" href="#"><i class="fa-solid fa-message"></i></a>
                </div>                
              </div>
              @endforeach
            </div>
            @endif
            
        </div>
 
      </div>
    </section>

  </main>

  <!-- jQuery first, then Bootstrap JS. -->
  <script src="{{asset('js/bundle.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/latest/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/latest/respond.min.js"></script>
     <![endif]-->
</body>

</html>