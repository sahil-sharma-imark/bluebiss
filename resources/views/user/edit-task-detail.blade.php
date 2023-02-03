@include('layouts.header')
<main id="main" class="bg-color-gray">

    @if(session()->has('updatetask'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('updatetask') }}
    </div>
    @endif


    <section class="business-detail task-detail-sec">
      <div class="container">
        <form id="stepForm" method="POST" action="{{url('update-task/'.$edit_task->id)}}">
            @csrf
          <div class="main_wrap">
            <div class="bus-det-left active">
              <div class="close-btn">
                <a href="#">
                  <img src="images/close-icon.svg" alt="close-icon">
                </a>
              </div>
              <ul id="progressbar" class="progressbar-text-bg">
                <li class="active" id="li1">
                  <span></span>
                  <a href="#">Project Detail</a>
                </li>
                <li id="li2">
                  <span></span>
                  <a href="#">Describe</a>
                </li>
                <li id="li3">
                  <span></span>
                  <a href="#">Location</a>
                </li>
                <li id="li4">
                  <span></span>
                  <a href="#">Budget</a>
                </li>
                <li id="li5">
                  <span></span>
                  <a href="#">Date & Time</a>
                </li>
                <!-- <li>
                  <span></span>
                  <a href="#">Review</a>
                </li> -->
              </ul>
            </div>
            <fieldset id="project_detail">
              <div class="title" id="Editprojectdetail">
                <h4>Tell us the details of your task</h4>
              </div>

              <div class="wrap_bg task-detail">

                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>What type of cleaning do you need?</label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="cleaning_radio" id="cleaning_radio" value="House Cleaning" {{ ($edit_task->cleaning_radio=="House Cleaning")? "checked" : "" }}  checked>
                      <span></span>
                      House Cleaning

                    </label>
                  </div>
                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="cleaning_radio" id="cleaning_radio" value="Office Cleaning"  {{ ($edit_task->cleaning_radio=="Office Cleaning")? "checked" : "" }}>
                      <span></span>
                      Office Cleaning

                    </label>
                  </div>
                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="cleaning_radio" id="cleaning_radio" value="Window Cleaning"  {{ ($edit_task->cleaning_radio=="Window Cleaning")? "checked" : "" }}>
                      <span></span>
                      Window Cleaning

                    </label>
                  </div>
                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="cleaning_radio" id="cleaning_radio" value="Blinds Cleaning"  {{ ($edit_task->cleaning_radio=="Blinds Cleaning")? "checked" : "" }}>
                      <span></span>
                      Blinds Cleaning

                    </label>
                  </div>
                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="cleaning_radio" id="cleaning_radio" value="Curtain Cleaning"  {{ ($edit_task->cleaning_radio=="Curtain Cleaning")? "checked" : "" }}>
                      <span></span>
                      Curtain Cleaning

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="cleaning_radio" id="cleaning_radio" value="Sanitisation"  {{ ($edit_task->cleaning_radio=="Sanitisation")? "checked" : "" }}>
                      <span></span>
                      Sanitisation

                    </label>
                  </div>
                </div>

                <hr>

                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>How many rooms are in your home?</label>
                  </div>

                  <div class="increment-qty">
                    <div class="button-container">
                      <button class="cart-qty-minus" type="button" value="-"><i class="fa-solid fa-minus"></i></button>
                    </div>
                    <input type="text" name="qty" id="qty" class="qty form-control" maxlength="12" value="{{$edit_task->qty }}"
                      class="input-text qty" />
                    <div class="button-container">
                      <button class="cart-qty-plus" type="button" value="+"><i class="fa-solid fa-plus"></i></button>
                    </div>
                  </div>
                </div>

                <hr>

                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>How many bathrooms are in your home?</label>
                  </div>

                  <div class="increment-qty">
                    <div class="button-container">
                      <button class="cart-qty-minus" type="button" value="-"><i class="fa-solid fa-minus"></i></button>
                    </div>
                    <input type="text" name="qty_bath" id="qty_bath" class="qty form-control" maxlength="12" value="{{$edit_task->qty_bath }}"
                      class="input-text qty" />
                    <div class="button-container">
                      <button class="cart-qty-plus" type="button" value="+"><i class="fa-solid fa-plus"></i></button>
                    </div>
                  </div>
                </div>

                <hr>

                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>What kind of cleaning service would you like?</label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="stand_clean_radio" id="stand_clean_radio" value="Standard Cleaning" {{ ($edit_task->stand_clean_radio=="Standard Cleaning")? "checked" : "" }} checked>
                      <span></span>
                      Standard Cleaning

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="stand_clean_radio" id="stand_clean_radio" value="Deep Cleaning" {{ ($edit_task->stand_clean_radio=="Deep Cleaning")? "checked" : "" }}>
                      <span></span>
                      Deep Cleaning

                    </label>
                  </div>
                </div>

                <hr>

                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>Are there any cats or dogs in your house?</label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="cat_radio" id="cat_radio" value="Yes, I have a cat or dog" {{ ($edit_task->cat_radio=="Yes, I have a cat or dog")? "checked" : "" }} checked>
                      <span></span>
                      Yes, I have a cat or dog

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="cat_radio" id="cat_radio" value="No, I don't have a cat or dog" {{ ($edit_task->cat_radio=="No, I don't have a cat or dog")? "checked" : "" }}>
                      <span></span>
                      No, I don't have a cat or dog

                    </label>
                  </div>
                </div>

                <hr>

                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>Which additional services do you need, if any? (optional)</label>
                  </div>

                  <div class="check-box-radius check-box-radius-forPX">
                    <label>
                      <input type="checkbox">
                      <span><i class="check-icon"></i></span>
                      Fridge Cleaning

                    </label>
                  </div>

                  <div class="check-box-radius check-box-radius-forPX">
                    <label>
                      <input type="checkbox" checked>
                      <span><i class="check-icon"></i></span>
                      Oven Cleaning

                    </label>
                  </div>

                  <div class="check-box-radius check-box-radius-forPX">
                    <label>
                      <input type="checkbox" checked>
                      <span><i class="check-icon"></i></span>
                      Laundry

                    </label>
                  </div>

                  <div class="check-box-radius check-box-radius-forPX">
                    <label>
                      <input type="checkbox">
                      <span><i class="check-icon"></i></span>
                      Interior Window Cleaning

                    </label>
                  </div>
                </div>

                <hr>

                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>How often would you like your house cleaned?</label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="house_cleaned" id="house_cleaned" value="Just Once" {{ ($edit_task->house_cleaned=="Just Once")? "checked" : "" }} checked>
                      <span></span>
                      Just Once

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="house_cleaned" id="house_cleaned" value="Every week" {{ ($edit_task->house_cleaned=="Every week")? "checked" : "" }}>
                      <span></span>
                      Every week

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="house_cleaned" id="house_cleaned" value="Daily (5 times a week)" {{ ($edit_task->house_cleaned=="Daily (5 times a week)")? "checked" : "" }}>
                      <span></span>
                      Daily (5 times a week)

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="house_cleaned" id="house_cleaned" value="Every 2 Weeks" {{ ($edit_task->house_cleaned=="Every 2 Weeks")? "checked" : "" }}>
                      <span></span>
                      Every 2 Weeks

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="house_cleaned" id="house_cleaned" value="Once a month" {{ ($edit_task->house_cleaned=="Once a month")? "checked" : "" }}>
                      <span></span>
                      Once a month

                    </label>
                  </div>
                </div>

                <hr>

                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>Choose the status for this project.</label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="hire_radio" id="hire_radio" value="Ready to hire" {{ ($edit_task->hire_radio=="Ready to hire")? "checked" : "" }} checked>
                      <span></span>
                      Ready to hire

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="hire_radio" id="hire_radio" value="Hire based on quotations" {{ ($edit_task->hire_radio=="Hire based on quotations")? "checked" : "" }}>
                      <span></span>
                      Hire based on quotations

                    </label>
                  </div>

                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="hire_radio" id="hire_radio" value="Planning and Budgeting">
                      <span></span>
                      Planning and Budgeting

                    </label>
                  </div>
                </div>

                <hr>

                <div class="check-box-listMain">
                  <div class="demo_work">
                    <div class="form-field mb-0">
                      <label>Would you like to add pictures?</label>
                    </div>

                    <div class="upload__box">
                      <div class="upload__img-wrap">
                        <div class="upload__btn-box">
                          <label class="upload__btn upload-box-bg">
                            <p class="plus-circle"><svg viewBox="0 0 31 31">
                                <g id="Group_54735" data-name="Group 54735" transform="translate(-518.292 -314.292)">
                                  <circle id="Ellipse_676" data-name="Ellipse 676" cx="14.5" cy="14.5" r="14.5"
                                    transform="translate(519.292 315.292)" fill="none" stroke="#47bbd0"
                                    stroke-linecap="round" stroke-width="2" />
                                  <g id="Group_41342" data-name="Group 41342" transform="translate(526.216 322.215)">
                                    <line id="Line_239" data-name="Line 239" y2="14.907" transform="translate(7.335 0)"
                                      fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-width="2" />
                                    <line id="Line_240" data-name="Line 240" y2="14.67"
                                      transform="translate(14.67 7.453) rotate(90)" fill="none" stroke="#47bbd0"
                                      stroke-linecap="round" stroke-width="2" />
                                  </g>
                                </g>
                              </svg>
                            </p>
                            <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                          </label>
                        </div>

                      </div>
                    </div>
                  </div>


                </div>

                <div class="bnt-right">
                  <a id="step1" class="btn action-button nex">Continue</a>
                </div>
                
              </div>
            </fieldset>
            <fieldset id="describe">
              <div class="title">
                <h4>Describe your task</h4>
              </div>
              <div class="wrap_bg task-detail">

                <div class="form-field mb-0">
                  <label>Tell us the details of your task</label>
                </div>

                <p>
                  <label class="lb1"></label>,
                  <label class="lb2"></label>,
                  <label class="lb3"></label>,
                  <label class="lb4"></label>,
                  <label class="lb5"></label>,
                  <label class="lb6"></label>,
                  <label class="lb7"></label>
                </p>

              </div>

              <div class="wrap_bg task-detail">
                <div class="form-field mb-0">
                  <label for="task_des">Describe your task</label>
                </div>

                <p>Start the conversation and tell your provider what you need done. This helps us show you only
                  qualified and available provider for the job. Don't worry, you can edit this later.</p>

                <!-- <input type="text" class="form-control" name="task_des" id="task_des"> -->
                <textarea class="form-control" name="task_des" id="task_des" placeholder="Hi! Looking for help updating my 650 sq ft apartment. I’m on the 2nd floor up a
                  short flight of stairs. Please bring an electric drill and ring doorbell number 3. Thanks!" value="">{{$edit_task->task_des}}</textarea>
                
                

                <p>If you need two or more service provider, please post additional tasks for each provider needed.</p>

                <div class="bnt-right">
                  <a id="step2" class="btn action-button nex">Continue</a>
                </div>
                <div class="bnt-right">
                    <a id="pre2" class="btn action-button pre">Previous</a>
                  </div>

              </div>


            </fieldset>
            <fieldset id="location">
              <div class="title">
                <h4>Fill Task Details</h4>
              </div>

              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>Tell us the details of your task</label>
                </div>

                <p>
                  <label class="lb1"></label>,
                  <label class="lb2"></label>,
                  <label class="lb3"></label>,
                  <label class="lb4"></label>,
                  <label class="lb5"></label>,
                  <label class="lb6"></label>,
                  <label class="lb7"></label>
                </p>
              </div>
              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>Describe your task</label>
                </div>

                <p>
                  <label class="lb8"></label>
              </p>
              </div>

              <div class="wrap_bg task-detail">

                <div class="accordion accordion-loc" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label for="task_address">Your task location</label>
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">

                        <p>Don't worry, your address will only be seen by the winning service provider.</p>

                        <a class="location-pik" href="#"><i class="fa-solid fa-location-crosshairs"></i> Use my
                          location</a>

                        <div class="search-location">
                          <div class="search-loca-icon map-icon">
                            <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                              <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                transform="translate(-3.75 -0.75)">
                                <path id="Path_24078" data-name="Path 24078"
                                  d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z"
                                  transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="1.5" />
                                <path id="Path_24079" data-name="Path 24079"
                                  d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z"
                                  transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                              </g>
                            </svg>
                          </div>

                          <input type="text" name="task_address" value="{{$edit_task->task_address}}" id="task_address" class="form-control" placeholder="Caribbean Blvd, Cutler Bay, FL, USA">

                          <a class="search-loca-icon location-edit" href="#">
                            <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                              <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                                d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                                transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1.5" />
                            </svg>
                          </a>
                        </div>

                        <div class="map">
                          <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55565170.29301636!2d-132.08532758867793!3d31.786060306224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1659507631691!5m2!1sen!2sin"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>

                <div class="bnt-right">
                  <a id="step3" class="btn action-button nex">Continue</a>
                </div>
                <div class="bnt-right">
                  <a id="pre3" class="btn action-button pre">Previous</a>
                </div>
              </div>
            </fieldset >
            <fieldset id="budget" >
              <div class="title">
                <h4>Fill Task Details</h4>
              </div>

              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>Tell us the details of your task</label>
                </div>

                <p>
                  <label class="lb1"></label>,
                  <label class="lb2"></label>,
                  <label class="lb3"></label>,
                  <label class="lb4"></label>,
                  <label class="lb5"></label>,
                  <label class="lb6"></label>,
                  <label class="lb7"></label>
                </p>
              </div>

              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>Describe your task</label>
                </div>

                <p>
                  <label class="lb8"></label>,
                </p>

              </div>

              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#location">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>Your task location</label>
                </div>

                <p>
                  <label class="lb9"></label>,
                </p>
              </div>

              <div class="wrap_bg task-detail">
                <div class="form-field mb-0">
                  <label>What is your budget for this project?</label>
                </div>

                <p>The price is non-binding and we will never show it to providers. It has only an information value for
                  Bluebis.</p>

                <div class="budget-price">
                  <span class="price-doler">&</span>

                  <input type="text" name="task_budget" id="task_budget" class="form-control" placeholder="1500.00" value="{{$edit_task->task_budget}}">
                </div>

                <div class="budget-bottom">
                  <div class="late_check">
                    <div class="checkBox checkBox-liheight">
                      <label for="know"><input type="checkbox" id="know"><span></span>I don't know</label>
                    </div>
                  </div>
                </div>

                <div class="bnt-right">
                    <a id="step4" class="btn action-button nex">Continue</a>
                    <!-- <input type="button" name="next" class="next btn action-button" value="Continue"> -->
                  </div>
                  <div class="bnt-right">
                    <a id="pre4" class="btn action-button pre">Previous</a>
                  </div>

              </div>
          </fieldset>
            <fieldset id="date_time">
              <div class="title">
                <h4>Fill Task Details</h4>
              </div>

              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>Tell us the details of your task</label>
                </div>

                <p>
                  <label class="lb1"></label>,
                  <label class="lb2"></label>,
                  <label class="lb3"></label>,
                  <label class="lb4"></label>,
                  <label class="lb5"></label>,
                  <label class="lb6"></label>,
                  <label class="lb7"></label>
                </p>
              </div>

              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>Describe your task</label>
                </div>

                <p>
                  <label class="lb8"></label>
                </p>

              </div>

              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>Your task location</label>
                </div>

                <p><label class="lb9"></label></p>
              </div>

              <div class="wrap_bg task-detail">
                <a class="edit-icon" href="#">
                  <svg viewBox="0 0 17.684 17.684" style="width: 16px;">
                    <path id="Icon_feather-edit-2" data-name="Icon feather-edit-2"
                      d="M15.1,3.926a2.282,2.282,0,1,1,3.228,3.228L7.438,18.047,3,19.257l1.21-4.438Z"
                      transform="translate(-2.25 -2.323)" fill="none" stroke="#47bbd0" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="1.5" />
                  </svg>
                </a>

                <div class="form-field mb-0">
                  <label>What is your budget for this project?</label>
                </div>

                <p><label class="lb10"></label></p>
              </div>

              <div class="wrap_bg task-detail">
                <div class="check-box-listMain">
                  <div class="form-field mb-0">
                    <label>Date & Time</label>
                  </div>

                  <div class="provider-listing-box">

                    <div class="check-box-radius col_open">
                      <label>
                        <input type="radio" class="radioshow" name="hours" value="has">
                        <span>Choose tentative date</span>
                      </label>
                      <div id="has_hour" class="hours_list" style="display: none;">
                        
                        <input type="text" class="form-control current-date" name="datetimes" id="datetimes">
                      </div>

                    </div>

                    <div class="check-box-radius check-box-radius-forPX">
                      <label>
                        <input type="radio" name="shipping" id="shipping" value="Morning (8am - 12pm)"  {{ ($edit_task->shipping=="Morning (8am - 12pm)")? "checked" : "" }} >
                        <span><i class="check-icon"></i></span>
                        Morning (8am - 12pm)

                      </label>
                    </div>

                    <div class="check-box-radius check-box-radius-forPX">
                      <label>
                        <input type="radio" name="shipping" id="shipping" value="Afternoon (12pm - 5pm)" {{ ($edit_task->shipping=="Afternoon (12pm - 5pm)")? "checked" : "" }}>
                        <span><i class="check-icon"></i></span> 
                        Afternoon (12pm - 5pm)

                      </label>
                    </div>

                    <div class="check-box-radius check-box-radius-forPX">
                      <label>
                        <input type="radio" name="shipping" id="shipping" value="Evening (5pm - 9:30pm)" {{ ($edit_task->shipping=="Evening (5pm - 9:30pm)")? "checked" : "" }}>
                        <span><i class="check-icon"></i></span>
                        Evening (5pm - 9:30pm)

                      </label>
                    </div>

                    <div class="check-box-radius check-box-radius-forPX">
                      <label>
                        <input type="radio" name="shipping" id="shipping" value="I'm flexible" {{ ($edit_task->shipping=="I'm flexible")? "checked" : "" }}>
                        <span><i class="check-icon"></i></span>
                        I'm flexible

                      </label>
                    </div>
                  </div>
 
                </div>

                <div class="bnt-right">
                   
                  <div class="send-req-btn btn">
                    <button type="submit" class="btn">Send Request</button>
                    <i class="fa-solid fa-file-lines"></i> Send Request 
                  </div>
                  <div class="bnt-right">
                    <a id="pre5" class="btn action-button pre">Previous</a>
                  </div>

                </div>
              </div>
            </fieldset>
            
            <fieldset>
              <div class="wrap_bg">
                <div class="good-news">
                  <div class="good-news-top">
                    <figure>
                      <svg xmlns="http://www.w3.org/2000/svg" width="81.972" height="82" viewBox="0 0 81.972 82">
                        <g id="Group_53194" data-name="Group 53194" transform="translate(-646 -190)">
                          <g id="Group_53193" data-name="Group 53193" transform="translate(641.334 196.647)">
                            <path id="Path_24270" data-name="Path 24270" d="M77.823,42.988c0-3.725-1.893-6.924-4.654-8.13a10.474,10.474,0,0,0,.566-3.42c0-4.862-3.117-8.67-7.1-8.67H57.072c5.43-6.779,7.923-12.52,7.417-17.087-.971-8.721-7.8-11.223-11.315-11.328a3.1,3.1,0,0,0-2.286,1,2.99,2.99,0,0,0-.738,2.417c.023.181.5,4.482-3.75,9.057a13.941,13.941,0,0,1-2.855,2.053,45.336,45.336,0,0,0-8.174,6.168,173.289,173.289,0,0,1-13.5,10.977H8.673a3.01,3.01,0,0,0-3.007,3.014L5.73,59.317a3.009,3.009,0,0,0,3.006,3H20.447c5.11,7.506,12.361,11.972,19.5,11.972H51.364a2.74,2.74,0,0,0,.65-.076,6.018,6.018,0,0,0,1.254.138H62.43c3.98,0,7.1-3.81,7.1-8.672a10.267,10.267,0,0,0-.506-3.221c2.791-1.185,4.71-4.4,4.71-8.151a10.327,10.327,0,0,0-.5-3.2C75.991,49.883,77.823,46.735,77.823,42.988Zm-8.99,11.319c0,2.158-1.158,3.768-2.194,3.768H50.607c-1.038,0-2.2-1.61-2.2-3.768,0-2.133,1.132-3.727,2.16-3.764h16.1C67.7,50.58,68.833,52.174,68.833,54.307Zm-6.4,15.143h-9.16c-1.038,0-2.2-1.613-2.2-3.77a5.621,5.621,0,0,1,.194-1.484,4.294,4.294,0,0,1,1.357-1.786,1.683,1.683,0,0,0,.415-.452,1.057,1.057,0,0,1,.229-.043h9.16c1.036,0,2.2,1.611,2.2,3.766S63.467,69.45,62.431,69.45Zm4.316-22.693c-.036,0-.071-.007-.109-.007H50.607c-.036,0-.072.007-.11.007H48.809c-1.038,0-2.2-1.614-2.2-3.769s1.16-3.77,2.2-3.77H70.726c1.038,0,2.2,1.613,2.2,3.77s-1.16,3.769-2.2,3.769Zm-.109-11.551H50.607c-1.038,0-2.2-1.613-2.2-3.767s1.158-3.769,2.2-3.769H66.639c1.038,0,2.2,1.612,2.2,3.769S67.675,35.206,66.639,35.206ZM50.091,23.385A7.656,7.656,0,0,0,44.569,27.9a1.884,1.884,0,0,0-.506,1.47,8.722,8.722,0,0,0-.278,2.084,8.853,8.853,0,0,0,.286,2.169c-.437,4.551-2.562,11.318-11.187,12.55a1.894,1.894,0,0,0,.263,3.768,1.821,1.821,0,0,0,.271-.021,16.328,16.328,0,0,0,8.951-4.009A8.16,8.16,0,0,0,45.2,49.8a8.6,8.6,0,0,0-1.42,4.773,8.236,8.236,0,0,0,4.27,7.354,8.8,8.8,0,0,0-.358.958,8.76,8.76,0,0,0,0,6.5H39.946c-6.8,0-12.679-5.451-16-10.667a1.894,1.894,0,0,0-1.8-1.3H10.624l-.055-26.492H22.862a1.9,1.9,0,0,0,1.125-.37A187.8,187.8,0,0,0,38.735,18.608a40.662,40.662,0,0,1,7.373-5.556A17.526,17.526,0,0,0,49.99,10.16a18.151,18.151,0,0,0,5-10.5c1.76.65,4.158,2.31,4.63,6.558C60.036,10,56.485,16.387,50.091,23.385Z" transform="translate(0)" fill="#47bbd0" stroke="#fff" stroke-width="2"/>
                          </g>
                          <path id="Icon_feather-check" data-name="Icon feather-check" d="M21.507,9,10.846,19.661,6,14.815" transform="translate(705.404 190.221)" fill="none" stroke="#47bbd0" stroke-width="3"/>
                        </g>
                      </svg>
                    </figure>
                    <h6>Good news!  <br> We've received your request for a quotation.</h6>
                    <P>We will notify you via email and SMS when your request receives quotes from pros. You can follow your request easily,</P>
                    <div class="bnt-right">
                      <input type="button" name="submit" class="submit btn action-button" value="Go to my task">
  
                      <!-- <input type="button" name="submit" class="submit bg-color-gray action-button" value="Start new task"> -->
                      <a class="btn gray-br-btn bg-color-gray" data-bs-toggle="modal" href="#ProjectPublished" role="button">Start new task</a>
                    </div>
  
                  </div>
                  <hr>

                  <p class="text-align-left">We will notify you via email and SMS when your request receives quotes from pros. You can follow your request easily,</p>

                  <ul class="count-list">
                    <li>Receive multiple quotes within a few hours.</li>
                    <li>Compare prices, check past projects and read reviews.</li>
                    <li>Call or text the pros to ask questions or work out any details.</li>
                    <li>When you're ready, hire the pro you like and get your project done. </li>
                  </ul>
 
                </div>
              </div>
            </fieldset>
        </form>
      </div>
      </div>
      </div>
      </div>
    </section>

    <div class="provider-listing-popup">
      <div class="modal fade" id="ProjectPublished" aria-hidden="true" aria-labelledby="ProjectPublishedLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="ceate-listing-content">
              <div class="published-text">Your project is almost published.</div>

              <p>We are just missing a few details in order to publish your project. As soon as you fill it out, service providers will send you offers. You can find the draft of this project in My Projects section.</p>
   
              <div class="create-btn">
                <button type="button" class="btn gray-br-btn" data-bs-dismiss="modal">Skip</button>
                
                <a href="#" data-bs-dismiss="modal" class="btn btn-primary">Finish Project</a>
               </div>
              
            </div>
  
          </div>
        </div>
      </div>
    </div>


  </main>

  @include('layouts.footer')


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
                        task_des: "required",
                        task_address: "required",
                        task_budget: "required",

                    },
                    
                    messages: {
                        task_des: {
                            required: "Task description required",
                        },
                        task_address: {
                            task_address: "Place mention address",
                        },
                        task_address: {
                            task_address: "Place mention Budget",
                        },
                    }
                });
                if (form.valid() === true){
                    if ($('#project_detail').is(":visible")){
                        current_fs = $('#project_detail');
                        next_fs = $('#describe');
                        $("#li2").addClass("active");
                        $("#li1 span").addClass("check");
                    }else if($('#describe').is(":visible")){
                        current_fs = $('#describe');
                        next_fs = $('#location');
                        $("#li2").addClass("active");
                        $("#li2 span").addClass("check");
                        $("#li3").addClass("active");

                    }else if($('#location').is(":visible")){
                        current_fs = $('#location');
                        next_fs = $('#budget');
                        $("#li3 span").addClass("check");
                        $("#li4").addClass("active");
                    }else if($('#budget').is(":visible")){
                        current_fs = $('#budget');
                        next_fs = $('#date_time');
                        $("#li4 span").addClass("check");
                        $("#li5").addClass("active");
                    }

                    next_fs.show(); 
                    current_fs.hide();
                }
            });




            $(".pre").click(function(){
                var form = $("#stepForm");
                
                
                    if($('#describe').is(":visible")){
                        current_fs = $('#project_detail');
                        next_fs = $('#describe');
                        $("#li1").addClass("active");
                        $("#li2 span").removeClass("check");
                        $("#li2").removeClass("active");

                    }else if($('#location').is(":visible")){
                        current_fs = $('#describe');
                        next_fs = $('#location');
                        $("#li3 span").removeClass("check");
                        $("#li3").removeClass("active");
                    }else if($('#budget').is(":visible")){
                        current_fs = $('#location');
                        next_fs = $('#budget');
                        $("#li4 span").removeClass("check");
                        $("#li4").removeClass("active");
                    }else if($('#date_time').is(":visible")){
                        current_fs = $('#budget');
                        next_fs = $('#date_time');
                        $("#li5 span").removeClass("check");
                        $("#li5").removeClass("active");
                    }

                    next_fs.hide(); 
                    current_fs.show();
                
            });

            

        });
    </script>















<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false&key=AIzaSyCtZNVT318F-HYweBrZWJBM5k0KgSiMDKc"></script>

<!-- End Script for registration --> 
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('task_address'));
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

                        document.getElementById('probus_count').value = country;
                        document.getElementById('probus_stte').value = state;
                        document.getElementById('probus_cty').value = city;
                        document.getElementById('probus_zp').value = pin;

                        document.getElementById('probus_lt').value = latitude;
                        document.getElementById('probus_lg').value = longitude;
                        document.getElementById('probus_mp').value = geocoder;

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




<script type="text/javascript">
   
    $("#step1").click(function(){
        var cleaning_radio = $("input[type='radio'][name='cleaning_radio']:checked").val();
        var qty = $("#qty").val();
        var qty_bath = $("#qty_bath").val();
        var stand_clean_radio = $("input[type='radio'][name='stand_clean_radio']:checked").val();
        var cat_radio = $("input[type='radio'][name='cat_radio']:checked").val();
        var house_cleaned = $("input[type='radio'][name='house_cleaned']:checked").val();
        var hire_radio = $("input[type='radio'][name='hire_radio']:checked").val();

            $(".lb1").html(cleaning_radio);
            $(".lb2").html(qty);
            $(".lb3").html(qty_bath);
            $(".lb4").html(stand_clean_radio);
            $(".lb5").html(cat_radio);
            $(".lb6").html(house_cleaned);
            $(".lb7").html(hire_radio);
        });
    $("#step2").click(function(){
        var task_des = $("#task_des").val();
        $(".lb8").html(task_des);
    });
    $("#step3").click(function(){
        var task_address = $("#task_address").val();
        $(".lb9").html(task_address);
    });
    $("#step4").click(function(){
        var task_budget = $("#task_budget").val();
        $(".lb10").html(task_budget);
    });
   
</script>




</body>
</html>