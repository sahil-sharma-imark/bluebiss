@include('layouts.header')
  <main id="main">
    @if(session()->has('message'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(session()->has('messagechangepass'))    
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('messagechangepass') }}
    </div>
    @endif
    @if(session()->has('messagedeletep'))    
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('messagedeletep') }}
    </div>
    @endif
    <section class="profile-page">
      <div class="container">
        <div class="profile-page-row">
          <div class="profile-left">
            <div class="profile-left-menus">
              <ul>
                <li><a href="javascript:void(0)" class="activelink" data-tag="UserProfile">User Profile</a></li>
                <li><a href="javascript:void(0)" data-tag="BillingDetails">Billing Details</a></li>
                <li><a href="javascript:void(0)" data-tag="FavouriteProvider">Favourite Provider</a></li>
                <li><a href="javascript:void(0)" data-tag="MyTasks">My Tasks</a></li>
                <li><a href="javascript:void(0)" data-tag="ChangePassword">Change Password</a></li>
                <li><a href="javascript:void(0)" data-tag="SwitchProvider">Switch To provider</a></li>
                <li><a href="javascript:void(0)" data-tag="Notifications">Notifications</a></li>
                <li><a href="javascript:void(0)" data-tag="Transactions">Transactions</a></li>
                <li><a href="javascript:void(0)" data-tag="ReferralBonus">Referral Bonus</a></li>
                <li>
                  

                  <a class="refer-friends" href="javascript:void(0)">
                    You have earn <span style="color:#47BBD0; font-weight: bold; margin-top: 20px">${{$total_refno*100}}</span>
                    <figure>
                      <img src="images/refer-friends.svg" alt="">
                    </figure>

                    Refer Friends & Earn

                    <i class="fa-solid fa-star star1"></i>
                    <i class="fa-solid fa-star star2"></i>
                    <i class="fa-solid fa-star star3"></i>
                    <i class="fa-solid fa-star star4"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="profile-right">
            <div id="UserProfile" class="profile-contentBox active">
              <div class="user-profile-title">
                <h4>User Profile</h4>
              </div>

              <div class="Box-max-wirth">
                <h5 class="profile-text">Profile Image</h5>
                <form method="POST" action="/profile-update/{{$cuser->id}}" enctype="multipart/form-data">
                	@csrf

                <div class="profile-images-row">
                  <figure>
                    <img src="{{asset('uploads/user/'.$cuser->id.'/'.$cuser->image)}}" alt="">
                  </figure>

                  <div class="profile-images-right">
                    <div class="upload-btn">
                      <div class="file">
                        <label for="input-file">
                         Upload Image
                        </label>
                        <input id="input-file" type="file" name="image">
                      </div>

                      <a class="btn gray-br-btn" href="{{url('delete-img/'.$cuser->id)}}">Delete</a>
                    </div>

                    <p>This should be a image upload form only that allows image types as png, jpg, bitmap. Maximum size
                      is of 10MB.</p>
                  </div>
                </div>

                
                  <h5>Personal Information</h5>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-field">
                        <label>First Name *</label>
                        <input type="text" class="form-control" name="name" value="{{$cuser->name}}" placeholder="Praveen">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="{{$cuser->lastname}}" placeholder="Solanki">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Mobile Number</label>
                        <div class="input-up-cnt-main">
                          <input type="number" class="form-control" name="number" value="{{$cuser->number}}" placeholder="9876 543 210">
                          <a href="#" class="input-up-cnt">
                            Verified <img src="images/check-circle.png" alt="">
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Email</label>
                        <div class="input-up-cnt-main">
                          <input type="email" class="form-control" name="email" value="{{$cuser->email}}" placeholder="dummymail1234@gmail.com" readonly>
                          <!-- <a href="#" class="input-up-cnt">
                            Edit <i class="fa-solid fa-pen"></i>
                          </a> -->
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Gender</label>

                        <div class="gender-box-radius">
                            <div class="check-box-radius">
                                <label>
                                    <input type="radio" name="gender" value="male" @if($cuser->gender=="male") checked @endif>
                                    <span></span>
                                    Male
                                </label>
                            </div>
	                        <div class="check-box-radius">
	                            <label>
	                                <input type="radio" name="gender" value="female" @if($cuser->gender=="female") checked @endif>
	                                <span></span>
	                                Female
	                            </label>
	                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-field">
	                        <label>Date of Birth</label>
	                        <input type="date" class="form-control date-field" name="dob" value="{{ date('Y-m-d', strtotime($cuser->dob)); }}">
	                        
                        </div>
                    </div>

                    <div class="col-md-12">
                      <div class="check-box">
                        <input type="checkbox" id="Saveinfo">
                        <label for="Saveinfo">I want to receive marketing and promotional offers</label>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="bottom-ud-btn">
                        <a class="btn gray-br-btn" href="#">Cancel</a>

                        <!-- <a class="btn" type="button" href="{{url('profile_update/'.$cuser->id)}}">Update Info</a> -->
	                    <button type="submit" class="btn">Update</button>

                      </div>
                    </div>


                  </div>
                </form>
              </div>
            </div>

            <div id="BillingDetails" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>Billing Details</h4>
              </div>

              <div class="Box-max-wirth">
                <h5 class="profile-text">Payment method</h5>

                <form id="bill_Details" method="POST" action="/billing-details">
                  @csrf
                  <div class="payment-method-box">
                    <div class="payment-method">
                      <div class="payment-method-row">
                        <div class="card-text">Credit/Debit Card</div>

                        <div class="card-number">
                          <input type="number">
                          <input type="number">
                          <input type="number">
                          <input type="number">
                        </div>

                      </div>
                      <p>Safe money transfer using your bank account visa, maestro, discover, <br> American express.</p>

                    </div>

                    <div class="card-field-padd pb-0">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-field">
                            <label>Card Number *</label>
                            <input type="number" name="card_number" id="card_number" class="form-control" placeholder="XXXX XXXX XXXX XXXX">
                            <span style="color: red"> @error('card_number'){{$message}}@enderror</span>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-field">
                            <label>CVV Code</label>
                            <input type="number" name="cvv" id="cvv" class="form-control CVV-Code" placeholder="123">
                            <span style="color: red"> @error('cvv'){{$message}}@enderror</span>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-field">
                            <label>Expiry date</label>
                            <input type="date" name="expiry" id="expiry" class="form-control text-upc" placeholder="MM/YYYY">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <h5>Billing Address</h5>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Street Address *</label>
                        <input type="text" name="txtPlace" id="txtPlace" class="form-control" placeholder="Street address">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Address Line 2</label>
                        <input type="text" name="address_line" id="address_line" class="form-control" placeholder="Address line 2">
                      </div>
                    </div>

                    <div class="col-md-6 show_hide">
                      <div class="form-field">
                        <label>City or Town *</label>
                        <input type="text" name="city_town" id="city_town" class="form-control" placeholder="City or Town">
                      </div>
                    </div>


                    <div class="col-md-6 show_hide">
                      <div class="form-field">
                        <label>ZIP or Postcode</label>
                        <input type="text" name="zip" id="zip" class="form-control" placeholder="ZIP or postcode">
                      </div>
                    </div>

                    <div class="col-md-6 show_hide">
                      <div class="form-field mb-0">
                        <label>State or Province</label>
                        <input type="text" name="state" id="state" class="form-control" placeholder="State or Province">
                      </div>
                    </div>


                    <div class="col-md-6 show_hide">
                      <div class="form-field mb-0">
                        <label>Country *</label>
                        <input type="text" name="country" id="country">

                        

                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="bottom-ud-btn">
                        <a class="btn gray-br-btn" href="#">Cancel</a>
                        <button type="submit" class="btn">Create</button>
                        <!-- <a class="btn" href="#">Update Info</a> -->
                      </div>
                    </div>


                  </div>
                </form>
              </div>


            </div>

            <div id="FavouriteProvider" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>Favourite Providers</h4>
              </div>
              @php
              $userid = Auth::user()->id;
              $favorite_providers = DB::table('favorite_provider')
              ->join('users', 'favorite_provider.provider_id', '=', 'users.id')
              ->join('provider_listing', 'favorite_provider.provider_id', '=', 'provider_listing.provider_id')
              ->where('favorite_provider.user_id', $userid)
              ->get([
              'provider_listing.*',
              'users.image as user_image',
              'users.name as name',
              'favorite_provider.id as fproviderid'
              ]);
              @endphp
              <div class="favourite-providers">
                @if(count($favorite_providers)>0)
                @foreach($favorite_providers as $favorite_provider)
                <div class="FavouriteProv-row">
                  <div class="FavouriteProv-about-info">
                    <figure>
                      <img src="{{asset('uploads/provider/'.$favorite_provider->provider_id.'/'.$favorite_provider->user_image)}}" alt="">
                    </figure>
                    <div class="FavouriteProv-about">
                      <h5>{{$favorite_provider->name}}</h5>
                      <div class="ratings">4.3 <i class="fa-solid fa-star"></i>
                        <span>Ratings</span>
                      </div>
                      <p>{{ $favorite_provider->description }}</p>
                    </div>
                  </div>
                  <div class="right-view">
                    <div class="hou-price">${{ $favorite_provider->price_per_hour }}/hour</div>
                    <a class="gray-br-btn btn" 
                    href="{{url('provider-profile-preview/'.$favorite_provider->provider_id)}}">View Profile</a>
                    <a href="{{url('delete-favorite/'.$favorite_provider->fproviderid)}}" class="remove-text">Remove from favourite</p>
                  </div>
                </div>
                @endforeach
                @else
                <figure>
                  <img src="images/favourite-providers.svg" alt="">
                </figure>
                <div class="favourite-prov">No favourite providers available</div>
                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                @endif
                

                

                
              </div>

            </div>

            <div id="MyTasks" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>My Tasks</h4>
              </div>
              @if(count($tasks)>0)
              @foreach($tasks as $task)

              <div class="FavouriteProv-row">
                <div class="FavouriteProv-about-info">
                  <figure>
                    <!-- <img src="images/kimberly.png" alt=""> -->
                  </figure>

                  <div class="FavouriteProv-about">
                    <h5>{{$task->cleaning_radio}}</h5>

                    <!-- <div class="ratings">4.3 <i class="fa-solid fa-star"></i> <span>Ratings</span></div> -->

                    <p>{{$task->task_des}}</p>
                  </div>
                </div>

                <div class="right-view">
                  <div class="hou-price">${{$task->task_budget}}</div>

                  <a class="gray-br-btn btn" href="{{url('my-task-detail/'.$task->id)}}">View Detail</a>

                  <!-- <p class="remove-text">Remove from favourite</p> -->
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

            <div id="ChangePassword" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>Change Password</h4>
              </div>

              <div class="Box-max-wirth">
                <form id="ueserpassword" method="POST" action="/user-change-pass">
                  @csrf
                <!-- <form id="ueserpassword" method="POST" action="/change-password/{{$cuser->id}}"> -->
                  @php 
                  $userid = Auth::user()->id;
                	$oldpass = DB::table('users')->select('password')->where('id',$userid)->first();
                  @endphp
                  <!-- <div class="col-md-12">
                    <div class="form-field">
                      <label>Current Password *</label>

                      <div class="pass-field">
                        <input type="text" class="form-control" id="hidentext" name="hidentext" value="{{$oldpass->password}}">
                        <input id="useroldpass" type="password" class="form-control" name="useroldpass" placeholder="Enter current password">
                        <span toggle="#password-field1" class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                        <span style="color: red"> @error('useroldpass'){{$message}}@enderror</span>
                      </div>
                    </div>
                  </div> -->

                  <div class="col-md-12">
                    <div class="form-field">
                      <label>New Password *</label>

                      <div class="pass-field">
                        <input id="usernewpass" type="password" class="form-control" name="usernewpass" 
                          placeholder="Enter new password">
                        <span toggle="#password-field2" class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                        <span style="color: red"> @error('usernewpass'){{$message}}@enderror</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Confirm New Password *</label>

                      <div class="pass-field">
                        <input id="usernewconpass" type="password" class="form-control" name="usernewconpass" 
                          placeholder="Confirm new password">
                        <span toggle="#password-field3" class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                        <span style="color: red"> @error('usernewconpass'){{$message}}@enderror</span>
                      </div>
                    </div>
                  </div>

                  <div class="bottom-ud-btn">
                    <!-- <a class="btn" href="#">Change Password</a> -->
	                <button type="submit" class="btn">Change Password</button>


                  </div>
                </form>
              </div>

            </div>

            <div id="SwitchProvider" class="profile-contentBox notif-all">
              <div class="user-profile-title">
                <h4>Notifications</h4>

                <ul class="notif-link">
                  <li><a class="active" href="#">All</a></li>
                  <li><a href="#">Quotations</a></li>
                </ul>
              </div>

              <div class="mark-read">
                <p>New</p>

                <a class="link-text" href="#">Mark as read</a>
              </div>

              <div class="notif-all-row">
                <div class="notif-all-about-info">
                  <figure>
                    <!-- <img src="images/kimberly.png" alt=""> -->
                  </figure>

                  <div class="notif-all-about">
                    <h5>BlueBis Offer</h5>

                    <p>Hello, I am BliueBis assistant and I am here for you. If you need a help with anything feel free to let me know :)</p>
                  </div>
                </div>

                <div class="notif-all-right-view">
                 <p>April 26, 2021</p>
                </div>
              </div>

              <div class="notif-all-row">
                <div class="notif-all-about-info">
                  <figure>
                    <!-- <img src="images/kimberly.png" alt=""> -->
                  </figure>

                  <div class="notif-all-about">
                    <h5>Message from Steve Jones</h5>

                    <p>Hello, I am BliueBis assistant and I am here for you. If you need a help with anything feel free to let me know :)</p>
                  </div>
                </div>

                <div class="notif-all-right-view">
                 <p>April 26, 2021</p>
                </div>
              </div>

              <div class="notif-all-row">
                <div class="notif-all-about-info">
                  <figure>
                    <!-- <img src="images/kimberly.png" alt=""> -->
                  </figure>

                  <div class="notif-all-about">
                    <h5>Your booking is Confirmed</h5>

                    <p>Hello, I am BliueBis assistant and I am here for you. If you need a help with anything feel free to let me know :)</p>
                  </div>
                </div>

                <div class="notif-all-right-view">
                 <p>April 26, 2021</p>
                </div>
              </div>

              <div class="notif-all-row">
                <div class="notif-all-about-info">
                  <figure>
                    <!-- <img src="images/kimberly.png" alt=""> -->
                  </figure>

                  <div class="notif-all-about">
                    <h5>Message from Steve Jones</h5>

                    <p>Hello, I am BliueBis assistant and I am here for you. If you need a help with anything feel free to let me know :)</p>
                  </div>
                </div>

                <div class="notif-all-right-view">
                 <p>April 26, 2021</p>
                </div>
              </div>


            </div>

            <div id="Notifications" class="profile-contentBox notif-all">
              <div class="user-profile-title">
                <h4>Notifications</h4>
             <!--<ul class="notif-link">
                  <li><a class="active" href="#">All</a></li>
                  <li><a href="#">Quotations</a></li>
                </ul> -->
              </div>

              <div class="mark-read">
                <p>New</p>

                <a class="link-text" href="#">Mark as read</a>
              </div>
              @php
              $all_notification = DB::table('bluebis_notification')->get();
              @endphp
              @foreach($all_notification as $notification)
              @php
              $decode = json_decode($notification->notification_data,true);
              @endphp
              @if($notification->notification_type == 'brodcast_task')
              <div class="notif-all-row">
                <div class="notif-all-about-info">
                  <figure>
                    <!-- <img src="images/kimberly.png" alt=""> -->
                  </figure>

                  <div class="notif-all-about">
                    <h5>Dear user, your task has been process...</h5>
                    <p>Total budget - {{$decode['quote_amount']}}</p>
                  </div>
                </div>

                <div class="notif-all-right-view">
                 <p></p>
                </div>
              </div>
              @endif
              @if($notification->notification_type == 'redeem_task')
              <div class="notif-all-row">
                <div class="notif-all-about-info">
                  <figure>
                    <!-- <img src="images/kimberly.png" alt=""> -->
                  </figure>

                  <div class="notif-all-about">
                    <h5>Dear user, A provider send a request to process your task.</h5>
                    <p>Provider Name - {{$decode['provider_name']}}</p>
                    

                  </div>
                </div>

                <div class="notif-all-right-view">
                 <p></p>
                </div>
              </div>
              @endif
              @endforeach
            </div>

            <div id="Transactions" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>Transactions</h4>

                <select class="form-control form-select">
                  <option>Last 12 Months</option>
                  <option>Last 12 Months</option>
                </select>
              </div>

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Order Id</th>
                      <th>Service</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>#250234564</td>
                      <td>Referral Bonus</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="green-btn-text" href="#">Credit</a></td>
                    </tr>
                    <tr>
                      <td>#456234568</td>
                      <td>Wall Painting</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="red-btn-text" href="#">Debit</a></td>
                    </tr>
                    <tr>
                      <td>#486234563</td>
                      <td>Referral Bonus</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="green-btn-text" href="#">Credit</a></td>
                    </tr>
                    <tr>
                      <td>#775234564</td>
                      <td>Wall Painting</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="red-btn-text" href="#">Failed</a></td>
                    </tr>
                    <tr>
                      <td>#473234561</td>
                      <td>Referral Bonus</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="green-btn-text" href="#">Credit</a></td>
                    </tr>
                    <tr>
                      <td>#553234563</td>
                      <td>Wall Painting</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="red-btn-text" href="#">Debit</a></td>
                    </tr>
                    <tr>
                      <td>#998234564</td>
                      <td>House Cleaning</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="red-btn-text" href="#">Debit</a></td>
                    </tr>
                    <tr>
                      <td>#553234563</td>
                      <td>Wall Painting</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="yellow-btn-text" href="#">Pending</a></td>
                    </tr>
                    <tr>
                      <td>#998234564</td>
                      <td>House Cleaning</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="yellow-btn-text" href="#">Pending</a></td>
                    </tr>

                    <tr>
                      <td>#250234564</td>
                      <td>Referral Bonus</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="green-btn-text" href="#">Credit</a></td>
                    </tr>
                    <tr>
                      <td>#456234568</td>
                      <td>Wall Painting</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="red-btn-text" href="#">Debit</a></td>
                    </tr>
                    <tr>
                      <td>#486234563</td>
                      <td>Referral Bonus</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="green-btn-text" href="#">Credit</a></td>
                    </tr>
                    <tr>
                      <td>#775234564</td>
                      <td>Wall Painting</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="red-btn-text" href="#">Failed</a></td>
                    </tr>
                    <tr>
                      <td>#473234561</td>
                      <td>Referral Bonus</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="green-btn-text" href="#">Credit</a></td>
                    </tr>
                    <tr>
                      <td>#553234563</td>
                      <td>Wall Painting</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="red-btn-text" href="#">Debit</a></td>
                    </tr>
                    <tr>
                      <td>#998234564</td>
                      <td>House Cleaning</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="red-btn-text" href="#">Debit</a></td>
                    </tr>
                    <tr>
                      <td>#553234563</td>
                      <td>Wall Painting</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="yellow-btn-text" href="#">Pending</a></td>
                    </tr>
                    <tr>
                      <td>#998234564</td>
                      <td>House Cleaning</td>
                      <td>$120</td>
                      <td>April 26, 2021 9:30 am</td>
                      <td><a class="yellow-btn-text" href="#">Pending</a></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>

            <div id="ReferralBonus" class="profile-contentBox">

              <div class="earn-credit-title">
                <div class="earn-credit-left">
                  <h3>Refer Friends & Earn Credit</h3>

                  <p>Introduce a friend to Bluebis and you'll be credited $100 to your account</p>
                </div>

                <div class="earn-credit">
                  <h3>$100</h3>

                  <span>Credit</span>
                </div>
              </div>

              <div class="referral-bonus-form">
                <form id="referral_bonus" method="POST" action="{{url('referral-bonus')}}">
                  @csrf
                  <div class="form-field">
                    <label>Enter email address(es)</label>
                    <input type="email" id="referralemail" name="referralemail" class="form-control" placeholder="Separate each email address with a comma.">
                    <span style="color: red"> @error('referralemail'){{$message}}@enderror</span>
                  </div>

                  <div class="form-field">
                    <label>Subject</label>
                    <input type="text" id="referralsubject" name="referralsubject" class="form-control" placeholder="Praveen Solanki wants you to join BlueBis">
                    <span style="color: red"> @error('referralsubject'){{$message}}@enderror</span>
                  </div>

                  <div class="form-field">
                    <label>Message</label>

                    <textarea class="form-control" id="referralmessage" name="referralmessage" placeholder="Robin Rathore thinks that Bluebis would be a great way for you to find new customers.
                    
 When you sign up and become active on Bluebis , we’ll give you 5 free credits to get started. Use our PROMO CODE “STARTUP-0217” to claim your free credits.

 How Bluebis works

Customers tell us about their needs and we send you for free the details of their quote requests. When a request matches your service category, and if you’re interested, you can pay to view the customer details with Bluebis credits and send your quote. If you’re hired, finalize the job details and start working with your new customer.


Connecting with the right customers has never been simpler


- The Bluebis Team on behalf of Robin Rathore"></textarea>
                  </div>
                  <span style="color: red"> @error('referralmessage'){{$message}}@enderror</span>
                  <p>Note: Each person will receive a separate email. This is not a group email.</p>
                  <div class="bottom-ud-btn">
                    <a class="btn gray-br-btn" href="#">Cancel</a>
                    <!-- <a class="btn" href="#">Send Invite</a> -->
                    <button type="submit" class="btn">Send Invite</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- <div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a href="#" class="nav-link active" id="v-pills-Profile1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Profile1" type="button" role="tab" aria-controls="v-pills-Profile1" aria-selected="true">User Profile</a>
      <button class="nav-link" id="v-pills-profile2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile2" type="button" role="tab" aria-controls="v-pills-profile2" aria-selected="false">Billing Details</button>
      <button class="nav-link" id="v-pills-profile3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile3" type="button" role="tab" aria-controls="v-pills-profile3" aria-selected="false">Favourite Provider</button>
      <button class="nav-link" id="v-pills-profile4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile4" type="button" role="tab" aria-controls="v-pills-profile4" aria-selected="false">Change Password</button>
      <button class="nav-link" id="v-pills-profile5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile5" type="button" role="tab" aria-controls="v-pills-profile5" aria-selected="false">Switch To provider</button>
      <button class="nav-link" id="v-pills-profile6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile6" type="button" role="tab" aria-controls="v-pills-profile6" aria-selected="false">Notifications</button>
      <button class="nav-link" id="v-pills-profile7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile7" type="button" role="tab" aria-controls="v-pills-profile7" aria-selected="false">Transactions</button>
      <button class="nav-link" id="v-pills-profile8-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile8" type="button" role="tab" aria-controls="v-pills-profile8" aria-selected="false">Referral Bonus</button>
      <button class="nav-link" id="v-pills-profile9-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile9" type="button" role="tab" aria-controls="v-pills-profile9" aria-selected="false">Referral Bonus</button>
    
    </div>

    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-profile1" role="tabpanel" aria-labelledby="v-pills-profile1-tab">w</div>
      <div class="tab-pane fade" id="v-pills-profile2" role="tabpanel" aria-labelledby="v-pills-profile2-tab">dfsd</div>
      <div class="tab-pane fade" id="v-pills-profile3" role="tabpanel" aria-labelledby="v-pills-profile3-tab">sdf</div>
      <div class="tab-pane fade" id="v-pills-profile4" role="tabpanel" aria-labelledby="v-pills-profile4-tab">1edfsfd4</div>
      <div class="tab-pane fade" id="v-pills-profile5" role="tabpanel" aria-labelledby="v-pills-profile5-tab">1edfsfd5</div>
      <div class="tab-pane fade" id="v-pills-profile6" role="tabpanel" aria-labelledby="v-pills-profile6-tab">1edfsfd6</div>
      <div class="tab-pane fade" id="v-pills-profile7" role="tabpanel" aria-labelledby="v-pills-profile7-tab">1edfsfd7</div>
      <div class="tab-pane fade" id="v-pills-profile8" role="tabpanel" aria-labelledby="v-pills-profile8-tab">1edfsfd8</div>
      <div class="tab-pane fade" id="v-pills-profile9" role="tabpanel" aria-labelledby="v-pills-profile9-tab">1edfsfd9</div>
    </div>
  </div> -->

  
@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<!-- Billing Details -->  
<script>
  $(document).ready(function() {
    $("#bill_Details").validate({
      errorClass: "error text-danger",
      validClass: "valid success-alert",
      rules: {
        card_number: "required",
        cvv: "required",
        expiry:  "required",
        txtPlace: "required",
        city_town: "required",
        zip: "required",
        state: "required",
        country: "required",
      }
    });
  });  
</script>
<!-- Change password script -->
<script>
  $(document).ready(function() {
    $("#ueserpassword").validate({
      errorClass: "error text-danger",
      validClass: "valid success-alert",
      rules: {
        useroldpass: "required",
        usernewpass: "required",
        usernewconpass: {
          required: true,
          equalTo : "#usernewpass",
        },
      },
      messages: {
            useroldpass: "Emter Current Password",
            usernewpass: "Emter New Password",
            usernewconpass: {
              required: "This Field is required",
              equalTo : "Password not match",
            }
        },
    });
  });
</script>
<!-- End change password script -->

<!-- Referal Bonus script -->
<script>
  $(document).ready(function() {
    $("#referral_bonus").validate({
      errorClass: "error text-danger",
      validClass: "valid success-alert",
      rules: {
        referralemail: "required",
        referralsubject: "required",
      },        
      messages: {
            referralemail: "Email required",
            referralsubject: "Subject required",            
        },
    });
  });
</script>
<!-- End referal bonus script -->


<!-- End Script for registration --> 
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('txtPlace'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var address = results[0].formatted_address;
                        var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                        var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                        var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                        var city = results[0].address_components[results[0].address_components.length - 4].long_name;
                        document.getElementById('country').value = country;
                        document.getElementById('state').value = state;
                        document.getElementById('city_town').value = city;
                        document.getElementById('zip').value = pin;
                    }
                }
            });
        });
    });
</script>
<script>
  $('#txtPlace').keyup(function() {
  
  // If value is not empty
  if ($(this).val().length == 0) {
    // Hide the element
    $('.show_hide').hide();
  } else {
    // Otherwise show it
    $('.show_hide').show();
  }
}).keyup();
</script>
