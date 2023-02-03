@include('layouts.header')
 @php
 $all_deals = DB::table('deals')->where('deal_providerid',$edit_provider->id)->get();
 @endphp

<style>
  .select2-container{width: 100%!important;
}
</style>

  <main id="main">
    @if(session()->has('business_detail'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('business_detail') }}
    </div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('success') }}
    </div>
    @endif
     @if(session()->has('message'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(session()->has('messageupdate'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('messageupdate') }}
    </div>
    @endif
    @if(session()->has('messagestatus'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('messagestatus') }}
    </div>
    @endif
    @if(session()->has('messagepass'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('messagepass') }}
    </div>
    @endif
    @if(session()->has('messagebank'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('messagebank') }}
    </div>
    @endif
    @if(session()->has('adddeal'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('adddeal') }}
    </div>
    @endif
    @if(session()->has('delete_deal'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('delete_deal') }}
    </div>
    @endif
    <section class="profile-page">
      <div class="container">
        <div class="profile-page-row">
          <div class="profile-left">
            <div class="profile-left-menus">
              <ul>
                <li><strong>PROVIDER PROFILE</strong></li>
                <li><a class="activelink" href="javascript:void(0)" data-tag="EditProfile">Dashboard</a></li>
                <li><a href="javascript:void(0)" data-tag="ListMyServices">List My Services</a></li>
                <li><a href="javascript:void(0)" data-tag="Leads">About Leads</a></li>

                <li><a href="javascript:void(0)" data-tag="Transactions">Transactions</a></li>
                <li><a href="javascript:void(0)" data-tag="Notifications">Notifications</a></li>
                <li><a href="javascript:void(0)" data-tag="ReferralBonus">Referral Bonus</a></li>
                <li><a href="javascript:void(0)" data-tag="dealsdiscount">Deals & Discount</a></li>

                <li><strong>ACCOUNT SETTINGS</strong></li>
                <!-- <li><a href="javascript:void(0)" data-tag="EditProfile">Edit Profile</a></li> -->
                <li><a href="javascript:void(0)" data-tag="BusinessProfile">Business Profile</a></li>
                <li><a href="javascript:void(0)" data-tag="PaymentBillingDetails">Payment & Billing Details</a></li>
                <li><a href="javascript:void(0)" data-tag="fsd">Membership Plan</a></li>
                <!--<li><a href="javascript:void(0)" data-tag="dasd">Switch to Customer</a></li>-->
                <li><a href="javascript:void(0)" data-tag="SocialMedia">Social Media</a></li>
                <li><a href="javascript:void(0)" data-tag="ChangePassword">Change Password</a></li>
                <li><a href="{{ url('/logout') }}"> Logout </a></li>
                
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
            <div id="EditProfile" class="profile-contentBox active">
              <div class="user-profile-title">
                <h4>Edit Profile</h4>

                <a class="public-profile" href="#">View public profile</a>
              </div>

              <div class="Box-max-wirth">
                <h5 class="profile-text">Profile Image</h5>
                <form id="pro_edit" method="POST" action="/provider-update-profile/{{$edit_provider->id}}" enctype="multipart/form-data">
                  @csrf

                <div class="profile-images-row">
                  <figure>
                    <img src="{{asset('uploads/provider/'.$edit_provider->id.'/business_profile/'.$edit_provider->image)}}" alt="">
                  </figure>

                  <div class="profile-images-right">
                    <div class="upload-btn">
                      <div class="file">
                        <label for="input-file">
                          Upload Avtar
                        </label>
                        <input id="input-file" accept="image/jpeg, image/png" type="file" name="image">
                        <br>
                    
                      </div>
                      
   
                      <a class="btn gray-br-btn" onclick="return confirm('Are you sure?')" href="{{url('delete-pro-img/'.$edit_provider->id)}}">Delete</a>
                    </div>
                    <p class="info-color" style="font-weight: bold;" id="select_profile_image"></p>
                    <p>This should be a image upload form only that allows image types as png, Jpg, bitmap. Maximum size
                      is of 10mb.</p>
                  </div>
                </div>

                <form>
                  <h5>Personal Information</h5>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-field">
                        <label>First Name *</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$edit_provider->name}}" placeholder="Santosh">
                        <span class="text-danger" id="name-error"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname"
                        id="lastname" value="{{$edit_provider->lastname}}" placeholder="Solanki">
                        <span class="text-danger" id="lastname-error"></span>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Mobile Number *</label>

                        <div class="input-up-cnt-main">
                          <input type="number" class="form-control" name="number" id="number" value="{{$edit_provider->number}}" placeholder="9876 543 210">
                           <span class="text-danger" id="number-error"></span>

                          <a href="#" class="input-up-cnt">
                            Verified <img src="images/check-circle.png" alt="">
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Email *</label>

                        <div class="input-up-cnt-main">
                          <input type="email" class="form-control" name="email" value="{{$edit_provider->email}}" placeholder="dummymail1234@gmail.com" readonly>

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
                              <input type="radio" name="gender" value="male" @if($edit_provider->gender=="male") checked @endif>
                              <span></span>
                              Male

                            </label>
                          </div>

                          <div class="check-box-radius">
                            <label>
                              <input type="radio" name="female" value="female" @if($edit_provider->gender=="female") checked @endif>
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
                        <input type="date" class="form-control date-field" name="dob" value="{{ date('Y-m-d', strtotime($edit_provider->dob)); }}">
                        </select>
                      </div>
                    </div>

                    <div class="DoYouPractice">
                      <label>Do You Practice as a Company or an Individual ?</label>
                      @foreach($company_list as $company)
                      <div class="check-box-radius">
                        <label>
                          <input type="radio" name="company_type" value="{{$company->id}}" {{ ( $edit_provider->company_type == $company->id)? 'checked' : '' }}>
                          <span></span>
                          {{$company->company_name}}

                        </label>
                      </div>
                      @endforeach
                    </div>

                    <div class="col-md-12">
                      <div class="check-box">
                        <input type="checkbox" id="Saveinfo" checked>
                        <label for="Saveinfo">I want to receive marketing and promotional offers</label>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="bottom-ud-btn">
                        <a class="btn gray-br-btn" href="#">Cancel</a>
                        <button type="submit" class="btn">Update Info</button>
                        <!-- <a class="btn" href="#">Update Info</a> -->
                      </div>
                    </div>


                  </div>
                </form>
              </div>
            </div>

            <div id="ListMyServices" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>My Services</h4>

                <a class="btn create-listing-btn" data-bs-toggle="modal" href="#ceateNewlisting" role="button">Add a Service</a>
              </div>
              <!-- Add listing -->
              <div class="ceate-listing-popup">
                <div class="modal fade" id="ceateNewlisting" aria-hidden="true" aria-labelledby="ceateNewlistingLabel"
                  tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="ceate-listing-content">
                        <div class="title"> 
                          <h5>Select Your Services</h5>

                       
                        </div>
                        
                        <form id="createlist" method="POST" action="{{url('create-new-listing/'.$edit_provider->id)}}" enctype="multipart/form-data">
                          @csrf
                          <?php
                          $all_category = DB::table('sub_category')->orderBy('name','asc')->where('sub_cat_status',0)->get();
                          

                          ?>

                          <div class="form-field">
                            <label>Services Offered Category</label>
                            <input type="text" list="cars" name="subject" id="category-drop" placeholder="Start typing to find services"/>
                             <div id="tutu" style="color: red;"></div>
                            <datalist id="cars">
                              @foreach($all_category as $all_cat)
                              <option value="{{$all_cat->name}}">{{$all_cat->name}}</option>
                              @endforeach
                            </datalist>
                          </div>
                          <div id="tutu" style="color: red;"></div> 

                          <div class="form-field">
                            <label id="subcategory_label">Sub category</label>
                          <div id="kd"></div>
                            <input  type="text" name="" id="hidesub" class="form-control"  
                              placeholder="Select Sub Category">
                            <small></small>
                          </div>                         

                          <!-- <div class="form-field">
                            <label>Description</label>

                            <p>Please describe the service you are offering in detail</p>
    
                            <textarea class="form-control" name="list_text" id="list_text" placeholder="Describe here"></textarea>
                            <span style="color: red"> @error('card_number'){{$list_text}}@enderror</span>
                          </div> -->

                          <div class="form-field">
                            <label>Add Image</label>

                            <p>This is the first image potential customers see when viewing your listing</p>

                            <div class="upload-box">
                              <label class="upload-btn">
                                <p><i class="fa-solid fa-plus"></i></p>
                                <input type="file" name="list_img" id="list_img" class="upload-inputfile">
                              </label>
                            </div>
                            
                          </div>

                          <div class="create-btn">
                            <a href="#" data-bs-dismiss="modal" class="btn gray-br-btn">Cancel</a>
                            <!-- <a href="#" class="btn btn-primary">Save</a> -->
                            <button class="btn btn-primary" id="save_sub_cat">Save</button>
                          </div>
                        </form>

                      </div>
          
                    </div>
                  </div>
                </div>
              </div>
              <!-- End add listing -->
              <!-- Edit listing -->
              
              <!-- End edit listing -->
              @php
              $list_services = DB::table('listed_services')
              ->where('lis_providerid',$edit_provider->id)->get();
              $value_edit = [];
              @endphp
             
              @foreach($list_services as $list_service)
              <?php  $value_edit[] =  $list_service->listing_id;?>
              <div class="my-listings-row">
                <div class="my-listings-about-info">
                  <figure>
                    <img src="{{asset('uploads/provider/'.$edit_provider->id.'/listing_image/'.$list_service->service_image)}}" alt="">
                  </figure>

                  <div class="my-listings-about">

                    @if($list_service->status == 2)
                    <div class="info-text notComp-red">NOT COMPLETED <i class="fa-solid fa-circle-info"></i></div>
                    @elseif($list_service->status == 1)
                    <div class="info-text publ-gray">PAUSED <i class="fa-solid fa-circle-info"></i></div>
                    @elseif($list_service->status == 0)
                    <div class="info-text publ-green">PUBLISHED <i class="fa-solid fa-circle-info"></i></div>
                    @endif
                   
                    <p>{{$list_service->category}}</p>
                    <p style="font-weight:bold">{{$list_service->service_name}}</p>
                  </div>
 
                </div>
                <div class="right-view">
                  <ul class="icons-list">
                    <li>
                      <a href="{{url('pause-listing/'.$list_service->listing_id)}}">

                        @if($list_service->status == 1)
                        <svg viewBox="0 0 15.5 17.5">
                          <path id="Polygon_4" data-name="Polygon 4" d="M8,0l8,14H0Z" transform="translate(14.75 0.75) rotate(90)" fill="none" stroke="rgba(32,39,43,0.77)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                        </svg>
                        <span>Publish</span>
                        @elseif($list_service->status == 0)
                        <svg viewBox="0 0 14.3 17.5">
                          <g id="Icon_ionic-ios-pause" data-name="Icon ionic-ios-pause" transform="translate(-8.25 -6)">
                            <path id="Path_26198" data-name="Path 26198" d="M12.595,22.75H9.4A.4.4,0,0,1,9,22.35V7.15a.4.4,0,0,1,.405-.4h3.19a.4.4,0,0,1,.4.4v15.2A.4.4,0,0,1,12.595,22.75Z" fill="none" stroke="rgba(32,39,43,0.77)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                            <path id="Path_26199" data-name="Path 26199" d="M24.97,22.75H21.78a.4.4,0,0,1-.405-.4V7.15a.4.4,0,0,1,.405-.4h3.19a.4.4,0,0,1,.405.4v15.2A.4.4,0,0,1,24.97,22.75Z" transform="translate(-3.575)" fill="none" stroke="rgba(32,39,43,0.77)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                          </g>
                        </svg>
                        <span>Pause</span>
                      @endif
                    </a>
                    </li>

                    <li>
                      <a data-bs-toggle="modal" href="#editlisting{{$list_service->listing_id}}" role="button">
                      
                        <svg viewBox="0 0 17.684 17.684">
                          <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2" d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z" transform="translate(-2.25 -2.323)" fill="none" stroke="rgba(32,39,43,0.77)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                        </svg>
                         

                        <span>Edit</span>
                      </a>
                    </li>

                    <li>
                      <a onclick="return confirm('Are you sure?')" href="{{url('list-delete/'.$list_service->listing_id)}}">
                        <svg viewBox="0 0 11.868 16.75">
                          <g id="Group_54759" data-name="Group 54759" transform="translate(-1231 -211)">
                            <g id="Group_54757" data-name="Group 54757" transform="translate(257 3.286)">
                              <path id="Icon_material-delete" data-name="Icon material-delete" d="M19.368,5.348H16.4L15.553,4.5H11.315l-.848.848H7.5v1.7H19.368Z" transform="translate(966.5 203.214)" fill="rgba(32,39,43,0.77)"/>
                              <path id="Icon_material-delete-2" data-name="Icon material-delete" d="M8.643,19.244a1.7,1.7,0,0,0,1.7,1.7H17.12a1.7,1.7,0,0,0,1.7-1.7V10.071H8.643Z" transform="translate(966.205 202.775)" fill="none" stroke="rgba(32,39,43,0.77)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                            </g>
                            <g id="Group_54758" data-name="Group 54758">
                              <line id="Line_717" data-name="Line 717" y2="6" transform="translate(1235.5 218.5)" fill="none" stroke="rgba(32,39,43,0.77)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                              <line id="Line_718" data-name="Line 718" y2="6" transform="translate(1238.5 218.5)" fill="none" stroke="rgba(32,39,43,0.77)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                            </g>
                          </g>
                        </svg>
                         
                        <span>Delete</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              @endforeach

              

            </div>

            <!-- Deals & Discount start -->
            <div id="dealsdiscount" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>Deals & Discount</h4>
                <a class="btn create-listing-btn" data-bs-toggle="modal" href="#dealsanddis" role="button">Create New Deal</a>
              </div>
              
              <div class="row recently-viewed-box">
                <div class="col-md-3">
                  <div class="form-field">
                    <label>Total Deals</label>
                    <div class="pass-field">
                      <input type="text" class="form-control" value=" {{$total_deals}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-field">
                    <label>On Live</label>
                    <div class="pass-field">
                      <input type="text" class="form-control" value="{{$total_onlive}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-3"><div class="form-field">
                    <label>In Draft</label>
                    <div class="pass-field">
                      <input type="text" class="form-control" value="{{$total_indraft}}" readonly>
                    </div>
                  </div></div>
                <div class="col-md-3">
                  <div class="form-field">
                    <label>For Admin Approval</label>
                    <div class="pass-field">
                      <input type="text" class="form-control" value="{{$total_foradmin}}" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Add listing -->
              <div class="ceate-listing-popup">
                <div class="modal fade" id="dealsanddis" aria-hidden="true" aria-labelledby="ceateNewlistingLabel"
                  tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="ceate-listing-content">
                        <div class="title"> 
                          <h5>Describe Your Deal</h5>

                        <p>This is your chance to impress potential customers with what this listing offers and why you’re the best person for the task.</p>
                        </div>
                        
                        
                        <form id="dealsdis" method="POST" action="{{url('create-new-deal/'.$edit_provider->id)}}" enctype="multipart/form-data">
                          @csrf
                          <!-- <div class="form-field">
                            <label>Category</label>
                            <select name="deal_cat_id" class="form-control">
                              <option>Select Category</option>
                              @foreach($all_categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              
                              @endforeach
                            </select>
                          </div> -->

                          <div class="form-field">
                            
                            <div class="form-field mb-0">
                              <label>Select category</label>
                            </div>
                            <select name="" class="js-example-basic-single form-control form-select"  id="select_cat" style="border: 1.3px solid #D4D4D8!important;">
                              <option>Select Category</option>
                              @foreach($categories as $categories_value)
                              <option value="{{$categories_value->id}}">{{$categories_value->name}}</option>
                              @endforeach
                            </select>
                          </div>

                          <div id="display_sub"></div>






                          
                          


                          

                          <div class="form-field">
                            <label>Title</label>
    
                            <input type="text" name="deal_title" id="deal_title" class="form-control" placeholder="e.g. Family and Newborn Photography">
                            <span style="color: red"> @error('card_number'){{$deal_title}}@enderror</span>
                          </div>

                          <div class="form-field">
                            <label>Description</label>
    
                            <textarea class="form-control" name="deal_desc" id="deal_desc" placeholder="Describe here"></textarea>
                            <span style="color: red"> @error('card_number'){{$list_text}}@enderror</span>
                          </div>

                          <div class="form-field">
                            <div class="row">
                              
                              
                              <div class="col-md-12">
                                <label>Deal Expiry</label>
                                
                                <input type="date" name="deal_expiry" id="deal_expiry" class="form-control date-field valid success-alert" placeholder="e.g. Family and Newborn Photography">
                                <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                              </div>
                            </div>
                          </div>                          

                          <div class="form-field">
                            <label>Detail Highlight</label>
    
                            <input type="text" name="detail_highlight" id="detail_highlight" class="form-control" placeholder="e.g. Family and Newborn Photography">
                            <span style="color: red"> @error('card_number'){{$detail_highlight}}@enderror</span>
                          </div>

                          <div class="form-field">
                            <label>About Detail</label>
    
                            <textarea class="ckeditor form-control" name="detail_about" id="detail_about" placeholder="Describe here"></textarea>
                            <span style="color: red"> @error('card_number'){{$detail_about}}@enderror</span>
                          </div>
                          <div class="row mb-1">
                            <div class="col-md-12">
                              <div class="col-md-2 mt-1" style="float: left;">
                                <label></label>
                                  <button class="btn btn-success add_item_btn">Add</button>
                                </div>
                            </div>
                          </div>
                          <div id="deal_detail" class="form-field">

                            <div class="row">
                              <div class="col-md-12" style="float: left;">
                                <div class="col-md-12" style="float: left;">
                                  <input type="text" name="offer_title[]" id="offer_title" class="form-control" placeholder="Offer Title" required>
                                  <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
                                </div>
                                <div class="col-md-12 mt-1" style="float: left;">
                                  <input type="text" name="offer_price[]" id="offer_price" class="form-control offerpri" placeholder="Regular Price" required>
                                  <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
                                </div>
                                <div class="col-md-12 mt-1" style="float: left;">
                                  <input type="text" name="offer_discount[]" id="offer_discount" class="form-control offerdis" placeholder="Offer Dicount in %" required>
                                  <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                                </div>
                              </div>
                              <div class="col-md-12 mt-1">

                                <div class="col-md-12 mt-1" style="float: left;">
                                  <input type="text" name="" id="userpay" class="form-control com " placeholder="The customer pays" readonly>
                                  <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                                </div>
                                <div class="col-md-12 mt-1" style="float: left;">
                                  <input type="text" name="" id="com" class="form-control com " placeholder="Ahlookin Receives" readonly>
                                  <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                                </div>
                                <div class="col-md-12 mt-1" style="float: left;">
                                  <input type="text" name="" id="provider_com" class="form-control provider_com " placeholder="You will receive" readonly>
                                  <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                                </div>

                               
                              </div>
                            </div>

                          </div>

                          <div class="form-field">
                            <label>Add Image</label>
                            <p>This will be reflect in Deal & Discount list page</p>
                            <div class="upload-box col-md-12">
                              <div class="col-md-6">
                                <label class="upload-btn" style="width:50%!important; float:left">
                                <p><i class="fa-solid fa-plus"></i></p>
                                <!-- <input type="file" name="deal_image" id="deal_image" class="upload-inputfile"> -->
                                <input accept="image/*" name="deal_image" type='file' id="imgInp" />
                                </label>
                              </div>
                              <div class="col-md-6">
                                <label class="upload-btn" style="width:50%!important; border: none; float:left; display:none" id="hideimg">
                                <!-- <img id="output"/> -->
                                <img id="blah" src="#"  style="height:100%; width:auto" />
                               </label>
                              </div>

                            </div>
                            
                          </div>

                          <!-- Multiple Image -->

<div class="col-md-12">
<div class="form-field business-detail" style="margin-bottom: 10px; padding-bottom: 10px;">
  <div class="wrap_bg task-detail" style="padding:0px!important; margin:0px!important ; width:100%">
          <div class="check-box-listMain" id="hi">
            <div class="demo_work" style="margin-top:100px">
              <div class="form-field mb-0">
                <label style="text-align:left">Would you like to add pictures?</label>
              </div>
              <div class="upload__box" >
                <div class="upload__img-wrap">
                  <div class="upload__btn-box">
                    <label class="upload__btn upload-box-bg">
                      <p class="plus-circle">
                        <svg viewBox="0 0 31 31">
                          <g id="Group_54735" data-name="Group 54735" transform="translate(-518.292 -314.292)">
                            <circle id="Ellipse_676" data-name="Ellipse 676" cx="14.5" cy="14.5" r="14.5" transform="translate(519.292 315.292)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-width="2" />
                            <g id="Group_41342" data-name="Group 41342" transform="translate(526.216 322.215)">
                              <line id="Line_239" data-name="Line 239" y2="14.907" transform="translate(7.335 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-width="2" />
                              <line id="Line_240" data-name="Line 240" y2="14.67" transform="translate(14.67 7.453) rotate(90)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-width="2" />
                            </g>
                          </g>
                        </svg>
                      </p>
                      <input type="file" multiple="" data-max_length="20" name="details_images[]" id="task_image" class="upload__inputfile">
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div></div>
                          <!-- Multiple Image End -->

                          <!-- <div class="form-field">
                            <label>Add Details Images</label>

                            <p>This is the first image potential customers see when viewing your listing</p>

                            <div class="upload-box">
                              <label class="upload-btn">
                                <p><i class="fa-solid fa-plus"></i></p>
                                <input type="file" multiple="multiple" name="details_images[]" data-max_length="20" class="upload__inputfile">
                              </label>
                            </div>
                            
                          </div> -->
                          <div class="form-field" style="margin-bottom: 10px;">
                            <div class="late_check">
                              <div class="checkBox">
                                <label for="Money">
                                  <input type="checkbox" id="Money" name="drafts_status" value="1" ><span></span> Save in drafts
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-field">
                            <div class="late_check">
                            <div class="checkBox">
                              <label for="Money">
                                <input type="checkbox" id="Money" name="tcdeal" value="1" checked><span></span> I Agree to the <span>Terms of Service</span></label>@if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                                
                            </div>
                          </div>
                          </div>


                          <div class="create-btn">
                            <a href="#" class="btn gray-br-btn" data-bs-dismiss="modal">Cancel</a>
                            <!-- <a href="#" class="btn btn-primary">Save</a> -->
                            <button class="btn btn-primary">Save</button>
                          </div>
                        </form>

                      </div>
          
                    </div>
                  </div>
                </div>
              </div>
              <!-- End add listing -->

              <section class="deals-discount">
                <div class="container">
                  <div class="deals-discount-wrppar">
                    <div class="right-content-col w-100 pl-0">
                    @foreach($all_deals as $all_deal)

                    @php
                    $offertitle = $all_deal->offer_title;
                    $offerprice = $all_deal->offer_price;
                    $offerdiscount = $all_deal->offer_discount;

                    
                    $offer_title = json_decode($offertitle, true);
                    $offer_price = json_decode($offerprice, true);
                    $offer_discount = json_decode($offerdiscount, true);
                    
                    @endphp
                    
                    <div class="recently-viewed-box">
                      <figure style="background-image: url('{{asset('uploads/deals/'.$all_deal->deal_image)}}');"></figure>
                      <div class="recent-view-cnt">
                        <h6>{{$all_deal->deal_title}}</h6>
                        <div class="rating-wrapper">5.0
                          <ul>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                          </ul>
                        2 Ratings
                      </div>
                      <div class="discount-price">
                        @if(isset($all_deal->deal_title))
                        <h6>{{$offer_title[0]}}</h6>
                        <del>${{$offer_price[0]}}</del>
                        <span>${{$offer_price[0]-$offer_price[0]*$offer_discount[0]/100}}</span>
                        <small>{{$offer_discount[0]}}% Off</small>
                        @else
                        <span>${{$offer_price[0]}}</span>
                        @endif
                      </div>
                      <p>{{$all_deal->deal_description}}</p>
                       @if(isset($all_deal->deal_expiry))
                      <p>Expiry Date <span class="exp-date">{{date('d-M-y',(strtotime($all_deal->deal_expiry)))}}</span></p>
                      @endif
                      <a class="btn" href="{{url('deal-detail/'.$all_deal->id)}}"> View Deal </a>
                      @if($all_deal->drafts_status == 1)
                      <a class="btn" style="color:red" href="#"> In Draft </a>
                      @elseif($all_deal->drafts_status == 0 && $all_deal->deal_status == 1 )
                      <a class="btn" style="color:red" href="#"> Wating For Admin Approval </a>
                      @else
                      <a class="btn" style="color:green" href="#"> On Live </a>
                      @endif
                    </div>
                  </div>
                  @endforeach

                  
              </div>
            </div>
          </div>
        </section>
      </div>

            <!-- Deals & Discount end -->

            <div id="PaymentBillingDetails" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>Payment & Billing Details</h4>
              </div>

              <div class="Box-max-wirth PaymentBillDetails">
                <h5 class="profile-text">Payment method</h5>

                <form id="pro_pay" method="POST" action="{{url('pro-payment-details/'.$edit_provider->id)}}">
                  @csrf
                  <div class="payment-method-box">
                    <div class="payment-method">
                      <div class="payment-method-row">
                        
                        <div class="check-box-radius">
                          <label>
                            <input type="radio" checked>
                            <span></span>
                            <div class="card-text">Credit/Debit Card</div>
        
                          </label>
                        </div>

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
                            <input type="number" class="form-control" placeholder="XXXX XXXX XXXX XXXX" name="pro_card_no" id="pro_card_no">
                            
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-field">
                            <label>CVV Code</label>
                            <input type="number" class="form-control CVV-Code" placeholder="123" name="pro_cvv" id="pro_cvv">
                            <span style="color: red"> @error('pro_cvv'){{$message}}@enderror</span>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-field">
                            <label>Expiry date</label>
                            <input type="date" class="form-control text-upc" placeholder="MM/YYYY" name="pro_expiry" id="pro_expiry">
                            <span style="color: red"> @error('pro_expiry'){{$message}}@enderror</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <h5>Bank Detail</h5>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Bank name *</label>
                        <input type="text" class="form-control" placeholder="Bank name" name="pro_bank_name" id="pro_bank_name">
                        <span style="color: red"> @error('pro_bank_name'){{$message}}@enderror</span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Account name *</label>
                        <input type="text" class="form-control" placeholder="Account name" name="pro_account_name" id="pro_account_name">
                        <span style="color: red"> @error('pro_account_name'){{$message}}@enderror</span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Account number *</label>
                        <input type="text" class="form-control" placeholder="e.g. 1234567890" name="pro_account_no" id="pro_account_no">
                        <span style="color: red"> @error('pro_account_no'){{$message}}@enderror</span>
                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Branch code *</label>
                        <input type="text" class="form-control" placeholder="e.g. 1234567890" name="pro_branch_code" id="pro_branch_code">
                        <span style="color: red"> @error('pro_branch_code'){{$message}}@enderror</span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field mb-0">
                        <label>Account type</label>

                        <select class="form-control form-select" name="pro_account_type" id="pro_account_type">
                          <option>Savings</option>
                          <option>Savings</option>
                          <option>Savings</option>
                        </select>
                        <span style="color: red"> @error('pro_account_type'){{$message}}@enderror</span>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="form-field ">
                        <label>Any additional information type below in text box</label>

                        <textarea rows="3" placeholder="Write your information" name="pro_additional_information" id="pro_additional_information"></textarea>
                      </div>
                    </div>


                    <div class="billing-Address">
                      <h5>Billing Address</h5>

                      <div class="check-box">
                        <input type="checkbox" id="saveinfo" name="saveinfo">
                        <label for="Saveinfo">Same as business location</label>
                      </div>
                    </div>

                    <div class="col-md-12 show_hide1">
                      <div class="form-field">
                        <label>Street Address *</label>
                        <input type="text" class="form-control" placeholder="Street address" name="pro_street_address" id="pro_street_address">
                        <span style="color: red"> @error('pro_street_address'){{$message}}@enderror</span>
                      </div>
                    </div>

                    <div class="col-md-12 show_hide1">
                      <div class="form-field">
                        <label>Address Line 2</label>
                        <input type="text" class="form-control" placeholder="Address line 2" name="pro_address_line2" id="pro_address_line2">
                      </div>
                    </div>

                    <div class="col-md-6 show_hide">
                      <div class="form-field">
                        <label>City or Town *</label>
                        <input type="text" class="form-control" placeholder="City or Town" name="pro_city" id="pro_city">
                        <span style="color: red"> @error('pro_city'){{$message}}@enderror</span>
                      </div>
                    </div>


                    <div class="col-md-6 show_hide">
                      <div class="form-field">
                        <label>ZIP or Postcode</label>
                        <input type="text" class="form-control" placeholder="170505" name="pro_zip" id="pro_zip">
                        <span style="color: red"> @error('pro_zip'){{$message}}@enderror</span>
                      </div>
                    </div>

                    <div class="col-md-6 show_hide">
                      <div class="form-field mb-0">
                        <label>State or Province</label>
                        <input type="text" class="form-control" placeholder="State or Province" name="pro_state" id="pro_state">
                        <span style="color: red"> @error('pro_state'){{$message}}@enderror</span>
                      </div>
                    </div>


                    <div class="col-md-6 show_hide">
                      <div class="form-field mb-0">
                        <label>Country *</label>

                        <input type="text" class="form-control" placeholder="Country" name="pro_country" id="pro_country">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="bottom-ud-btn">
                        <a class="btn gray-br-btn" href="#">Cancel</a>
                        <button type="submit" class="btn">Update Info</button>
                      </div>
                    </div>


                  </div>
                </form>
              </div>


            </div>
 
            <div id="BusinessProfile" class="profile-contentBox">
              <div class="user-profile-title border-0">
                <h4>Business Profile</h4>
                <!-- <a class="btn" href="#">+ Add New Business</a> -->
              </div>
              <div class="BusinessProfile-row">
                <div class="BusinessProfile-about-info">
                  <figure>
                    <img src="{{asset('uploads/provider/'.$edit_provider->id.'/business_profile/'.$edit_provider->image)}}" alt="">
                  </figure>
                  <div class="BusinessProfile-about">
                    <h5>{{ucfirst($business_profile->business_name)}}</h5>
                    <div class="ratings"><span>{{$business_profile->loc_city}}</span></div>
                    <a class="link-text" href="#">Get Customer Reviews</a><br>
                    <a class="link-text" href="{{url('provider-profile-customer/'.$edit_provider->id)}}">View Profile as Customer</a>
                  </div>
                </div>
                <div class="right-view">
                  <div class="ratings-star"><i class="fa-solid fa-star"></i> {{$average_rating}}</div>
                  <div class="ratings">{{$count_review}} reviews</div>
                  <div class="verified-main">
                    <div class="verified"><i class="fa-solid fa-circle-check"></i> Verified</div>
                    <a class="btn" href="{{url('edit-business-profile/'.$edit_provider->id)}}">Edit Business Profile</a>
                  </div>
                </div>
              </div>

              <div class="profile-strenght">
                <div class="profile-strenghtrow">
                  <div class="profile-strenght-left">
                    <p>PROFILE STRENGTH: </p>
                  </div>
                  <div class="profile-strenght-right">
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45"
                        aria-valuemin="0" aria-valuemax="100">45%</div>
                    </div>
                  </div>
                </div>
                <div class="profile-strenghtrow">
                  <div class="profile-strenght-left">
                    <p>TIPS:</p>
                  </div>
                  <div class="profile-strenght-right">
                    <div class="upload-reviews">
                      <p>Upload 5+ photos of your work Get 5+ reviews</p>

                      <a class="link-text" href="#">Improve Your Business Profile</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="ChangePassword" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>Change Password</h4>
              </div>
              <div class="Box-max-wirth">
                <form id="change_pass" method="POST" action="{{url('provider-change-pass/'.$edit_provider->id)}}">
                  @csrf


                  <div class="col-md-12">
                    <div class="form-field">
                      <label>New Password *</label>

                      <div class="pass-field">
                        <input type="password" id="pro_newpass" name="pro_newpass" class="form-control"
                          placeholder="*****************">
                        <span toggle="#password-field2" class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                        <span style="color: red"> @error('pro_newpass'){{$message}}@enderror</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Confirm New Password *</label>

                      <div class="pass-field">
                        <input id="pro_conpass" name="pro_conpass" type="password" class="form-control"
                          placeholder="*****************">
                        <span toggle="#password-field3" class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                        <span style="color: red"> @error('pro_conpass'){{$message}}@enderror</span>
                      </div>
                    </div>
                  </div>

                  <div class="bottom-ud-btn">
                    <!-- <a class="btn" href="#">Change Password</a> -->
                    <button class="btn">Change Password</button>
                  </div>
                </form>
              </div>

            </div>

            <!-- Social Media Start -->
            <div id="SocialMedia" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>Social Media</h4>
              </div>

              <div class="Box-max-wirth">
                <form id="change_pass" method="POST" action="{{url('provider-socialmedia/'.$edit_provider->id)}}">
                  @csrf
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Add your social media profiles to boost your brand's credibility. </label>
                      
                      
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Facebook</label>
                      <div class="pass-field">
                        @if(isset($social_link))
                        <input type="text" class="form-control" value="{{$social_link->facebook_link}}">
                        @else 
                        <input type="text" name="facebook" class="form-control">
                        @endif                       
                      </div>
                      @if($errors->has('facebook'))
                        <div class="error">{{ $errors->first('facebook') }}</div>
                      @endif
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Instagram</label>
                      <div class="pass-field">
                        @if(isset($social_link))
                        <input type="text" class="form-control" value="{{$social_link->instagram_link}}">
                        @else 
                        <input type="text" name="instagram" class="form-control">
                        @endif
                        @if($errors->has('instagram'))
                        <div class="error">{{ $errors->first('instagram') }}</div>
                        @endif 
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Tiktok</label>
                      <div class="pass-field">
                        @if(isset($social_link))
                        <input type="text" class="form-control" value="{{$social_link->tiktok_link}}">
                        @else 
                        <input type="text" name="tiktok" class="form-control">
                        @endif
                        @if($errors->has('tiktok'))
                        <div class="error">{{ $errors->first('tiktok') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <!-- <div class="col-md-12">
                    <div class="form-field">
                      <label>YouTube</label>
                      <div class="pass-field">
                        @if(isset($social_link))
                        <input type="text" class="form-control" value="{{$social_link->youtube_link}}">
                        @else 
                        <input type="text" name="youtube" class="form-control">
                        @endif
                        @if($errors->has('youtube'))
                        <div class="error">{{ $errors->first('youtube') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Snapchat</label>
                      <div class="pass-field">
                        @if(isset($social_link))
                        <input type="text" class="form-control" value="{{$social_link->snapchat_link}}">
                        @else 
                        <input type="text" name="snapchat" class="form-control">
                        @endif
                        @if($errors->has('snapchat'))
                        <div class="error">{{ $errors->first('snapchat') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Pinterest</label>
                      <div class="pass-field">
                        @if(isset($social_link))
                        <input type="text" class="form-control" value="{{$social_link->pinterest_link}}">
                        @else 
                        <input type="text" name="pinterest" class="form-control">
                        @endif
                        @if($errors->has('pinterest'))
                        <div class="error">{{ $errors->first('pinterest') }}</div>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-field">
                      <label> Twitter</label>
                      <div class="pass-field">
                        @if(isset($social_link))
                        <input type="text" class="form-control" value="{{$social_link->twitter_link}}">
                        @else 
                        <input type="text" name="twitter" class="form-control">
                        @endif
                        @if($errors->has('twitter'))
                        <div class="error">{{ $errors->first('twitter') }}</div>
                        @endif                 
                      </div>
                    </div>
                  </div> -->

                  

                  

                  <div class="bottom-ud-btn">
                    <!-- <a class="btn" href="#">Change Password</a> -->
                    <button class="btn">Update</button>
                  </div>
                </form>
              </div>

            </div>
            <!-- Social Media Start -->


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
                    <h5>Dear {{Auth::user()->name}}, You have a new lead </h5>
                    <p>User name - {{$decode['name'].' '.$decode['lname']}}</p>
                    <p>Budute - ${{$decode['quote_amount']}}</p>
                    <p>Category - {{$decode['category']}}</p>
                  </div>
                </div>

                <div class="notif-all-right-view">
                 <p></p>
                </div>
              </div>
              @endif
              @endforeach
            </div>

            <!-- About Leads Start -->
            <div id="Leads" class="profile-contentBox">
              <div class="user-profile-title">
                <h4>About Leads</h4>
              </div>
              <?php
              $total_leads = sprintf("%02d", $about_leads);
              $unopen_lead = sprintf("%02d", $about_leads-$un_open);
              ?>
              <div class="Box-max-wirth">
                <div class="col-md-12">
                  <div class="form-field">
                    <label>Total Leads</label>
                    <div class="pass-field">
                      <input type="text" class="form-control" value="Total number of leads - {{$total_leads}}" readonly>
                    </div>
                  </div>
                </div>
                

                  <div class="col-md-12 mt-3">
                    <div class="form-field">
                      <label>Un-opened Leads </label>
                      <div class="pass-field">
                        <input type="text" class="form-control" value="Total un-opened leads - {{$unopen_lead}}" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mt-3">
                    <div class="form-field">
                      <div class="pass-field">
                        <a class="link-text" href="#">More Information About Leads</a>
                      </div>
                    </div>
                  </div>

                  

                  
                
              </div>

            </div>
            <!-- About Leads End -->


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
                <form id="pro_referral_bonus" method="POST" action="{{url('pro-ref-bonus')}}">
                  @csrf
                  <div class="form-field">
                    <label>Enter email address(es)</label>
                    <input type="email" name="pro_refemail" id="pro_refemail" class="form-control" placeholder="Separate each email address with a comma.">
                  </div>

                  <div class="form-field">
                    <label>Subject</label>
                    <input type="text" name="pro_refsub" id="pro_refsub" class="form-control" placeholder="Praveen Solanki wants you to join BlueBis">
                  </div>

                  <div class="form-field">
                    <label>Message</label>

                    <textarea class="form-control" name="refmessage" id="refmessage" placeholder="Robin Rathore thinks that Bluebis would be a great way for you to find new customers.
                    
 When you sign up and become active on Bluebis , we’ll give you 5 free credits to get started. Use our PROMO CODE “STARTUP-0217” to claim your free credits.

 How Bluebis works

Customers tell us about their needs and we send you for free the details of their quote requests. When a request matches your service category, and if you’re interested, you can pay to view the customer details with Bluebis credits and send your quote. If you’re hired, finalize the job details and start working with your new customer.


Connecting with the right customers has never been simpler


- The Bluebis Team on behalf of Robin Rathore"></textarea>
                  </div>

                  <p>Note: Each person will receive a separate email. This is not a group email.</p>

                  <div class="bottom-ud-btn">
                    <a class="btn gray-br-btn" href="#">Cancel</a>
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

@include("provider.modals")
@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>
<!-- Script for crete new liting -->
<script>
$(document).ready(function() {
  $("#createlist").validate({
    errorClass: "error text-danger",
    validClass: "valid success-alert",
    rules: {
      title: "required",
      list_text: "required",
    },
    
  });
});
</script>
<script>
$(document).ready(function() {
  $("#dealsdis").validate({
    errorClass: "error text-danger",
    validClass: "valid success-alert",
    rules: {
      deal_title: "required",
      deal_desc: "required",
      deal_mrp: "required",
      offer_title: "required",
      tcdeal: "required",
      },
    });
});
</script>
<script>
$(document).ready(function() {
  $("#edit_list").validate({
    errorClass: "error text-danger",
    validClass: "valid success-alert",
    rules: {
      title: {
          required: true,
          lettersonly: true,
        },
      list_text: "required",
    },
    
  });
});
</script>

<!-- Script for change password -->
<script>
$(document).ready(function() {
  $("#change_pass").validate({
    errorClass: "error text-danger",
    validClass: "valid success-alert",
    rules: {
        pro_newpass: "required",
        pro_conpass: {
          required: true,
          equalTo : "#pro_newpass",
        },
      },
    });
});
</script>
<!-- End script for change password -->

<!-- Script for billing details -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false&key=AIzaSyCtZNVT318F-HYweBrZWJBM5k0KgSiMDKc"></script>

<!-- End Script for registration --> 
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('pro_street_address'));
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
                        document.getElementById('pro_country').value = country;
                        document.getElementById('pro_state').value = state;
                        document.getElementById('pro_city').value = city;
                        document.getElementById('pro_zip').value = pin;
                    }
                }
            });
        });
    });
</script>
<script>
  $('#pro_street_address').keyup(function() {
  
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

<script>
$(document).ready(function() {
  $("#pro_pay").validate({
    errorClass: "error text-danger",
    validClass: "valid success-alert",
    rules: {
        pro_card_no: "required",
        pro_cvv: "required",
        pro_expiry: "required",
        pro_bank_name: "required",
        pro_account_name: "required",
        pro_account_no: "required",
        pro_branch_code: "required",
        
        pro_city: "required",
        
      },
    });
});
</script>

<!-- End script for billing details -->

<!-- Start for  REferal Bonus -->
<script>
  $(document).ready(function() {
    $("#pro_referral_bonus").validate({
      errorClass: "error text-danger",
      validClass: "valid success-alert",
      rules: {
        pro_refemail: "required",
        pro_refsub: "required",
      },        
      messages: {
            pro_refemail: "Email required",
            pro_refsub: "Subject required",            
        },
    });
  });
</script>
<!-- end for  REferal Bonus -->

<!-- Start for  Edit profile -->
<script>
  $(document).ready(function() {
    $("#pro_edit").validate({
      errorClass: "error text-danger",
      validClass: "valid success-alert",
      rules: {
        name: {
          required: true,
           lettersonly: true,
           nowhitespace: true,           
        },
        lastname: {
          lettersonly: true,
          nowhitespace: true,           
        },
        number: {
          required: true,
          maxlength: 12,
          minlength: 10,           
        },
      },        
      
    });
  });
</script>
<!-- end for  REferal Bonus -->

<script>
  $(document).ready(function(){
    $(".add_item_btn").click(function(e){
      e.preventDefault();
      $("#deal_detail").prepend(`<div class="row mb-4" >
      
        <div class="col-md-12 mt-1" >
        <input type="text" name="offer_title[]" id="offer_title" class="form-control" placeholder="Offer title" required>
        <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
        </div>

        <div class="col-md-12 mt-1" >
          <input type="text" name="offer_price[]" id="offer_price" class="form-control offerpri" placeholder="Offer price" required>
          <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
        </div>
        <div class="col-md-12 mt-1" >
          <input type="text" name="offer_discount[]" id="offer_discount" class="form-control offerdis" placeholder="Offer Dicount in %" required>
          <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
        </div>
      
        <div class="col-md-12 mt-1" >
          <input type="text" name="" id="userpay" class="form-control com" placeholder="The user pays" readonly>
          <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
        </div>

        <div class="col-md-12 mt-1" s>
          <input type="text" name="" id="com" class="form-control com" placeholder="Ahlookin Receives" readonly>
          <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
        </div>

        <div class="col-md-12 mt-1" >
        <input type="text" name="" id="provider_com" class="form-control provider_com" placeholder="You will receive" readonly>
        <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
        </div>

        
        <div class="col-md-2 mt-1" >
          <button class="btn btn-danger remove_item_btn">Remove</button>
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

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
<!-- Deal and Disscount section start -->
<script type="text/javascript">
  $("body").on("blur",".offerpri",function(){
    var offerpri = $(this).val();
  });
  
 
 $("body").on("blur",".offerdis",function(){
    
    var offerpri = $(".offerpri").val();

    var offerdis = $(this).val();

    //var providerget = offerpri-offerpri*offerdis/100
    var admi = offerpri-offerpri*offerdis/100

    var adminget = admi*20/100

    var provider_com = admi-admi*20/100
    
    $("#userpay").val("$"+admi+" - The user pays");
    $("#com").val("$"+adminget+" - Ahlookin Receives");
    $("#provider_com").val("$"+provider_com+" - You will receive");userpay
    
  });
 imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
<script>
    $(document).ready(function() {
      

      $("#imgInp").change(function () {
        var fileName = $(this).val();
        //alert(fileName)
        if (fileName != "") {
            $("#hideimg").css('display','block');
        }
    });





    });
</script>

<script>
    $(document).ready(function() {
        $('#category-drop').keyup(function() {
          
            var category_id = this.value;
            $.ajax({
                url: "/get-subcat_list",
                type: "GET",
                data: {
                    category_id: category_id
                },
                 
                cache: false,
                success: function(outputsub){
                  //alert(dataa)
                  if(outputsub.rrr){
                    $("#hidesub").hide();
                    $("#test_sub").hide();
                    $("#tutu").html("Select valid category");
                    $("#subcategory_label").hide();
                    $("#save_sub_cat").prop("disabled", true);
                    $(".title").css('margin-bottom',' ');
                  }else{
                    $("#tutu").hide();
                  }
                  $("#kd").html(outputsub)
                  if($("#kd").html(outputsub))
                  {
                    $("#hidesub").hide();
                  }
                }
            });
        });
    });   

    </script>
    

    <script>
      $("body").on("change","#cars",function(){
         var category_id = this.value;
          
        $.ajax({
                url: "/get-subcat_list",
                type: "GET",
                data: {
                    category_id: category_id
                },
                 
                cache: false,
                success: function(output_edit){
                  //alert(dataa)
                  $("#kdedit").html(output_edit)
                  if($("#kdedit").html(output_edit))
                  {
                    $("#hidesubedit").hide();
                  }
                }
            });
      })
   
  </script>
  <script>
      $("body").on("change","#select_cat",function(){
         var catego = this.value;
         
         
          
        $.ajax({
                url: "/get-sub",
                type: "GET",
                data: {
                    catego: catego
                },
                 
                cache: false,
                success: function(outputsub){
                  //alert(dataa)
                  $("#display_sub").html(outputsub)
                  
                }
            });
      })
   
  </script>
<script>
  $(document).ready(function() {
    $('input[type="file"]').change(function(e) {
      var geekss = e.target.files[0].name;
      $("#select_profile_image").text(geekss);
    });
  });

  $(document).ready(function() {
    $('.js-example-basic-single').select2({
    dropdownParent: $("#dealsanddis")
  });
});
</script>


<!-- Deal and Disscount section end -->





