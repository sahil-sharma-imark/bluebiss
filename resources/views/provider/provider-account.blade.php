@include('layouts.header')

@php
$provider_id = Auth::user()->id;
@endphp

  <main id="main" class="bg-color-gray">

    <section class="provider-account-main">

      <div class="provider-account-top-head">
        <div class="container">
          <div class="provider-account-top">
            <div class="provider-account-menu">
              <ul>
                <li><a class="activelink" href="javascript:void(0)" data-tag="BroadcastedRequests">Broadcasted Requests</a></li>
                <li><a href="javascript:void(0)" data-tag="RequestedTasks">Requested Tasks</a></li>
                <li><a href="javascript:void(0)" data-tag="AssignedTasks">Assigned Tasks</a></li>
                <li><a href="javascript:void(0)" data-tag="PastTasks">Past Tasks</a></li>
    
              </ul>
            </div>
  
            <div class="provider-account-top-right">
              <select class="form-control form-select">
                <option>UrbanClab Cleaning Services</option>
                <option>UrbanClab Cleaning Services</option>
               </select>
  
              <a class="btn refresh-btn" href="#"><i class="fa-solid fa-arrow-rotate-right"></i> Refresh</a>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
         <div class="kshfoisd-list">
            <div class="provider-accountBox active" id="BroadcastedRequests">
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
    
                </div>
      
                <div class="provider-listing-right">
                  
                  @if(count($broadcasts)>0)
                  @foreach($broadcasts as $broadcast)
                  <div class="provider-listing-box-right provider-list-border">
                    <div class="provider-listing-info">
                        <div class="provider-listing-info-top">
                          <div class="provider-listing-about-info">
                            <figure class="provider-profile-img">
                              <img src="{{asset('uploads/user/'.$broadcast->user_id.'/'.$broadcast->task_image)}}" alt="">

                              <span class="provider-name">{{$broadcast->task_username.' '.$broadcast->task_userlastname}}</span>
                            </figure>
        
                            <div class="provider-listing-about">
                              <h5 class="req-house-text">Request for {{$broadcast->cleaning_radio}}</h5>
                
                              <ul class="task-list">
                                <li>
                                   <img src="images/location.png" alt=""> 
        
                                   {{$broadcast->task_address}}
                                </li>
        
                                <li>
                                  <img src="images/calendar-i.png" alt=""> 
        
                                  {{$broadcast->know}}
                                </li>

                                <li>
                                  <img src="images/watch.png" alt=""> 
        
                                  {{$broadcast->shipping}}
                                </li>
       
                              </ul>
                            </div>
                          </div>
      
                          <div class="right-view">
                            <p class="hours-ago">{{ \Carbon\Carbon::parse($broadcast->created_at)->diffForHumans()}}</p>
                            <div class="price-hours-ago">${{$broadcast->task_budget}}</div>
                          </div>
                        </div>
                        <h5 class="request-des-text">Request Description</h5>
                        <p>{{$broadcast->task_des}}</p>
                        <div class="provider-listing-bottom">
                          <a class="close-link" href="#">Close</a>
                          <div class="bottom-ud-btn">
                            @php
                            $credit_point = DB::table('broadcast_ids')->where('provider_id',$provider_id)->where('sender_id',$broadcast->task_id)->first();
                            @endphp
                            @if($credit_point->status == 0)
                            <a class="btn Chat-btn" href="#"><i class="fa-solid fa-message"></i> Booked</a>
                            @else
                            <a class="btn gray-br-btn ViewDetails tr "data-bs-toggle="modal" href="#process_credit" alt="<?php echo $credit_point->id; ?>" role="button"> ${{$credit_point->task_point}} Credit</a>
                            @endif
                            
                            @if($credit_point->status == 0)
                            <a class="btn Chat-btn" href="{{url('customer-chat?user_id='.$broadcast->user_id.'&task_id='.$broadcast->task_id)}}"><i class="fa-solid fa-message"></i> Chat</a>
                            @endif

                            <a class="btn gray-br-btn ViewDetails" href="{{url('tasks-detail-provider/'.$broadcast->task_id)}}">View Details</a>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="upgrade-membership-popup">
                    <div class="modal fade" id="process_credit" aria-hidden="true" aria-labelledby="Cancel-job1Label"
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
                
                            <p>Are you sure, do you want to process this task ?</p>
                 
                            <div class="create-btn">
                              <input type="hidden" name="" id="credit_id_data">
                              <button type="button" class="btn" id="redirect_provider">Ok</button>
                             <!--  <a class="btn" href="{{url('process-broadcast/'.$credit_point->id)}}">OK</a> -->
                              <button type="button" class="btn gray-br-btn" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            
                          </div>
                
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <div class="recent-requests-main">
                    <div class="recent-requests-content">
                      <figure>
                        <img src="{{asset('images/requests-img.svg')}}" alt="">
                      </figure>

                      <h5>You have not posted any recent quote requests.</h5>

                      <p>Select a service that you need from the catalog.</p>

                      <a class="btn" href="{{url('task-details')}}">Post a task</a>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
            </div>

            <!-- Broadcast task end -->

            

            <!-- Requested Tasks start -->

            <div class="provider-accountBox" id="RequestedTasks">
              @if(count($cus_requests)>0)
              @foreach($cus_requests as $cus_request)
              <div class="req-task-box">
                <div class="req-task-info">
                    <div class="req-task-info-top">
                      <div class="req-task-about-info-left">

                       <h5 class="req-house-heading">Request for {{$cus_request->cleaning_radio}}</h5>
 
                       <div class="req-task-about-info">
                        <figure class="provider-profile-img">
                          <img src="images/request-img.png" alt="">
                        </figure>
    
                        <div class="req-task-about">

                          <div class="posted-by">
                            <p class="posted-by-text">POSTED BY</p>

                            <div class="provider-name">{{$cus_request->name.' '.$cus_request->lastname}}</div>

                            <div class="prov-price">${{$cus_request->task_budget}}</div>
                          </div>
            
                          <ul class="task-list">
                            <li>
                               <img src="images/location.png" alt=""> 
    
                               {{$cus_request->task_address}}
                            </li>
    
                            <li>
                              <img src="images/calendar-i.png" alt=""> 
    
                              {{$cus_request->datetimes}}
                            </li>

                            <li>
                              <img src="images/watch.png" alt=""> 
    
                              Afternoon (12pm - 5pm)
                            </li>
   
                          </ul>

                          <ul class="phone-info-task-list">
                            <li>
                              <a href="tel:{{$cus_request->number}}">
                                <svg viewBox="0 0 15.342 15.369">
                                  <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                                
      
                                 {{$cus_request->number}}
                              </a>
                            </li>
    
                            <li>
                            <a href="mailto:{{$cus_request->email}}">
                              <svg viewBox="0 0 15.3 12.5">
                                <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                
                                <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                               
                              {{$cus_request->email}}
                            </a>
                            </li>   
                          </ul>

                          <ul class="phone-info">
                            <li>
                            <a href="tel:9876543210">
                              <svg viewBox="0 0 15.342 15.369">
                                <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                            </a>
                            </li>
    
                            <li>
                               <a href="mailto:Example@gmail.com">
                                <svg viewBox="0 0 15.3 12.5">
                                  <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                  
                                  <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                               </a>
                               
                              
                            </li>   
                          </ul>


                        </div>
                       </div>
                      </div>
  
                      <div class="right-view">
                        <p class="hours-ago">13 hours ago</p>

                      <a class="payment-detail-btn detail-btn-br-red" href="#">Awaiting</a>

                      </div>
                    </div>
                    
                    <div class="request-des-col">
                      <h5 class="request-des-text">Request Description</h5>
  
                      <p>{{$cus_request->task_des}}</p>
                    </div>
                    
                    <div class="req-task-bottom">
                      <a class="close-link" href="#">Cancel Request</a>

                      <div class="bottom-ud-btn">
                        <a class="btn gray-br-btn ViewDetails" href="{{url('tasks-detail-provider/'.$cus_request->id)}}">View Details</a>

                        <a class="btn Chat-btn" href="#"><i class="fa-solid fa-message"></i> Chat</a>
                      </div>
                    </div>

                  </div>
              </div>
              @endforeach
              @else
              <div class="recent-requests-main">
                <div class="recent-requests-content">
                  <figure>
                    <img src="{{asset('images/requests-img.svg')}}" alt="">
                  </figure>

                  <h5>You have not posted any recent quote requests.</h5>

                  <p>Select a service that you need from the catalog.</p>

                  <a class="btn" href="{{url('task-details')}}">Post a task</a>
                </div>
              </div>
              @endif

            </div>

            <!-- Requested Tasks End -->

            <div class="provider-accountBox" id="AssignedTasks">
               
              <div class="req-task-box">
                <div class="req-task-info">
                    <div class="req-task-info-top">
                      <div class="req-task-about-info-left">

                       <h5 class="req-house-heading">Request for House Cleaning</h5>
 
                       <div class="req-task-about-info">
                        <figure class="provider-profile-img">
                          <img src="images/request-img.png" alt="">
                        </figure>
    
                        <div class="req-task-about">

                          <div class="posted-by">
                            <p class="posted-by-text">POSTED BY</p>

                            <div class="provider-name">Robin R</div>

                            <div class="prov-price">$1500</div>
                          </div>
            
                          <ul class="task-list">
                            <li>
                               <img src="images/location.png" alt=""> 
    
                               Caribbean Blvd, Cutler Bay, FL, USA
                            </li>
    
                            <li>
                              <img src="images/calendar-i.png" alt=""> 
    
                              April 26, 2021 Thursday
                            </li>

                            <li>
                              <img src="images/watch.png" alt=""> 
    
                              Afternoon (12pm - 5pm)
                            </li>
   
                          </ul>

                          <ul class="phone-info-task-list">
                            <li>
                              <a href="tel:9876543210">
                                <svg viewBox="0 0 15.342 15.369">
                                  <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                                
      
                                 9876543210
                              </a>
                            </li>
    
                            <li>
                            <a href="mailto:Example@gmail.com">
                              <svg viewBox="0 0 15.3 12.5">
                                <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                
                                <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                               
                              Example@gmail.com
                            </a>
                            </li>   
                          </ul>

                          <ul class="phone-info">
                            <li>
                            <a href="tel:9876543210">
                              <svg viewBox="0 0 15.342 15.369">
                                <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                            </a>
                            </li>
    
                            <li>
                               <a href="mailto:Example@gmail.com">
                                <svg viewBox="0 0 15.3 12.5">
                                  <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                  
                                  <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                               </a>
                               
                              
                            </li>   
                          </ul>


                        </div>
                       </div>
                      </div>
  
                      <div class="right-view">
                        <p class="hours-ago">13 hours ago</p>

                      <a class="payment-detail-btn detail-btn-br-green" href="#">Payment Detail</a>

                      </div>
                    </div>
                    
                    <div class="request-des-col">
                      <h5 class="request-des-text">Request Description</h5>
  
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                    </div>
                    
                    <div class="req-task-bottom">
                      <a class="close-link" href="#">Cancel Request</a>

                      <div class="bottom-ud-btn">
                        <a class="btn gray-br-btn ViewDetails" href="#">View Details</a>

                        <a class="btn Chat-btn" href="#"><i class="fa-solid fa-message"></i> Chat</a>
                      </div>
                    </div>

                  </div>
              </div>

              <div class="req-task-box">
                <div class="req-task-info">
                    <div class="req-task-info-top">
                      <div class="req-task-about-info-left">

                       <h5 class="req-house-heading">Request for House Cleaning</h5>
 
                       <div class="req-task-about-info">
                        <figure class="provider-profile-img">
                          <img src="images/request-img.png" alt="">
                        </figure>
    
                        <div class="req-task-about">

                          <div class="posted-by">
                            <p class="posted-by-text">POSTED BY</p>

                            <div class="provider-name">Robin R</div>

                            <div class="prov-price">$1500</div>
                          </div>
            
                          <ul class="task-list">
                            <li>
                               <img src="images/location.png" alt=""> 
    
                               Caribbean Blvd, Cutler Bay, FL, USA
                            </li>
    
                            <li>
                              <img src="images/calendar-i.png" alt=""> 
    
                              April 26, 2021 Thursday
                            </li>

                            <li>
                              <img src="images/watch.png" alt=""> 
    
                              Afternoon (12pm - 5pm)
                            </li>
   
                          </ul>

                          <ul class="phone-info-task-list">
                            <li>
                              <a href="tel:9876543210">
                                <svg viewBox="0 0 15.342 15.369">
                                  <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                                
      
                                 9876543210
                              </a>
                            </li>
    
                            <li>
                            <a href="mailto:Example@gmail.com">
                              <svg viewBox="0 0 15.3 12.5">
                                <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                
                                <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                               
                              Example@gmail.com
                            </a>
                            </li>   
                          </ul>

                          <ul class="phone-info">
                            <li>
                            <a href="tel:9876543210">
                              <svg viewBox="0 0 15.342 15.369">
                                <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                            </a>
                            </li>
    
                            <li>
                               <a href="mailto:Example@gmail.com">
                                <svg viewBox="0 0 15.3 12.5">
                                  <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                  
                                  <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                               </a>
                               
                              
                            </li>   
                          </ul>


                        </div>
                       </div>
                      </div>
  
                      <div class="right-view">
                        <p class="hours-ago">13 hours ago</p>

                      <a class="payment-detail-btn detail-btn-br-green" href="#">Payment Detail</a>

                      </div>
                    </div>
                    
                    <div class="request-des-col">
                      <h5 class="request-des-text">Request Description</h5>
  
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                    </div>
                    
                    <div class="req-task-bottom">
                      <a class="close-link" href="#">Cancel Request</a>

                      <div class="bottom-ud-btn">
                        <a class="btn gray-br-btn ViewDetails" href="#">View Details</a>

                        <a class="btn Chat-btn" href="#"><i class="fa-solid fa-message"></i> Chat</a>
                      </div>
                    </div>

                  </div>
              </div>

            </div>

            <div class="provider-accountBox" id="PastTasks">
              <div class="req-task-box">
                <div class="req-task-info">
                    <div class="req-task-info-top border-0 pb-0 mb-0">
                      <div class="req-task-about-info-left">

                       <h5 class="req-house-heading">Request for House Cleaning</h5>
 
                       <div class="req-task-about-info">
                        <figure class="provider-profile-img">
                          <img src="images/request-img.png" alt="">
                        </figure>
    
                        <div class="req-task-about">

                          <div class="posted-by">
                            <p class="posted-by-text">POSTED BY</p>

                            <div class="provider-name">Robin R</div>

                            <div class="prov-price">$1500</div>
                          </div>
            
                          <ul class="task-list">
                            <li>
                               <img src="images/location.png" alt=""> 
    
                               Caribbean Blvd, Cutler Bay, FL, USA
                            </li>
    
                            <li>
                              <img src="images/calendar-i.png" alt=""> 
    
                              April 26, 2021 Thursday
                            </li>

                            <li>
                              <img src="images/watch.png" alt=""> 
    
                              Afternoon (12pm - 5pm)
                            </li>
   
                          </ul>

                          <ul class="phone-info-task-list">
                            <li>
                              <a href="tel:9876543210">
                                <svg viewBox="0 0 15.342 15.369">
                                  <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                                
      
                                 9876543210
                              </a>
                            </li>
    
                            <li>
                            <a href="mailto:Example@gmail.com">
                              <svg viewBox="0 0 15.3 12.5">
                                <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                
                                <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                               
                              Example@gmail.com
                            </a>
                            </li>   
                          </ul>

                          <ul class="phone-info">
                            <li>
                            <a href="tel:9876543210">
                              <svg viewBox="0 0 15.342 15.369">
                                <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                            </a>
                            </li>
    
                            <li>
                               <a href="mailto:Example@gmail.com">
                                <svg viewBox="0 0 15.3 12.5">
                                  <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                  
                                  <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                               </a>
                               
                              
                            </li>   
                          </ul>


                        </div>
                       </div>
                      </div>
  
                      <div class="right-view right-btn-alg-just">
                        <div class="task-btn-right">
                          <a class="payment-detail-btn detail-btn-br-green" href="#">Completed</a>
                         </div>

                        <div class="task-btn-right">
                          <a class="btn gray-br-btn ViewDetails" href="#">View Details</a>
                        </div>

                      </div>
                    </div>
                     
                  </div>
              </div>

              <div class="req-task-box">
                <div class="req-task-info">
                    <div class="req-task-info-top border-0 pb-0 mb-0">
                      <div class="req-task-about-info-left">

                       <h5 class="req-house-heading">Request for House Cleaning</h5>
 
                       <div class="req-task-about-info">
                        <figure class="provider-profile-img">
                          <img src="images/request-img.png" alt="">
                        </figure>
    
                        <div class="req-task-about">

                          <div class="posted-by">
                            <p class="posted-by-text">POSTED BY</p>

                            <div class="provider-name">Robin R</div>

                            <div class="prov-price">$1500</div>
                          </div>
            
                          <ul class="task-list">
                            <li>
                               <img src="images/location.png" alt=""> 
    
                               Caribbean Blvd, Cutler Bay, FL, USA
                            </li>
    
                            <li>
                              <img src="images/calendar-i.png" alt=""> 
    
                              April 26, 2021 Thursday
                            </li>

                            <li>
                              <img src="images/watch.png" alt=""> 
    
                              Afternoon (12pm - 5pm)
                            </li>
   
                          </ul>

                          <ul class="phone-info-task-list">
                            <li>
                              <a href="tel:9876543210">
                                <svg viewBox="0 0 15.342 15.369">
                                  <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                                
      
                                 9876543210
                              </a>
                            </li>
    
                            <li>
                            <a href="mailto:Example@gmail.com">
                              <svg viewBox="0 0 15.3 12.5">
                                <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                
                                <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                               
                              Example@gmail.com
                            </a>
                            </li>   
                          </ul>

                          <ul class="phone-info">
                            <li>
                            <a href="tel:9876543210">
                              <svg viewBox="0 0 15.342 15.369">
                                <path id="Icon_feather-phone-call" data-name="Icon feather-phone-call" d="M11.823,4.176a3.345,3.345,0,0,1,2.642,2.642M11.823,1.5a6.021,6.021,0,0,1,5.318,5.312m-.669,5.338v2.007a1.338,1.338,0,0,1-1.458,1.338,13.239,13.239,0,0,1-5.773-2.054A13.045,13.045,0,0,1,5.227,9.427a13.239,13.239,0,0,1-2.054-5.8A1.338,1.338,0,0,1,4.5,2.169H6.511A1.338,1.338,0,0,1,7.849,3.32,8.589,8.589,0,0,0,8.318,5.2a1.338,1.338,0,0,1-.3,1.411l-.85.85a10.7,10.7,0,0,0,4.014,4.014l.85-.85a1.338,1.338,0,0,1,1.411-.3,8.59,8.59,0,0,0,1.88.468A1.338,1.338,0,0,1,16.472,12.15Z" transform="translate(-2.517 -0.782)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                              </svg>
                            </a>
                            </li>
    
                            <li>
                               <a href="mailto:Example@gmail.com">
                                <svg viewBox="0 0 15.3 12.5">
                                  <path id="Path_26043" data-name="Path 26043" d="M17,9l-7,4.9L3,9" transform="translate(-2.095 -8.095)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                  
                                  <path id="Path_26042" data-name="Path 26042" d="M4.4,6H15.6A1.4,1.4,0,0,1,17,7.4v8.4a1.4,1.4,0,0,1-1.4,1.4H4.4A1.4,1.4,0,0,1,3,15.8V7.4A1.4,1.4,0,0,1,4.4,6Z" transform="translate(-2.35 -5.35)" fill="rgba(0,0,0,0)" stroke="rgba(32,39,43,0.8)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                </svg>
                               </a>
                               
                              
                            </li>   
                          </ul>


                        </div>
                       </div>
                      </div>
  
                      <div class="right-view right-btn-alg-just">
                        <div class="task-btn-right">
                           <a class="payment-detail-btn detail-btn-br-red" data-bs-toggle="modal" href="#Cancel-task" role="button">Incomplete</a>
                         </div>

                        <div class="task-btn-right">
                          <a class="btn gray-br-btn ViewDetails" href="#">View Details</a>
                        </div>

                      </div>
                    </div>
                     
                  </div>
              </div>
            </div>
        </div>
      </div>
    </section>
   
  </main>

  @include('layouts.provider_footer')

  <div class="upgrade-membership-popup">
    <div class="modal fade" id="Cancel-task" aria-hidden="true" aria-labelledby="Cancel-taskLabel"
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

            <p>Are you sure you want to cancel your task?</p>
 
            <div class="create-btn">
              <button type="button" class="btn gray-br-btn" data-bs-dismiss="modal">Cancel</button>
              
              <a class="btn btn-bg-red" data-bs-toggle="modal" href="#Cancel-Task-Request" role="button" data-bs-dismiss="modal">Submit</a>
             </div>
            
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="cancel-task-request-popup">
    <div class="modal fade" id="Cancel-Task-Request" aria-hidden="true" aria-labelledby="Cancel-Task-RequestLabel"
      tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="ceate-listing-content modal-content-padd">
            <div class="title"> 
              <h5>Why do you want to <br> cancel task?</h5>
            </div>

            <div class="check-box-radius check-box-radius-forPX">
              <label>
                <input type="radio" name="task">
                <span><i class="check-icon"></i></span>
                Spam task request

              </label>
            </div>

            <div class="check-box-radius check-box-radius-forPX">
              <label>
                <input type="radio" name="task">
                <span><i class="check-icon"></i></span>
                The rates are too Low

              </label>
            </div>

            <div class="check-box-radius check-box-radius-forPX">
              <label>
                <input type="radio" name="task">
                <span><i class="check-icon"></i></span>
                Customer Unreachable

              </label>
            </div>
            
            <div class="check-box-radius check-box-radius-forPX">
              <label>
                <input type="radio" name="task">
                <span><i class="check-icon"></i></span>
                Couldn't get answers to my queries

              </label>
            </div>

            <div class="check-box-radius check-box-radius-forPX">
              <label>
                <input type="radio" name="task">
                <span><i class="check-icon"></i></span>
                Not sure about the Request

              </label>
            </div>

            <div class="check-box-radius check-box-radius-forPX">
              <label>
                <input type="radio" name="task" checked>
                <span><i class="check-icon"></i></span>
                Other

              </label>
            </div>

            <textarea class="form-control" placeholder="Can you share some more details?"></textarea>
 
            <div class="create-btn">     
              <a class="btn w-100" data-bs-toggle="modal" href="#CancelledSuccessfully" role="button" data-bs-dismiss="modal">Cancel Task Request</a>        
             </div>
            
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="upgrade-membership-popup">
    <div class="modal fade" id="CancelledSuccessfully" aria-hidden="true" aria-labelledby="CancelledSuccessfullyLabel"
      tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="ceate-listing-content modal-content-padd">
            <figure>
              <svg xmlns="http://www.w3.org/2000/svg" width="82" height="82" viewBox="0 0 82 82">
                <g id="Group_52788" data-name="Group 52788" transform="translate(-598.5 -224.188)">
                  <circle id="Ellipse_140" data-name="Ellipse 140" cx="40" cy="40" r="40" transform="translate(599.5 225.188)" fill="none" stroke="#0abe87" stroke-width="2"/>
                  <path id="Icon_feather-check" data-name="Icon feather-check" d="M37.728,9,15.915,30.813,6,20.9" transform="translate(617.5 245.281)" fill="none" stroke="#0abe87" stroke-width="2"/>
                </g>
              </svg>                           
            </figure>

            <p>Your Home Interior Painting job request has been cancelled successfully.</p>
 
            <div class="create-btn">           
              <a class="btn w-100" data-bs-toggle="modal" href="#" role="button">OK</a>
             </div>
            
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- jQuery first, then Bootstrap JS. -->
  <script src="js/bundle.min.js"></script>
  <script src="js/custom.js"></script>
<script type="text/javascript">
  $("body").on("click",".tr",function(){
    var tr = $(this).attr("alt");
    $("#credit_id_data").val(tr)
   
  })

 $("body").on("click","#redirect_provider",function(){
 var credit_id_data = $("#credit_id_data").val();
 window.location.href = 'process-broadcast/'+credit_id_data;

 /* $(location).href('process-broadcast/'+credit_id_data)*/

 })
</script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/latest/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/latest/respond.min.js"></script>
     <![endif]-->
</body>

</html>