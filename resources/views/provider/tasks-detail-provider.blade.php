@include('layouts.header')

  <main id="main">

    <section class="tasks-detail-main">
      <div class="container">
        <div class="pro-tast-title">
          <h4>
            
            <a class="back-arrow" href="{{url('provider-account')}}"><i class="fa-solid fa-arrow-left"></i></a>

            {{$taskdetail_pro->cleaning_radio}}</h4>

          <div class="pro-tast-title-right">
            <ul class="list-trinid">
              <li>
                <span>
                  <img src="{{asset('images/calendar.png')}}" alt="">
                </span>
               {{date('d-M-Y H:i', strtotime($taskdetail_pro->created_at));}}
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

                {{$taskdetail_pro->task_address}}
                <input type="hidden" name="taskid" value="{{$taskdetail_pro->task_id}}">
              </li>

              <!-- <li>
               <a class="btn Chat-btn" href="{{url('provider-revert/'.$taskdetail_pro->task_id)}}"><i class=""></i>Revert</a>
              </li> -->
            </ul>
          </div>
        </div>
        
        <div class="provider-tast-row">
            <div class="provider-tast-Lbox provider-tast-left ">
              <div class="provider-tast-slider">
                <div class="slider slider-for">
                  @if(isset($task_images))
                  @foreach($task_images as $task_image)
                  <div class="item">
                    <figure>
                      <img src="{{asset('uploads/task_image/'.$task_image)}}" alt="">
                    </figure>
                  </div>
                  @endforeach
                  @endif

                  
                  
                </div>

                <div class="action">
                  <?php
                  if(isset($task_images)){
                  $count_img = count($task_images);
                  for($i=0; $i < $count_img-1 ; $i++) { ?>
                    <a href="#" data-slide="<?php echo $i ?>">
                     <figure>
                      <img src="{{asset('uploads/task_image/'.$task_images[$i])}}" alt="">
                    </figure>
                  </a>
                  <?php }
                  
                  
                 } ?>
                  
                  
                  
                  
                 </div>
              </div>

                <div class="provider-tast-content">
                    <h5>Request Description</h5>

                    <p>{{$taskdetail_pro->task_des}}</p>                    

                    <a class="link-text" href="#">Show more</a>

                    <hr>

                    <h5>Other Details</h5>

                    <div class="text-para">When do you need this service?</div>

                    <div class="text-med">{{$taskdetail_pro->datetimes.' '.$taskdetail_pro->shipping}}</div>

                    <div class="text-para">What type of cleaning do you need?</div>

                    <div class="text-med">{{$taskdetail_pro->cleaning_radio}}</div>

                    
                    @foreach($get_que as $get_question)
                    <div class="text-para">{{$get_question->question}}</div>

                    <div class="text-med">
                    @php
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
                    @endphp
                    </div>
                    @endforeach

                    

                    

                    <div class="text-para">Choose the status for this project.</div>

                    <div class="text-med">{{$taskdetail_pro->hire_radio}}</div>
 
                  <hr>

                  <h5>Task Budget & Payment</h5>

                  <div class="text-para">What is your budget for this offer?</div>

                  <div class="text-med">${{$taskdetail_pro->task_budget}}</div>

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
    
                    {{$taskdetail_pro->task_address}}
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
                
                <p>1510724120107241</p>

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

                <h5>Task create date</h5>
                
                <p> {{ \Carbon\Carbon::parse($taskdetail_pro->created_at)->diffForHumans() }}</p>

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

            <div class="provider-tast-Rbox provider-tast-right">
              <h5>POSTED BY</h5>

              <div class="posted-by-Box">
                <figure>
                  <img src="{{asset('uploads/user/'.$taskdetail_pro->user_id.'/'.$taskdetail_pro->user_image)}}" alt="">
                </figure>

                <div class="name">{{ucfirst($taskdetail_pro->name.' '.$taskdetail_pro->lastname)}}</div>
                  
                <p>{{ \Carbon\Carbon::parse($taskdetail_pro->created_at)->diffForHumans() }}</p>

              <!-- <a class="btn" href="{{url('customer-chat?user_id='.$taskdetail_pro->user_id.'&task_id='.$taskdetail_pro->task_id)}}"><i class="fa-solid fa-message"></i> Chat</a> -->
              </div>
            </div>
            
        </div>

 
       
      </div>
    </section>

  </main>

  <footer id="footer1">
    <div class="container">
      <div class="footer-top">
        <a class="footer-logo" href="#">
          <img src="images/logo.png" alt="">
        </a>

        <ul class="footer-link">
          <li><a href="#">Terms</a></li>
          <li><a href="#">Privacy </a></li>
          <li><a href="#">Cookies Policy</a></li>
          <li><a href="#">Pro Center</a></li>
        </ul>
      </div>
    </div>

    <div class="copy-write">
      <div class="container">
        <p>By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content
          Policies. All trademarks are properties of their respective owners. <br> 2012-2021 © Bluebis Pvt Ltd. All
          rights reserved.</p>
      </div>
    </div>
  </footer>

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