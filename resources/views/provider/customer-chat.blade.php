@include('layouts.header')
@include("provider.request_quote")

@include("provider.taskDate")
@include("provider.request_review")
<style>
  .interested-provider-chat .interested-provider-chat-row .interested-provider-chat-right .chat-box-list {
    height: calc(100vh - 340px);
    
</style>

@php
$chats = DB::table('chat')
->where('provider_id',Auth::user()->id)
->where('user_id',$customer_detail->id)
->where('task_id',$tasks_detail->id)->get();

$chats_accept = DB::table('chat')->where('quote_field','accept')
->where('provider_id',Auth::user()->id)
->where('task_id',$tasks_detail->id)->first();

$task_schedule = DB::table('chat')->where('schedule_field','schedule')
->where('provider_id',Auth::user()->id)
->where('task_id',$tasks_detail->id)->first();
if(isset($task_schedule))
$schedule_detail = DB::table('schedule_task')->where('id',$task_schedule->schedule_id)
->where('provider_id',Auth::user()->id)
->where('task_id',$tasks_detail->id)->first();

$enable_provider = DB::table('bluebis_review')->where('task_id',$tasks_detail->id)->where('senderreview','user')->first();




@endphp

  <main id="main">
    <section class="interested-provider-chat">
      <div class="container-fluid">
        <div class="interested-provider-chat-row">
          <div class="interested-provider-chat-left">
            <div class="chat-left-bar-scroll chat-left-bar-scroll-review">
              <h5 class="regular-cleaning-heading">Regular {{$tasks_detail->cleaning_radio}}</h5>

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
              @if(isset($task_images))
              @foreach($task_images as $task_image)
              <div class="item">
                <figure style="background-image: url('{{asset('uploads/task_image/'.$task_image)}}');">
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

              <h5>Task created</h5>

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

          <div class="interested-provider-chat-right">
            <div class="chat-header-top">
              <div class="interested-chat-cnt">
                <div class="my-tasks-rating">
                  <figure>
                    <img src="{{asset('uploads/user/'.$customer_detail->id.'/'.$customer_detail->image)}}" alt="">
                  </figure>
  
                  <div class="my-tasks-rating-content">
                    <div class="inter-name">{{$customer_detail->name}}</div>
  
                    <div class="rating-wrap"><span>4.3 <i class="fa-solid fa-star"></i></span> Ratings (12 tasks)</div>
                  </div>
                </div>

                <div class="interested-chat-cnt-right ">

                  <div class="dropdown dropdownMenu">
                    <button type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-ellipsis"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <li><a class="dropdown-item" href="{{url('report-customer/'.$customer_detail->id)}}">Report</a></li>
                      <li><a class="dropdown-item" href="#">Cancel task</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="chat-header-bottom">
                <ul>
                  @if(isset($chats_accept->quote_field))
                  @if($chats_accept->quote_field == 'accept')
                  <li>
                    <!-- <a class="link-info" href="#">REQUEST QUOTE</a> -->
                    <a class="link-green" data-bs-toggle="modal" href="#" role="button"><i class="fa-solid fa-circle-check"></i> {{$chats_accept->quote_amount}}</a>
                  </li>
                  @endif
                  @else
                  <li>
                    <!-- <a class="link-info" href="#">REQUEST QUOTE</a> -->
                    <a class="link-info" data-bs-toggle="modal" href="#request_quote" role="button">REQUEST QUOTE</a>
                  </li>
                  @endif

                  @if(isset($task_schedule->schedule_field))
                  @if($task_schedule->schedule_field == 'schedule')
                  <li>

                    <a class="link-green" href="#"><i class="fa-solid fa-calendar"></i>
                      {{date("M-d-Y", strtotime($schedule_detail->schedule_date) )}} - {{$schedule_detail->schedule_time}}</a>
                    <!-- <a class="link-info down-arrow" href="#">DATE & TIME</a> -->
                  </li>
                  @endif
                  @else
                  <li>

                    <a class="link-info" data-bs-toggle="modal" href="#taskDate" role="button">DATE & TIME</a>
                    <!-- <a class="link-info down-arrow" href="#">DATE & TIME</a> -->
                  </li>
                  @endif

                  @if(isset($enable_provider))
                  @if($enable_provider->eneble == 'eneble')
                  <li>
                    <a class="link-info" data-bs-toggle="modal" href="#request_review" role="button">REVIEW TO USER</a>
                  </li>
                  @endif
                  @else
                  <li>
                    <!-- <a class="link-info" href="#">REQUEST QUOTE</a> -->
                    <a class="link-info" data-bs-toggle="modal" href="#" role="button">TASK IN-PROGRESS</a>
                  </li>
                  @endif
                </ul>
              </div>
            </div>

            <div class="chat-box-list" id="scroll_position" style="margin-bottom:0px;overflow:auto">
              <div id="sample">
                @php $tt = []; @endphp
                @if(count($chats) == 0)
                <div class="chat-box-main">
                  <div class="chat-box">
                    <p>Hello .</p>
                    <p>Start chat with customer. Click <span class="link">REQUEST QUOTE</span> to user for an offer or send him to quatation. Do not request any deposit in advance.</p>
                  </div>
                </div>
                @else
                
              @foreach($chats as $chat)
              <div @if(Auth::user()->id == $chat->sender_id) class="chat-box-main chat-right-wrap" @else class="chat-box-main" @endif>
                <figure>
                   @if(Auth::user()->id == $chat->sender_id)
                   <img src="{{asset('uploads/provider/'.$provider_detail->id.'/business_profile/'.$provider_detail->image)}}" alt="">
                   @else
                   <img src="{{asset('uploads/user/'.$customer_detail->id.'/'.$customer_detail->image)}}" alt="">
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

                    <!-- <ul class="chat-case-btn-wrap">
                      <li>
                        <a class="accept-btn accept-color" href="#"><i class="fa-solid fa-circle-check"></i> Accept & Book</a>
                      </li>
                      <li>
                        <a class="reject-btn reject-color" href="#"><i class="fa-solid fa-circle-xmark"></i> Reject Quote</a>
                      </li>
                      <li>
                        <a class="counter-btn counter-color" href="#"><img src="images/peice-doller-icon.png" alt=""> Counter price</a>
                      </li>
                    </ul> -->
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
                  @php
                  
                  $quoteid = $chat->message;
                  $quote_detail = DB::table('req_quote')->where('quote_id',$quoteid)->first();
                  $quotedes = json_decode($quote_detail->quote_des,true);
                  $quoteqty = json_decode($quote_detail->quote_qty,true);
                  $quoteunit = json_decode($quote_detail->quote_unit,true);
                  $quoteamount = json_decode($quote_detail->quote_amount,true);
                  $granttotal = $quote_detail->quote_discount + $quote_detail->quote_total;
                  @endphp

                  <div class="chat-case-box">
                    
                    <div class="chat-case-cnt chat-case-cnt-padd">
                      <div class="chat-case-heading-title">
                        <a class="link-info accept-color" data-bs-toggle="modal" href="#modify_request_quote{{$quoteid}}" role="button">Modify & Resend</a>
                        <span class="chat-case-quote reject-color">Quote Rejected</span>
                      </div>
                      @php $tt[] = $quoteid  @endphp
                      <p class="total-price">Total Price</p>
                      <h3 class="bb-red"><span class="reject-color">$</span>{{$granttotal}}
                      </h3>
                      <p class="total-price">Quotation ID - {{$quoteid}}</p>
                      <p class="payment-title">PAYMENT BREAKDOWN</p>
                      <div class="row">
                        <div class="col-md-4">
                          <label><b>Description</b></label>
                          @foreach($quotedes as $quotede_value)
                          <div class="mt-1">{{$quotede_value}}</div>
                          @endforeach
                        </div>
                        <div class="col-md-2">
                          <label><b>Qty</b></label>
                          @foreach($quoteqty as $quoteqt_value)
                          <div class="mt-1" style="text-align:">{{$quoteqt_value}}</div>
                          @endforeach
                        </div>
                        <div class="col-md-2">
                          <label><b>Unit Price</b></label>
                          @foreach($quoteunit as $quoteun_value)
                          <div class="mt-1" style="text-align:">{{$quoteun_value}}</div>
                          @endforeach  
                        </div>
                        <div class="col-md-2">
                          <label><b>Amount</b></label>
                          @foreach($quoteamount as $quoteam_value)
                          <div class="mt-1" style="text-align:">{{$quoteam_value}}</div>
                          @endforeach  
                        </div>
                      </div>

                      <div class="row mt-5">
                        <div class="col-md-8" style="text-align:right;">
                          <label><b>Sub total</b></label>
                        </div>
                        <div class="col-md-4">
                          <label><b>{{$granttotal}}</b></label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-8" style="text-align:right;">
                          <label><b>Discount</b></label>
                        </div>
                        <div class="col-md-4">
                          <label><b>{{$quote_detail->quote_discount}}</b></label>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-8" style="text-align:right;">
                          <label><b>Total</b></label>
                        </div>
                        <div class="col-md-4">
                          <label><b>{{$quote_detail->quote_total}}</b></label>
                        </div>
                      </div>
                      <p>Time duration (Est.) : {{$quote_detail->time_duration}}</p>
                      <p>{{$quote_detail->notes}}</p>
                    </div>
                  </div>
                  @endif

                  @if($chat->schedule_id)
                  @php
                  $schedule_data = DB::table('schedule_task')->where('id',$chat->schedule_id)->first();
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
                            <p>{{date("M-d-Y", strtotime($schedule_data->schedule_date) )}}</p>
                          </div> 
                        </div>

                        <div class="col-md-6">
                          <label><b>Task Time</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{$schedule_data->schedule_time}}</p>
                          </div> 
                        </div>
                      </div>
                    </div>
                  </div>
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
                            <p>{{date("M-d-Y", strtotime($schedule_data->schedule_date) )}}</p>
                          </div> 
                        </div>

                        <div class="col-md-6">
                          <label><b>Task Time</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{$schedule_data->schedule_time}}</p>
                          </div> 
                        </div>
                      </div>
                    </div>
                  </div>
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
                            <p>{{date("M-d-Y", strtotime($schedule_data->schedule_date) )}}</p>
                          </div> 
                        </div>

                        <div class="col-md-6">
                          <label><b>Task Time</b></label>
                          <div class="task-date task-date-pic">
                            <p>{{$schedule_data->schedule_time}}</p>
                          </div> 
                        </div>
                      </div>
                    </div>
                  </div>
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
                  @if(Auth::user()->id == $chat->sender_id)Me •@else User • @endif {{date("h:i", strtotime($chat->created_at))}}</time>
                </div>
              </div>
              @endforeach
              @endif
            </div></div>

            <form method="post" action="pro-create-chat" enctype="multipart/form-data">
              @csrf
              <div class="sand-box">
                <div class="upload-icon">
                    <input type="file" name="pro_chat_file" id="pro_chat_file">
                </div>

                <div class="message-input">
                  <input type="hidden" name="user_id" value="{{$customer_detail->id}}">
                  <input type="hidden" name="provider_id" value="{{$provider_detail->id}}">
                  <input type="hidden" name="task_id" value="{{$tasks_detail->id}}">

                  <input class="form-control" name="msg" id="msg" type="text" placeholder="Type a message to professional...">
                </div>
                
                <button type="submit" class="send-btn" style="border-color: transparent;">
                  <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>
  @include('provider.modify_request_quote', ['yy' => $tt])

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

<script>
  $(document).ready(function(){
    $(".add_item_btn").click(function(e){
      e.preventDefault();
      $("#quote_detail").prepend(`
        <div id="quote_detail" class="chat-case-box">
          <div class="table">
            <div class="col-md-5" style="float: left;">
              <input type="text" name="des[]" id="des" class="form-control" required>
              <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
            </div>
            <div class="col-md-2" style="float: left;">
              <input type="text" name="qty[]"  class="form-control qty" required>
              <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
            </div>
            <div class="col-md-2" style="float: left;">
              <input type="text" name="unit_price[]" id="unit_price" class="form-control unit_price" required>
              <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
            </div>
            <div class="col-md-2" style="float: left;">
              <input type="text" name="amount[]" id="amount" class="form-control amount" required readonly>
              <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
            </div>

            <div class="col-md-1" style="float: left;">
              <label></label>
              <a class="close-btn remove_item_btn" style="margin-top:28px"><i class="fa-solid fa-xmark"></i></a>
            </div>
          </div>`);
    });
    $(document).on('click','.remove_item_btn', function(e){
      e.preventDefault();
      let row_item = $(this).parent().parent();
      $(row_item).remove();
    });
  });
</script>

<!--Auto Refresh Chat-->
<script> 
$(document).ready(function(){
setInterval(function(){
      $("#sample").load(window.location.href + " #sample" );
}, 3000);
});

var element = document.getElementById("scroll_position");
element.scrollTop = element.scrollHeight;


</script>




