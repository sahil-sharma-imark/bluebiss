@include('layouts.header')




<main id="main" class="bg-color-gray">


    <section class="business-detail task-detail-sec">
      <div class="container">
        <form id="stepForm"  enctype="multipart/form-data" method="POST" action="/business-details">
            @csrf
          <div class="main_wrap">
            <div class="bus-det-left active">
              <h5>Create your Business</h5>
              <div class="close-btn">
                <a href="{{url('/')}}">
                  <img src="images/close-icon.svg"  alt="close-icon">
                </a>
              </div>
              <ul id="progressbar" class="progressbar-text-bg">
                <li class="active" id="li1">
                  <span></span>
                  <a href="#">Company Type</a>
                </li>
                <li id="li2">
                  <span></span>
                  <a href="#">Business Detail</a>
                </li>
                <li id="li3">
                  <span></span>
                  <a href="#">Description</a>
                </li>
                <li id="li4">
                  <span></span>
                  <a href="#">Location</a>
                </li>
                <li id="li5">
                  <span></span>
                  <a href="#">Verified badge</a>
                </li>
                <li id="li6">
                  <span></span>
                  <a href="#">Upload Images</a>
                </li>
                <!-- <li id="li7">
                  <span></span>
                  <a href="#">Review</a>
                </li> -->
              </ul>
            </div>
            <fieldset id="company_type">
              <div class="wrap_bg">
                <h5 class="small-heading">Do You Practice as a Company or an Individual ?</h5>
                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="company_type" value="1">
                    <span></span>
                    Sole Proprietor

                  </label>
                </div>
                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="company_type" value="2" checked>
                    <span></span>
                    Registered Sole Trader

                  </label>
                </div>
                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="company_type" value="3">
                    <span></span>
                    Registered Partnership

                  </label>
                </div>
                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="company_type" value="4">
                    <span></span>
                    Limited Liability

                  </label>
                </div>
                <div class="check-box-radius">
                  <label>
                    <input type="radio" name="company_type" value="5">
                    <span></span>
                    Other

                  </label>
                </div>
                <!-- <div class="bnt-right"><a class="btn" href="#">Continue</a></div> -->
                <div class="bnt-right">
                  <a class="btn action-button nex">Continue</a>
                </div>   
              </div>
            </fieldset>

            
            <fieldset id="business_detail">
              <div class="wrap_bg">
                <a class="back-arrow previous action-button-previous" href="#">
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
                 <h5 class="small-heading">Business detail</h5>
                <p>We will send you jobs from your neighborhood and nearby areas.</p>
                <h6>Contact Details</h6>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Business Name *</label>
                      <input type="text" class="form-control" name="business_name" id="business_name" placeholder="e.g. Jhon Doe Cleaning">
                      <small>No company name? Use your personal name.</small>
                      <span class="text-danger" id="business_name-error"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>Business Phone Number</label>
                      <input type="number" class="form-control" name="business_number" id="business_number" placeholder="e.g. 9876 543 210">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>Website (optional)</label>
                      <input type="text" class="form-control" name="business_website" id="business_website" placeholder="e.g. example.com">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>Business Email Address</label>
                      <input type="text" class="form-control" name="business_email" id="business_email" placeholder="e.g. example@mail.com">
                    </div>
                  </div>
                </div>
                <hr class="line">
                <h6>General</h6>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Description - Why Should Customers Choose You ?</label>
                      <textarea class="form-control" name="description" id="description" 
                        placeholder="Enter a detailed description of what your business does and its experience"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>Year Business Started</label>
                      <input type="text" class="form-control" name="business_date" id="business_date" placeholder="e.g. 2021">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>No of Employees</label>
                      <input type="text" class="form-control" name="n_employees" id="n_employees" placeholder="No of Employees">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>Licence Number *</label>
                      <input type="text" class="form-control" name="licence_number" id="licence_number" placeholder="e.g. 9876 5421 9875">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>Registration or ID Number *</label>
                      <input type="text" class="form-control" name="reg_id_number" id="reg_id_number" placeholder="e.g. RID123545678">
                    </div>
                  </div>
                </div>
                <hr class="line">
                <div class="row">
                  <div class="form-field pre_hour">
                    <label>Price per hour</label>
                    <div class="group">
                      <span class="rate">$</span>
                      <input type="text" class="form-control" name="price_per_hour" id="price_per_hour" placeholder="15.00">
                      <span class="rate hour">/hour</span>
                    </div>
                  </div>
                </div>
                <hr class="line">
                <h6>Business Hours</h6>
                <div class="row">
                  <div class="col-md-12">
                    <div class="check-box-radius">
                      <label>
                        <input type="radio" name="hours" value="24 x 7">
                        <span></span>
                        Open 24 x 7
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="check-box-radius col_open">
                      <label>
                        <input type="radio" class="radioshow" name="hours" value="has">
                        <span> Has Business Hours</span>
                      </label>
                      <div id="has_hour" class="hours_list" style="display: none;">
                        <table class="table-responsive">
                          <tbody>
                            <tr>
                              <td>
                                <p>Days</p>
                              </td>
                              <td>
                                <p>Opening</p>
                              </td>
                              <td>
                                <p>Closing</p>
                              </td>
                              <td>
                                <p>Closed?</p>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <p>Monday</p>
                              </td>
                              <td>
                                <div class="check_btn">
                                  <label>
                                    <input type="radio" name="radio"><span>08:00</span>
                                  </label>
                                </div>
                              </td>
                              <td><input type="number" class="form-control" placeholder="20:00"></td>
                              <td>
                                <div class="checkBox">
                                  <input type="checkbox" id="Monday" checked>
                                  <label for="Monday"></label>
                                </div>
                              </td>
                            </tr>
                            <!-- Row-Tuesday -->
                            <tr>
                              <td>
                                <p>Tuesday</p>
                              </td>
                              <td>
                                <div class="check_btn">
                                  <label>
                                    <input type="radio" name="radio"><span>08:00</span>
                                  </label>
                                </div>
                              </td>
                              <td><input type="number" class="form-control" placeholder="20:00"></td>
                              <td>
                                <div class="checkBox">
                                  <input type="checkbox" id="Tuesday" checked>
                                  <label for="Tuesday"></label>
                                </div>
                              </td>
                            </tr>
                            <!-- Row-Wednesday -->
                            <tr>
                              <td>
                                <p>Wednesday</p>
                              </td>
                              <td>
                                <div class="check_btn">
                                  <label>
                                    <input type="radio" name="radio" checked><span>08:00</span>
                                  </label>
                                </div>
                              </td>
                              <td><input type="number" class="form-control" placeholder="20:00"></td>
                              <td>
                                <div class="checkBox">
                                  <input type="checkbox" id="Wednesday" checked>
                                  <label for="Wednesday"></label>
                                </div>
                              </td>
                            </tr>
                            <!-- Row-Thursday -->
                            <tr>
                              <td>
                                <p>Thursday</p>
                              </td>
                              <td>
                                <div class="check_btn">
                                  <label>
                                    <input type="radio" name="radio"><span>08:00</span>
                                  </label>
                                </div>
                              </td>
                              <td><input type="number" class="form-control" placeholder="20:00"></td>
                              <td>
                                <div class="checkBox">
                                  <input type="checkbox" id="Thursday">
                                  <label for="Thursday"></label>
                                </div>
                              </td>
                            </tr>
                            <!-- Row-Friday -->
                            <tr>
                              <td>
                                <p>Friday</p>
                              </td>
                              <td>
                                <div class="check_btn">
                                  <label>
                                    <input type="radio" name="radio"><span>08:00</span>
                                  </label>
                                </div>
                              </td>
                              <td><input type="number" class="form-control" placeholder="20:00"></td>
                              <td>
                                <div class="checkBox">
                                  <input type="checkbox" id="Friday">
                                  <label for="Friday"></label>
                                </div>
                              </td>
                            </tr>
                            <!-- Row-Saturday -->
                            <tr>
                              <td>
                                <p>Saturday</p>
                              </td>
                              <td>
                                <div class="check_btn">
                                  <label>
                                    <input type="radio" name="radio"><span>08:00</span>
                                  </label>
                                </div>
                              </td>
                              <td><input type="number" class="form-control" placeholder="20:00"></td>
                              <td>
                                <div class="checkBox">
                                  <input type="checkbox" id="Saturday">
                                  <label for="Saturday"></label>
                                </div>
                              </td>
                            </tr>
                            <!-- Row-Sunday -->
                            <tr>
                              <td>
                                <p>Sunday</p>
                              </td>
                              <td>
                                <div class="check_btn">
                                  <label>
                                    <input type="checkbox" value="1"><span>08:00</span>
                                  </label>
                                </div>
                              </td>
                              <td><input type="number" class="form-control" placeholder="20:00"></td>
                              <td>
                                <div class="checkBox">
                                  <input type="checkbox" id="Sunday">
                                  <label for="Sunday"></label>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="bnt-right">
                  <a class="btn action-button nex">Continue</a>
                </div>
              </div>
            </fieldset>


            <fieldset id="business_description">
              <?php
              $all_category = DB::table('category')->join('sub_category','category.catid','=','sub_category.id')->where('sub_cat_status',0)->where('sub_cat_status',0)->select('category.catid as category_catid','sub_category.name as category_name')->distinct()->orderBy('sub_category.name','asc')->get();
              ?>
              <div class="wrap_bg">
                <a class="back-arrow previous action-button-previous" href="#">
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h5 class="small-heading">Services & Documents</h5>
                <h6>Business Categories & Description</h6>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Services</label>
                      <select class="form-control single_select" name="subject" id="category-dropdown">
                        <option value="">Select Sub category</option>
                        @foreach($all_category as $all_cat)
                        <option value="{{$all_cat->category_name}}">{{$all_cat->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Subcategory/keywords</label>
                    <div id="kdkdk"></div>
                      <input type="text" id="hidesubcat" class="form-control"  
                        placeholder="Select sub category">
                      <small></small>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Description</label>
                      <textarea class="form-control" name="des2" 
                        placeholder="Enter a detailed description of what your business does and its experience"></textarea>
                    </div>
                  </div>
                </div>
                <div class="bnt-right">
                  <a class="btn action-button nex">Continue</a>
                </div>
              </div>
            </fieldset>


            <fieldset  id="location">
              <div class="wrap_bg">
                <a class="back-arrow previous action-button-previous" href="#">
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h5 class="small-heading">What Is Your Location</h5>
                <p>We will send you tasks from your neighborhood and nearby areas.</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-field">
                      <input type="hidden" name="probus_lat" id="probus_lat">
                      <input type="hidden" name="probus_lng" id="probus_lng">
                      <input type="hidden" name="probus_map" id="probus_map">

                      <label>Street Address *</label>
                      <input type="text" class="form-control" name="probus_str_add" id="probus_str_add"  placeholder="Street Address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Address Line 2</label>
                      <input type="text" class="form-control" name="probus_add_lin2" id="probus_add_lin2" placeholder="Address Line 2">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>City or Town *</label>
                      <input type="text" class="form-control" name="probus_city" id="probus_city"  placeholder="City or Town">
                      <!-- <input type="hidden" name="g_lat" id="loc_lat">
                      <input type="hidden" name="g_lng" id="loc_lng"> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>ZIP or Postcode</label>
                      <input type="text" class="form-control" name="probus_zip" id="probus_zip" placeholder="ZIP or Postcode">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>State or Province</label>
                      <input type="text" class="form-control" name="probus_state" id="probus_state" placeholder="State or Province">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-field">
                      <label>Country *</label>
                      <input type="text" class="form-control" name="probus_country" id="probus_country" placeholder="State or Province">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="map">
                      <iframe id="addressmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11281.340245237938!2d103.80746953800983!3d1.441255959610611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da137dc6670017%3A0xf5a30c1b3ae23014!2sCanberra%20Community%20Club!5e0!3m2!1sen!2sin!4v1658294284172!5m2!1sen!2sin" width="100%" height="472" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">            
                      </iframe>
                      <!-- <iframe id="map" width="100%" height="472"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr class="line">
                    <h5>Radius for Service Area in KM</h5>
                    <div class="form-field">
                      <label>Set the radius from your city which covers your service area, we'll only send you customer
                        requests within this coverage.</label>
                      <select class="form-control form-select" name="loc_radius" id="loc_radius">

                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                        <option>25</option>
                        <option>30</option>
                        <option>35</option>
                        <option>40</option>
                        <option>45</option>
                        <option>50</option>
                        <option>60</option>
                        <option>70</option>
                        <option>80</option>
                        <option>90</option>
                        <option>100</option>
                        <option>150</option>
                        <option>200</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- <div class="bnt-right"><a class="btn" href="#">Continue</a></div> -->
                <div class="bnt-right">
                  <a class="btn action-button nex">Continue</a>
                </div>
              </div>
            </fieldset>


            <fieldset id="verified_badge">
              <div class="wrap_bg">
                <a class="back-arrow previous action-button-previous" href="#">
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h5 class="small-heading">Earn a verified badge</h5>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Guarantee Checkbox</label>
                      <div class="late_check">
                        <div class="checkBox">

                          <label for="Show">
                            <input type="checkbox" id="Show" name="reimbursement" value="1" checked><span></span>No - Show
                            Reimbursement</label>
                        </div>
                        <div class="checkBox">

                          <label for="Late">
                            <input type="checkbox" id="Late" name="late_fee" value="1" checked><span></span>Late- Fee</label>
                        </div>
                        <div class="checkBox">
                          <label for="Money">
                            <input type="checkbox" id="Money" name="money_back" value="1" checked><span></span>Money Back</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-field">
                      <label>Are Your Services Insured?</label>
                      <div class="late_radio">
                        <div class="check-box-radius">
                          <label>
                            <input type="radio" name="services_insured" value="1" checked>
                            <span>Yes</span>
                          </label>
                        </div>
                        <div class="check-box-radius">
                          <label>
                            <input type="radio" name="services_insured" value="2">
                            <span>No</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <h6 class="badge_icon">Credentials - Upload to earn a verified badge
                      <svg xmlns="http://www.w3.org/2000/svg" width="13" height="18" viewBox="0 0 13.594 18">
                        <g id="badge" transform="translate(-0.002 0)">
                          <path id="Path_24108" data-name="Path 24108"
                            d="M14.33,367.169a2.165,2.165,0,0,1-2.486-.9,2.169,2.169,0,0,1-1.3-.5q-.07-.059-.134-.122L9.231,368.1a.534.534,0,0,0,.6.751l2.357-.534,1.065,2.17a.534.534,0,0,0,.479.3h0a.534.534,0,0,0,.479-.3l1.367-2.86a2.17,2.17,0,0,1-1.251-.45Zm0,0"
                            transform="translate(-8.855 -352.783)" fill="#47c085" />
                          <path id="Path_24109" data-name="Path 24109"
                            d="M200.418,365.759a4.551,4.551,0,0,0-2.392,1.381,2.169,2.169,0,0,1-1.4.029,2.17,2.17,0,0,1-1.251.45l1.367,2.86a.534.534,0,0,0,.479.3h0a.534.534,0,0,0,.479-.3l1.065-2.17,2.357.534a.534.534,0,0,0,.6-.751l-1.176-2.461Q200.488,365.7,200.418,365.759Zm0,0"
                            transform="translate(-188.508 -352.783)" fill="#47c085" />
                          <path id="Path_24110" data-name="Path 24110"
                            d="M13.362,6.556a1.1,1.1,0,0,0-.283-1.607.534.534,0,0,1-.225-.618,1.1,1.1,0,0,0-.816-1.414.534.534,0,0,1-.423-.5,1.1,1.1,0,0,0-1.25-1.049A.534.534,0,0,1,9.8,1.036,1.1,1.1,0,0,0,8.262.477.534.534,0,0,1,7.614.363a1.1,1.1,0,0,0-1.632,0,.534.534,0,0,1-.648.114A1.1,1.1,0,0,0,3.8,1.036a.534.534,0,0,1-.569.329,1.1,1.1,0,0,0-1.25,1.049.534.534,0,0,1-.423.5A1.1,1.1,0,0,0,.743,4.33a.534.534,0,0,1-.225.618A1.1,1.1,0,0,0,.235,6.556a.534.534,0,0,1,0,.657A1.1,1.1,0,0,0,.518,8.82a.534.534,0,0,1,.225.618,1.1,1.1,0,0,0,.816,1.414.534.534,0,0,1,.423.5A1.1,1.1,0,0,0,3.232,12.4a.534.534,0,0,1,.569.329,1.1,1.1,0,0,0,1.534.558.534.534,0,0,1,.647.114,1.1,1.1,0,0,0,1.632,0,.534.534,0,0,1,.647-.114A1.1,1.1,0,0,0,9.8,12.733a.534.534,0,0,1,.569-.329,1.1,1.1,0,0,0,1.25-1.049.534.534,0,0,1,.422-.5,1.1,1.1,0,0,0,.816-1.414.534.534,0,0,1,.225-.618,1.1,1.1,0,0,0,.283-1.607.534.534,0,0,1,0-.657ZM6.8,11.564a4.68,4.68,0,1,1,4.68-4.68A4.685,4.685,0,0,1,6.8,11.564Zm0,0"
                            transform="translate(0)" fill="#f9a52b" />
                          <path id="Path_24111" data-name="Path 24111"
                            d="M94.213,93.105a3.611,3.611,0,1,0,3.611,3.612A3.616,3.616,0,0,0,94.213,93.105Zm-2.256,2.949a.534.534,0,0,1,.755,0l1.064,1.064,1.937-1.937a.534.534,0,0,1,.755.755l-2.314,2.314a.534.534,0,0,1-.755,0L91.957,96.81a.534.534,0,0,1,0-.755Zm0,0"
                            transform="translate(-87.414 -89.833)" fill="#f9a52b" />
                        </g>
                      </svg>

                    </h6>
                    <div class="upload_btn">
                      <div class="btn_row">
                        <p>Identity Document</p>
                        <div class=''>
                          <label for='input-file'>
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>Upload
                          </label>
                          <input type='file' id="identity_document" name="identity_document" accept=".png, .jpg, .jpeg" />
                        </div>
                      </div>
                      <div class="btn_row">
                        <p>Proof of Address</p>
                        <div class=''>
                          <label for='input-file'>
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>Upload
                          </label>
                          <input type='file' id="address_proof" name="address_proof" accept=".png, .jpg, .jpeg" />
                        </div>
                      </div>
                      <div class="btn_row">
                        <p>Business Registration</p>
                        <div class=''>
                          <label for='input-file'>
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>Upload
                          </label>
                          <input type='file' id="bus_registration" name="bus_registration" accept=".png, .jpg, .jpeg" />
                        </div>
                      </div>
                      <div class="btn_row">
                        <p>Police Certificate of Good Character</p>
                        <div class='upload'>
                          <label for='input-file'>
                            <i class="fa-solid fa-check"></i>Uploaded
                          </label>
                           <input type='file' id="police_cer" name="police_cer" accept=".png, .jpg, .jpeg" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="bnt-right">
                  <a class="btn action-button nex">Continue</a>
                </div>
              </div>
            </fieldset>

            
            <fieldset id="upload_images">
              <div class="wrap_bg">
                <a class="back-arrow previous action-button-previous" href="#">
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h5 class="small-heading">Business Profile Photo</h5>
                <p>You want new customers fast. So we made it easy and it is a long established fact that a reader will
                  be distracted by the readable content of a page .</p>
                <div class="profile_upload">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      
                    </div>
                    <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url(https://picsum.photos/seed/picsum/200/300);">
                        <input type='file' id="bus_img" name="bus_img" accept=".png, .jpg, .jpeg" />
                      </div>
                      <label for="imageUpload"><i class="fa-solid fa-arrow-up-from-bracket"></i> Upload</label>
                    </div>
                  </div>
                  <div class="profile_ctnt">
                    <h6>Tips for a High Quality Profile Picture:</h6>
                    <p>Check that the photo is good enough and make sure your face Is visible. We will then verify your
                      photo.</p>
                    <div class="all_img">
                      <figure>
                        <img src="images/pro_1.jpg" alt="profile_1">
                      </figure>
                      <figure>
                        <img src="images/pro_2.jpg" alt="profile_2">
                      </figure>
                      <figure>
                        <img src="images/pro_3.jpg" alt="profile_3">
                      </figure>
                    </div>
                    <span>Examples Providers</span>
                  </div>
                </div>
                <hr class="line">
                <div class="demo_work">
                  <h6>Upload Demos of Your Work</h6>
                  <p>Seeing is believing show off you skills and win customers trust.</p>
                  <div class="upload__box">
                    <div class="upload__img-wrap">
                      <div class="upload__btn-box">
                        <label class="upload__btn">
                          <p><i class="fa-solid fa-plus"></i> Upload file</p>
                          <input type="file" multiple="multiple" name="work_image[]" data-max_length="20" class="upload__inputfile">
                        </label>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="bnt-right">
                    <input type="button" name="previous" class="previous btn action-button-previous" value="Previous">
                    <button type="submit" name="next" class="btn next action-button-previous" value="">Send Invite</button>             
                  </div>
              </div>
            </fieldset>

            <fieldset>
              <div class="wrap_bg">
                <div class="congratulations">
                  <figure>
                    <img src="images/Congratulations.jpg" alt="Congratulations! You're well on your way to being a Blue Ibis Member.">
                  </figure>
                  <h6>Congratulations! <br>  You're well on your way to being <br> a Blue Ibis Member.</h6>
                  <P>Once your application is processed, you will receive a  <br> notification. You will then be able to receive job <br> opportunities that match your profile.</P>
                  <div class="bnt-right">
                    <input type="button" name="submit" class="submit btn action-button" value="View Profile">
                        

                  </div>
                </div>
              </div>
            </fieldset>


            <!-- <fieldset id="review">
              <div class="wrap_bg review_step">
                <div class="head">
                  <h4>Request reviews from your customers for Service</h4>
                  <svg xmlns="http://www.w3.org/2000/svg" width="115.249" height="110.308" viewBox="0 0 115.249 110.308">
                    <defs>
                      <linearGradient id="linear-gradient" x1="-0.044" y1="-0.072" x2="1.125" y2="1.102"
                        gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="#fed385" />
                        <stop offset="1" stop-color="#f69e61" />
                      </linearGradient>
                    </defs>
                    <path id="Icon_awesome-star" data-name="Icon awesome-star"
                      d="M52.883,3.836,38.816,32.358,7.344,36.946A6.9,6.9,0,0,0,3.531,48.708L26.3,70.9l-5.385,31.343a6.889,6.889,0,0,0,10,7.26L59.066,94.7l28.155,14.8a6.9,6.9,0,0,0,10-7.26L91.831,70.9,114.6,48.708a6.9,6.9,0,0,0-3.813-11.762L79.315,32.358,65.248,3.836a6.9,6.9,0,0,0-12.365,0Z"
                      transform="translate(-1.441 0.001)" fill="url(#linear-gradient)" />
                  </svg>
                </div>
                <div class="wrap_middle">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Enter Email Addresses Manually</label>
                        <input type="text" class="form-control" placeholder="Separate each email address with a comma.">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Subject</label>
                        <input type="text" class="form-control" placeholder="Praveen Solanki wants you to join BlueBis">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-field">
                        <label>Message</label>
                          <textarea class="form-control" name='foo' placeholder='Robin Rathore thinks that Bluebis would be a great way for you to find new customers.&#10; When you sign up and become active on Bluebis , we’ll give you 5 free credits to get started. Use our PROMO CODE “STARTUP-0217” to claim your free credits.&#10; How Bluebis works&#10;Customers tell us about their needs and we send you for free the details of their quote requests. When a request matches your service category, and if you’re interested, you can pay to view the customer details with Bluebis credits and send your quote. If you’re hired, finalize the job details and start working with your new customer.&#10;Connecting with the right customers has never been simpler&#10;- The Bluebis Team on behalf of Robin Rathore'></textarea>
                          <small>Note: Each person will receive a separate email. This is not a group email.</small>
                      </div>
                    </div>
                  </div>
                  <div class="bnt-right">
                    <input type="button" name="previous" class="previous btn action-button-previous" value="Previous">
                    <button type="submit" name="next" class="btn next action-button-previous" value="">Send Invite</button>             
                  </div>
                </div>
              </div>
            </fieldset> -->

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</main>
@include('layouts.footer')

<!-- jQuery first, then Bootstrap JS. -->
<script src="js/bundle.min.js"></script>
<script src="js/custom.js"></script>

<!-- Script for google map -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false&key=AIzaSyCtZNVT318F-HYweBrZWJBM5k0KgSiMDKc"></script>

<script type="text/javascript">
  google.maps.event.addDomListener(window, 'load', function () {
    var places = new google.maps.places.Autocomplete(document.getElementById('probus_str_add'));
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
            document.getElementById('probus_country').value = country;
            document.getElementById('probus_state').value = state;
            document.getElementById('probus_city').value = city;
            document.getElementById('probus_zip').value = pin;

            document.getElementById('probus_lat').value = latitude;
            document.getElementById('probus_lng').value = longitude;
            document.getElementById('probus_map').value = geocoder;
          }
        }
      });
    });
  });
  $(document).ready(function() {
    $("#map").hide();
    $('#probus_zip').on("input", function() {
      $("#addressmap").hide();
      $("#map").show();
      var dInput = this.value;
      if(dInput==""){
        var dInput = "Canberra Community Club";
      }
      $('#map')
      .attr('src','https://www.google.com/maps/embed/v1/place?key=AIzaSyBIipfS2ZXDWqKMdgRqu5H-U_-p6oV0Ako&q='+dInput);
    });
  });
</script>
<!-- Script for google map end -->

<!-- For multiple sub category start -->
<script>
  $(document).ready(function() {
    $('#category-dropdown').on('change', function() {
      var category_id = this.value;
      $.ajax({
        url: "/get-subcat",
        type: "GET",
        data: {
          category_id: category_id
        },
        cache: false,
        success: function(output){
          $("#kdkdk").html(output)
          if($("#kdkdk").html(output))
            {
              $("#hidesubcat").hide();
            }
          }
        });
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(".multi_select").select2({
});
</script>
<!-- For multiple sub category end -->



<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 --><script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
</script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js">
</script>
<script type="text/javascript">
        $(document).ready(function(){

            // Custom method to validate username
            $.validator.addMethod("usernameRegex", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
            }, "Username must contain only letters, numbers");

            $(".nex").click(function(){
                var form = $("#stepForm");
                form.validate({
                    errorElement: 'span',
                    errorClass: 'help-block text-danger',
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass("has-error");
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass("has-error");
                    },
                    rules: {
                        business_name: "required",
                        licence_number: "required",
                        reg_id_number: "required",
                        price_per_hour: "required",
                        subject: "required",
                        sub_key: "required",
                        probus_str_add: "required",
                        probus_add_lin2: "required",
                    },
                    
                    messages: {
                        business_name: {
                            required: "Business name is required",
                        },
                        licence_number: {
                            required: "Licence number is required",
                        },
                        reg_id_number: {
                            required: "Registration ID number is required",
                        },
                        price_per_hour: {
                            required: "This field is required",
                        },
                        subject: {
                            required: "Select a category",
                        },
                        subject: {
                            required: "Select a subcategory",
                        },
                        probus_str_add: {
                            required: "Address is required",
                        },
                        probus_add_lin2: {
                            required: "Address line 2 is required",
                        },
                    }
                });
                if (form.valid() === true){
                    if ($('#company_type').is(":visible")){
                        current_fs = $('#company_type');
                        next_fs = $('#business_detail');
                        $("#li2").addClass("active");
                        $("#li1 span").addClass("check");
                    }else if($('#business_detail').is(":visible")){
                        current_fs = $('#business_detail');
                        next_fs = $('#business_description');
                        $("#li3").addClass("active");
                        $("#li2 span").addClass("check");
                        

                    }else if($('#business_description').is(":visible")){
                        current_fs = $('#business_description');
                        next_fs = $('#location');
                        $("#li3 span").addClass("check");
                        $("#li4").addClass("active");
                    }else if($('#location').is(":visible")){
                        current_fs = $('#location');
                        next_fs = $('#verified_badge');
                        $("#li4 span").addClass("check");
                        $("#li5").addClass("active");
                    }else if($('#verified_badge').is(":visible")){
                        current_fs = $('#verified_badge');
                        next_fs = $('#upload_images');
                        $("#li5 span").addClass("check");
                        $("#li6").addClass("active");
                    }else if($('#upload_images').is(":visible")){
                        current_fs = $('#upload_images');
                        next_fs = $('#review');
                        $("#li6 span").addClass("check");
                        $("#li7").addClass("active");
                    }else if($('#review').is(":visible")){
                        current_fs = $('#review');
                        next_fs = $('#');
                        $("#li7 span").addClass("check");
                        $("#li8").addClass("active");
                    }

                    next_fs.show(); 
                    current_fs.hide();
                }
            });

            

        });
    </script>
    

    






</body>
</html>