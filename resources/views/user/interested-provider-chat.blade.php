@include('layouts.header')
@include("user.request_review")
@include("user.request_quote")


@php
$provider_id = $_GET['provider_id'];
$task_id = $_GET['task_id'];
$user_id = Auth::user()->id;

$user = DB::table('users')->where('id',$user_id)->first();
$provider = DB::table('users')->where('id',$provider_id)->first();
$chats = DB::table('chat')
->where('provider_id',$provider_id)
->where('task_id',$task_id)->get();

$quote_accept = DB::table('chat')->where('quote_field','accept')
->where('provider_id',$provider_id)->where('task_id',$tasks_detail->id)->first();

$schedule_accept = DB::table('chat')->where('schedule_field','schedule')
->where('provider_id',$provider_id)->where('task_id',$tasks_detail->id)->first();
if(isset($schedule_accept))

$schedule = DB::table('schedule_task')->where('id',$schedule_accept->schedule_id)
->where('provider_id',$provider_id)->where('task_id',$tasks_detail->id)->first();






@endphp

  <main id="main">
    <section class="interested-provider-chat">
      <div class="container-fluid">
        <div class="interested-provider-chat-row">
          <div class="interested-provider-chat-left">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-interested-provider-tab" data-bs-toggle="tab"
                  data-bs-target="#nav-interested-provider" type="button" role="tab"
                  aria-controls="nav-interested-provider" aria-selected="true">Interested provider</button>
                <button class="nav-link" id="nav-task-detail-tab" data-bs-toggle="tab" data-bs-target="#nav-task-detail"
                  type="button" role="tab" aria-controls="nav-task-detail" aria-selected="false">Task Detail</button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-interested-provider" role="tabpanel"
                aria-labelledby="nav-interested-provider-tab" tabindex="0">
                <div class="cnt-wrap chat-left-bar-scroll">
                  <h5>Interested provider <span class="badge">{{count($intrested_providers)}}</span></h5>
  
                  <div class="interested-provider-box-list">
                    
                    @foreach($intrested_providers as $intrested_provider)
                    <div class="ratings-provider-box">
                      <div class="interested-provider-left-col">
                        <figure>
                          <img src="{{asset('uploads/provider/'.$intrested_provider->provider_id.'/business_profile/'.$intrested_provider->provider_image)}}" alt="">
                        </figure>
  
                        <div class="interested-provider-right-content">
                          <div class="inter-name"><a href="{{url('interested-provider-chat?provider_id='.$intrested_provider->provider_id.'&task_id='.$tasks_detail->id)}}"> {{$intrested_provider->provider_name.' '.$intrested_provider->provider_lname}}</a></div>
  
                          <div class="inter-rating"><span>4.3 <i class="fa-solid fa-star"></i></span> Ratings (12 tasks)
                          </div>
                        </div>
                      </div>
  
                      <a class="chat-icon" href="#"><i class="fa-solid fa-message"></i></a>
                    </div>
                    @endforeach
  
                    
                  </div>
                </div>
              </div>
  
              <div class="tab-pane fade" id="nav-task-detail" role="tabpanel" aria-labelledby="nav-task-detail-tab"
                tabindex="0">

                <div class="chat-left-bar-scroll">
                  <h5 class="regular-cleaning-heading">{{$tasks_detail->cleaning_radio}}</h5>

                <ul class="list-trinid">
                  <li>
                    <span>
                      <img src="images/calendar.png" alt="">
                    </span>
    
                    {{date('d-M-Y', strtotime($tasks_detail->created_at))}}
                  </li>
    
                  <li>
                    <span>
                      <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.75 -0.75)">
                          <path id="Path_24078" data-name="Path 24078" d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z" transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                          <path id="Path_24079" data-name="Path 24079" d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z" transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                        </g>
                      </svg>
                    </span>
    
                    {{$tasks_detail->task_address}}
                  </li>
     
                </ul>

                <div class="slick_slide provider-tast-slider">
                  
                  @php
                  $task_images = json_decode($tasks_detail->task_image);
                  @endphp
                 
                  @if(isset($task_images))
                  @foreach($task_images as $task_image)
                  <div class="item">
                    <figure style="background-image: url('{{asset('uploads/task_image/'.$task_image)}}'); ">
                    </figure>
                  </div>
                  @endforeach
                  @endif
                  
  
                  
                </div>
  
                <div class="provider-tast-content">
                  <h5>Request Description</h5>
  
                  <p>{{$tasks_detail->task_des}}</p>
  
                  
  
                  <hr>
  
                  <h5>Other Details</h5>
  
                  <div class="text-para">When do you need this service?</div>
  
                  <div class="text-med">{{$tasks_detail->datetimes.''.$tasks_detail->shipping}}</div>
  
                  <div class="text-para">What type of cleaning do you need?</div>
  
                  <div class="text-med">{{$tasks_detail->cleaning_radio}}</div>              







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
                          <path id="Path_24078" data-name="Path 24078"
                            d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z"
                            transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5"></path>
                          <path id="Path_24079" data-name="Path 24079"
                            d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z"
                            transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5"></path>
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
  
                  <h5>Task create</h5>
  
                  <p>{{ \Carbon\Carbon::parse($tasks_detail->created_at)->diffForHumans() }}</p>
  
                  <hr>
  
                  <h5>Need help ?</h5>
  
                  <div class="need-help-contact">
                    <div class="need-help">
                      <figure>
                        <img src="images/need-icon.png" alt="">
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
              </div>
  
            </div>
          </div>

          <div class="interested-provider-chat-right" id="selected_provider">
            <div class="chat-header-top">
              <div class="interested-chat-cnt">
                <div class="my-tasks-rating">
                  <figure>
                    <img src="{{asset('uploads/provider/'.$provider_id.'/business_profile/'.$provider->image)}}" alt="">
                  </figure>
  
                  <div class="my-tasks-rating-content">
                    <div class="inter-name">{{$provider->name.' '.$provider->lastname}}</div>
  
                    <div class="rating-wrap"><span>4.3 <i class="fa-solid fa-star"></i></span> Ratings (12 tasks)</div>
                  </div>
                </div>

                <div class="interested-chat-cnt-right ">
                  <a class="br-btn gray-br-btn" href="#">View Profile</a>

                  <div class="dropdown dropdownMenu">
                    <button type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <li><a class="dropdown-item" href="{{url('report-provider/'.$provider_id)}}">Report</a></li>
                      <li><a class="dropdown-item" href="#">Cancel task</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="chat-header-bottom">
                <ul>
                  @if(isset($quote_accept->quote_field))
                  @if($quote_accept->quote_field == 'accept')
                  <li>
                    <a class="link-green" data-bs-toggle="modal" href="#" role="button"><i class="fa-solid fa-circle-check"></i> {{$quote_accept->quote_amount}}</a>
                  </li>
                  @endif
                  @else
                  <li>
                    <a class="link-info" data-bs-toggle="modal" href="#request_quote" role="button">REQUEST QUOTE</a>
                    <!-- <a class="link-info" href="#">REQUEST QUOTE</a> -->
                  </li>
                  @endif
                  


                  @if(isset($schedule_accept->schedule_field))
                  @if($schedule_accept->schedule_field == 'schedule')
                  <li>
                    <a class="link-green" href="#"><i class="fa-solid fa-calendar"></i>
                      {{date("M-d-Y", strtotime($schedule->schedule_date) )}} - {{$schedule->schedule_time}}</a>
                  </li>
                  @endif
                  @else
                  <li>
                    <a class="link-info down-arrow" href="#">DATE & TIME</a>
                  </li>
                  @endif
                  


                  <li>
                    <a data-bs-toggle="modal" class="link-info down-arrow" href="#job_complete" role="button">COMPLETED</a>
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="chat-box-list" id="scroll_position">
                <div id="cus_chat_refresh">
                  @if(count($chats) == 0)
                  <div class="chat-box-main">
                    <figure>
                      <img src="{{asset('uploads/provider/'.$provider_id.'/business_profile/'.$provider->image)}}" alt="">
                    </figure>
                    <div class="chat-box">
                      <p>Hello .</p>
                      <p>Send a message to the professional. Click <a class="link" href="#">REQUEST QUOTE</a> to request an offer. <a class="link" href="#">Click ACCEPT & BOOK</a> when you decide to hire. After completing the work, please rate the professional to help other customers.</p>
                      <p> Do not pay any deposit in advance and make sure to have a written contract for each project. For large and complex projects, an inspection may be required to determine the price.</p>
                    </div>
                  </div>
                  @else
              @foreach($chats as $chat)
              <div @if(Auth::user()->id == $chat->sender_id) class="chat-box-main chat-right-wrap" @else class="chat-box-main" @endif>
                <figure>
                   @if(Auth::user()->id == $chat->sender_id)
                   <img src="{{asset('uploads/user/'.$user_id.'/'.$user->image)}}" alt="">
                   @else
                   <img src="{{asset('uploads/provider/'.$provider_id.'/business_profile/'.$provider->image)}}" alt="">
                   @endif {{date("h:i", strtotime($chat->created_at))}}
                  
                </figure>
  
                <div class="chat-box">                 
                  <p>{{$chat->message}}</p>
                  @if($chat->chat_file)
                  <div class="chat-box chat-bg-black">
                    <ul class="chat-box-img">
                      <li><img src="{{asset('uploads/Chat_Files/'.$chat->chat_file)}}" alt=""></li>
                    </ul>
                  </div>
                  @endif

                  @if($chat->req_quoteid)
                  @php
                  $rq = DB::table('req_quote')->where('id',$chat->req_quoteid)->first();
                  $quote_des = json_decode($rq->quote_des,true);
                  $quote_qty = json_decode($rq->quote_qty,true);
                  $quote_unit = json_decode($rq->quote_unit,true);
                  $quote_amount = json_decode($rq->quote_amount,true);
                  $grant_total = $rq->quote_discount + $rq->quote_total;
                  @endphp

                  
                  <div class="chat-case-box">
                    <div class="chat-case-cnt chat-case-cnt-padd">
                     <div class="chat-case-heading-title">
                      <h6>PROVIDER HAS PROPOSED PRICE QUOTE</h6>
                     </div>

                    <p class="total-price">Total Price</p>
                    <h3 class="bb-info"><span class="info-color">${{$rq->quote_total}}</span></h3> 

                    <p class="total-price">Quotation ID - {{$rq->quote_id}}</p>
                    

                    

                    <p class="payment-title">PAYMENT BREAKDOWN</p>

                    <div class="row">
                      <div class="col-md-4">
                        <label><b>Description</b></label>
                        @foreach($quote_des as $quote_de)
                        <div class="mt-1">{{$quote_de}}</div>
                        @endforeach
                      </div>
                      <div class="col-md-2">
                        <label><b>Qty</b></label>
                        @foreach($quote_qty as $quote_qt)
                        <div class="mt-1" style="text-align:">{{$quote_qt}}</div>
                        @endforeach  
                      </div>
                      <div class="col-md-2">
                        <label><b>Unit Price</b></label>
                        @foreach($quote_unit as $quote_un)
                        <div class="mt-1" style="text-align:">{{$quote_un}}</div>
                        @endforeach  
                      </div>
                      <div class="col-md-2">
                        <label><b>Amount</b></label>
                        @foreach($quote_amount as $quote_am)
                        <div class="mt-1" style="text-align:">{{$quote_am}}</div>
                        @endforeach  
                      </div>
                    </div>

                    <div class="row mt-5">
                      <div class="col-md-8" style="text-align:right;">
                        <label><b>Sub total</b></label>
                      </div>
                      <div class="col-md-4">
                        <label><b>{{$grant_total}}</b></label>
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-md-8" style="text-align:right;">
                        <label><b>Discount</b></label>
                      </div>
                      <div class="col-md-4">
                        <label><b>{{$rq->quote_discount}}</b></label>
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-md-8" style="text-align:right;">
                        <label><b>Total</b></label>
                      </div>
                      <div class="col-md-4">
                        <label><b>{{$rq->quote_total}}</b></label>
                      </div>
                    </div>



                    <p>Time duration (Est.) : {{$rq->time_duration}}</p>

                    <p>{{$rq->notes}}</p>
                    </div>

                    <ul class="chat-case-btn-wrap">
                      <li>
                        <a class="accept-btn accept-color" href="{{url('accept-book?taskid='.$task_id.'&providerid='.$provider_id.'&userid='.$user_id.'&qid='.$rq->quote_id)}}"><i class="fa-solid fa-circle-check"></i> Accept & Book</a>
                      </li>
                      <li>
                        <a class="reject-btn reject-color" href="{{url('reject-quote?taskid='.$task_id.'&providerid='.$provider_id.'&userid='.$user_id.'&qid='.$rq->quote_id)}}"><i class="fa-solid fa-circle-xmark"></i> Reject Quote</a>
                      </li>
                      <li>
                        <a class="counter-btn counter-color" href="{{url('counter-price?taskid='.$task_id.'&providerid='.$provider_id.'&userid='.$user_id.'&qid='.$rq->quote_id)}}"><img src="images/peice-doller-icon.png" alt=""> Counter price</a>
                      </li>
                    </ul>
                  </div>
                  @else
                  @endif

                  @if($chat->quote_field == 'accept')
                  <div class="chat-case-box">
                    <div class="chat-case-cnt chat-case-cnt-padd">
                      <div class="chat-case-heading-title">
                        <h6>PROVIDER HAS PROPOSED PRICE QUOTE</h6>
                        <span class="chat-case-quote accept-color">Quote Accepted</span>
                      </div>
                      <p class="total-price">Total Price</p>
                      <h3 class="bb-green"><span class="accept-color">$</span>{{$rq->quote_total}}
                      </h3>
                      <p class="total-price">Quotation ID - {{$rq->quote_id}}</p>
                      <p class="payment-title">PAYMENT BREAKDOWN</p>
                      <div class="row">
                        <div class="col-md-4">
                          <label><b>Description</b></label>
                          @foreach($quote_des as $quote_de)
                          <div class="mt-1">{{$quote_de}}</div>
                        @endforeach
                      </div>
                      <div class="col-md-2">
                        <label><b>Qty</b></label>
                        @foreach($quote_qty as $quote_qt)
                        <div class="mt-1" style="text-align:">{{$quote_qt}}</div>
                        @endforeach
                      </div>
                      <div class="col-md-2">
                        <label><b>Unit Price</b></label>
                        @foreach($quote_unit as $quote_un)
                        <div class="mt-1" style="text-align:">{{$quote_un}}</div>
                        @endforeach  
                      </div>
                      <div class="col-md-2">
                        <label><b>Amount</b></label>
                        @foreach($quote_amount as $quote_am)
                        <div class="mt-1" style="text-align:">{{$quote_am}}</div>
                        @endforeach  
                      </div>
                    </div>

                    <div class="row mt-5">
                      <div class="col-md-8" style="text-align:right;">
                        <label><b>Sub total</b></label>
                      </div>
                      <div class="col-md-4">
                        <label><b>{{$grant_total}}</b></label>
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-md-8" style="text-align:right;">
                        <label><b>Discount</b></label>
                      </div>
                      <div class="col-md-4">
                        <label><b>{{$rq->quote_discount}}</b></label>
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-md-8" style="text-align:right;">
                        <label><b>Total</b></label>
                      </div>
                      <div class="col-md-4">
                        <label><b>{{$rq->quote_total}}</b></label>
                      </div>
                    </div>
                    <p>Time duration (Est.) : {{$rq->time_duration}}</p>
                    <p>{{$rq->notes}}</p>
                  </div>
                  <div class="chat-case-cnt chat-case-cnt-padd" style="width:100%">
                    <ul class="chat-case-btn-wrap">
                      <a class="btn booked-btn" href="#">Booked</a>
                    </ul>
                  </div>
                </div>
                  @endif

                  @if($chat->quote_field == 'reject')
                  <div class="chat-case-box">
                    <div class="chat-case-cnt chat-case-cnt-padd">
                      <div class="chat-case-heading-title">
                        <h6>PROVIDER HAS PROPOSED PRICE QUOTE</h6>
                        <span class="chat-case-quote reject-color">Quote Rejected</span>
                      </div>
                      <p class="total-price">Total Price</p>
                      <h3 class="bb-red"><span class="reject-color">$</span>{{$rq->quote_total}}
                      </h3>
                      <p class="total-price">Quotation ID - {{$rq->quote_id}}</p>
                      <p class="payment-title">PAYMENT BREAKDOWN</p>
                      <div class="row">
                        <div class="col-md-4">
                          <label><b>Description</b></label>
                          @foreach($quote_des as $quote_de)
                          <div class="mt-1">{{$quote_de}}</div>
                          @endforeach
                        </div>
                        <div class="col-md-2">
                          <label><b>Qty</b></label>
                          @foreach($quote_qty as $quote_qt)
                          <div class="mt-1" style="text-align:">{{$quote_qt}}</div>
                          @endforeach
                        </div>
                        <div class="col-md-2">
                          <label><b>Unit Price</b></label>
                          @foreach($quote_unit as $quote_un)
                          <div class="mt-1" style="text-align:">{{$quote_un}}</div>
                          @endforeach  
                        </div>
                        <div class="col-md-2">
                          <label><b>Amount</b></label>
                          @foreach($quote_amount as $quote_am)
                          <div class="mt-1" style="text-align:">{{$quote_am}}</div>
                          @endforeach  
                        </div>
                      </div>

                      <div class="row mt-5">
                        <div class="col-md-8" style="text-align:right;">
                          <label><b>Sub total</b></label>
                        </div>
                        <div class="col-md-4">
                          <label><b>{{$grant_total}}</b></label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-8" style="text-align:right;">
                          <label><b>Discount</b></label>
                        </div>
                        <div class="col-md-4">
                          <label><b>{{$rq->quote_discount}}</b></label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-8" style="text-align:right;">
                          <label><b>Total</b></label>
                        </div>
                        <div class="col-md-4">
                          <label><b>{{$rq->quote_total}}</b></label>
                        </div>
                      </div>
                      <p>Time duration (Est.) : {{$rq->time_duration}}</p>
                      <p>{{$rq->notes}}</p>
                    </div>
                  </div>
                  @endif

                  @if($chat->schedule_id)
                  @php
                  $scheduletask = DB::table('schedule_task')->where('id',$chat->schedule_id)->first();
                  @endphp

                  
                  <div class="chat-case-box">
                    <div class="chat-case-cnt chat-case-cnt-padd">
                      <div class="chat-case-heading-title">
                        <h5>Schedule Task</h5>
                        <!-- <span class="chat-case-quote accept-color">Quote Accepted</span> -->
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label><b>Task Date</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{date("M-d-Y", strtotime($scheduletask->schedule_date) )}}</p>
                          </div> 
                        </div>

                        <div class="col-md-6">
                          <label><b>Task Time</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{$scheduletask->schedule_time}}</p>
                          </div> 
                        </div>
                      </div>
                    </div>

                    <ul class="chat-case-btn-wrap">
                      <li>
                        <a class="accept-btn accept-color" href="{{url('accept-schedule?taskid='.$task_id.'&providerid='.$provider_id.'&userid='.$user_id.'&sid='.$scheduletask->id)}}"><i class="fa-solid fa-circle-check"></i> Confirm Date & Time</a>
                      </li>
                      <li>
                        <a class="reject-btn reject-color" href="{{url('reject-schedule?taskid='.$task_id.'&providerid='.$provider_id.'&userid='.$user_id.'&sid='.$scheduletask->id)}}"><i class="fa-solid fa-circle-xmark"></i> Reject Schedule</a>
                      </li>
                      
                    </ul>
                  </div>
                  @else
                  @endif

                  @if($chat->schedule_field == 'schedule')
                                  
                  <div class="chat-case-box">
                    <div class="chat-case-cnt chat-case-cnt-padd">
                      <div class="chat-case-heading-title">
                        <h5>Schedule Task</h5>
                        <span class="chat-case-quote accept-color">Task Schedule</span>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label><b>Task Date</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{date("M-d-Y", strtotime($scheduletask->schedule_date) )}}</p>
                          </div> 
                        </div>

                        <div class="col-md-6">
                          <label><b>Task Time</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{$scheduletask->schedule_time}}</p>
                          </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                  @endif

                  @if($chat->schedule_field == 'reject')
                                  
                  <div class="chat-case-box">
                    <div class="chat-case-cnt chat-case-cnt-padd">
                      <div class="chat-case-heading-title">
                        <h5>Schedule Task</h5>
                        <span class="chat-case-quote reject-color">Reject Schedule</span>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label><b>Task Date</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{date("M-d-Y", strtotime($scheduletask->schedule_date) )}}</p>
                          </div> 
                        </div>

                        <div class="col-md-6">
                          <label><b>Task Time</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{$scheduletask->schedule_time}}</p>
                          </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                  @endif

                  @if(isset($chat->user_comment))
                  @if($chat->user_comment == 'user_comm')

                  @php
                  $get_comments = DB::table('bluebis_review')->where('id',$chat->review_id)->first();
                  $get_comments = DB::table('bluebis_review')->where('id',$chat->review_id)->first();
                  $task_category = DB::table('tsk_detail')->select('cleaning_radio')->where('id',$get_comments->task_id)->first();
                  $name = DB::table('users')->select('name','lastname')->where('id',$get_comments->user_id)->first();

                 $rating = $get_comments->starrating;  
                  @endphp
                  <div class="review-box pay_review">
               <div class="review-heading-top">
                <h5>Review</h5>
                
                <p>{{$get_comments->created_at}}</p>
               </div>

                
                <ul>
                            @foreach(range(1,5) as $i)
                <span class="fa-stack" style="width:1em">
                    <i class="far fa-star fa-stack-1x" style="color:#b7b7b7"></i>
                     @if($rating >0)
                        @if($rating >0.5)
                            <i class="fas fa-star fa-stack-1x" style="color:#F9A52B"></i>
                        @else
                            <i class="fas fa-star-half fa-stack-1x" style="color:#F9A52B"></i>
                        @endif
                    @endif
                    @php $rating--; @endphp
                  </span>
                  @endforeach
                            
                          </ul>

                <a class="link-text home-cleaning-text" href="#">{{$task_category->cleaning_radio}}</a>

                <p class="review-by">Review by: <span>{{$name->name.' '.$name->lastname}}</span></p>

                <p class="review-helpful">Was this review helpful? <i class="fa-solid fa-heart"></i></p>
  
                <h5 class="review-heading">{{$get_comments->comment}}</h5>

                
                
              </div> 
                  @endif

                  @endif

                  @if(isset($chat->provider_comment))
                  @if($chat->provider_comment == 'provider_comm')

                  @php
                 
                  $get_comments = DB::table('bluebis_review')->where('id',$chat->review_id)->where('senderreview','provider')->where('task_id',$chat->task_id)->first();
                  $task_category = DB::table('tsk_detail')->select('cleaning_radio')->where('id',$get_comments->task_id)->first();
                  $name = DB::table('users')->select('name','lastname')->where('id',$get_comments->provider_id)->first();

                 $rating = $get_comments->starrating;  
                  @endphp
                  <div class="review-box pay_review">
                     <div class="review-heading-top">
                      <h5>Review</h5>
                      <p>{{$get_comments->created_at}}</p>
                     </div>
                    <ul>
                      @foreach(range(1,5) as $i)
                      <span class="fa-stack" style="width:1em">
                        <i class="far fa-star fa-stack-1x" style="color:#b7b7b7"></i>
                        @if($rating >0)
                        @if($rating >0.5)
                        <i class="fas fa-star fa-stack-1x" style="color:#F9A52B"></i>
                        @else
                        <i class="fas fa-star-half fa-stack-1x" style="color:#F9A52B"></i>
                        @endif
                        @endif
                        @php $rating--; @endphp
                      </span>
                      @endforeach
                    </ul>
                    <a class="link-text home-cleaning-text" href="#">{{$task_category->cleaning_radio}}</a>
                    <p class="review-by">Review by: <span>{{$name->name.' '.$name->lastname}}</span></p>
                    <p class="review-helpful">Was this review helpful? <i class="fa-solid fa-heart"></i></p>
                    <h5 class="review-heading">{{$get_comments->comment}}</h5>
                  </div> 
                  @endif
                  @endif

                  <time>
                  @if(Auth::user()->id == $chat->sender_id)Me •@else Provider • @endif {{date("h:i", strtotime($chat->created_at))}}</time>
                </div>
              </div>
              @endforeach
              @endif
            </div></div>

            <form method="post" action="create-chat" enctype="multipart/form-data">
              @csrf
              <div class="sand-box">
                <div class="upload-icon">
                    <input type="file" name="chat_file" id="chat_file">
                </div>

                <div class="message-input">
                  <input type="hidden" name="provider_id" value="{{$provider->id}}">
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                  <input type="hidden" name="task_id" value="{{$tasks_detail->id}}">

                  <input class="form-control" type="text" name="message" placeholder="Type a message to professional...">
                </div>
                <button class="send-btn" style="border-color: transparent;">
                  <i class="fa-solid fa-paper-plane"></i>
                </button>
                
                <!-- <a class="send-btn" href="#">
                  <i class="fa-solid fa-paper-plane"></i>
                </a> -->
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>

  <div class="upgrade-membership-popup">
                    <div class="modal fade" id="job_complete" aria-hidden="true" aria-labelledby="Cancel-job1Label"
                      tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="ceate-listing-content modal-content-padd">
                            <figure>
                              <svg viewBox="0 0 82 82">
                                <g id="Group_54350" data-name="Group 54350" transform="translate(-598.5 -224.188)">
                                  <circle id="Ellipse_140" data-name="Ellipse 140" cx="40" cy="40" r="40" transform="translate(599.5 225.188)" fill="none" stroke="#f9a52b" stroke-width="2"/>
                                  <path id="Icon_open-question-mark" data-name="Icon open-question-mark" d="M10.121,0c-3.483,0-6.064,1.065-7.7,2.7A8.941,8.941,0,0,0,0,7.949l4.1.533a4.966,4.966,0,0,1,1.27-2.827C6.146,4.876,7.375,4.1,10.121,4.1c2.7,0,4.179.656,5,1.393a3.425,3.425,0,0,1,1.147,2.7c0,3.4-1.393,4.343-3.442,6.146s-4.753,4.425-4.753,9.219v1.024h4.1V23.561c0-3.4,1.27-4.343,3.319-6.146s4.876-4.425,4.876-9.219a7.872,7.872,0,0,0-2.418-5.777C16.185.819,13.563,0,10.121,0ZM8.072,28.682v4.1h4.1v-4.1Z" transform="translate(628.487 248.798)" fill="#f9a52b"/>
                                </g>
                              </svg>              
                            </figure>
                
                            <p>Are you sure, Job have completed ?</p>
                 
                            <div class="create-btn">
                              <input type="hidden" name="" id="credit_id_data">
                              <a type="button" class="btn" data-bs-dismiss="modal" data-bs-toggle="modal" alt="yell" href="#yes_complete" role="button">Yes</a>
                              <!-- <button type="button" class="btn" id="redirect_provider">Ok</button> -->
                              <button type="button" class="btn gray-br-btn" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            
                          </div>
                
                        </div>
                      </div>
                    </div>
                  </div>


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
<script type="text/javascript">
  $('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    $(".add-field", $(this)).click(function(e) {
        $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
    });
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});
</script>

<!--Auto Refresh Chat-->
<script> 
$(document).ready(function(){
setInterval(function(){
      $("#cus_chat_refresh").load(window.location.href + " #cus_chat_refresh" );
}, 3000);
});

var element = document.getElementById("scroll_position");
element.scrollTop = element.scrollHeight;


</script>
