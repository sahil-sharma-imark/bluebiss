@include('layouts.header')

  <main id="main">
    <section class="provider-acc">
      <div class="container">
        <div class="provider-acc-row">
          <div class="provider-col provider-acc-img">
            <figure>
              <img src="images/provider-acc.png" alt="">
            </figure>
          </div>

          <div class="provider-col provider-acc-cnt">
            <h2>Create Your Free provider Account</h2>

            <p>Build your online presence with a professional profile on Ahlookin. It’s easy to sign up and it’s free.
              Get more of the jobs you want!</p>

            <div class="search-input">
              <form>
                <div class="search-input-filed">
                  <input type="search" class="form-control" placeholder="Which area do you give service">

                  <button class="search-btn">
                    <svg version="1.1" id="Layer_1" x="0px" y="0px" width="122.879px" height="119.799px"
                      viewBox="0 0 122.879 119.799" enable-background="new 0 0 122.879 119.799" xml:space="preserve">
                      <g>
                        <path
                          d="M49.988,0h0.016v0.007C63.803,0.011,76.298,5.608,85.34,14.652c9.027,9.031,14.619,21.515,14.628,35.303h0.007v0.033v0.04 h-0.007c-0.005,5.557-0.917,10.905-2.594,15.892c-0.281,0.837-0.575,1.641-0.877,2.409v0.007c-1.446,3.66-3.315,7.12-5.547,10.307 l29.082,26.139l0.018,0.016l0.157,0.146l0.011,0.011c1.642,1.563,2.536,3.656,2.649,5.78c0.11,2.1-0.543,4.248-1.979,5.971 l-0.011,0.016l-0.175,0.203l-0.035,0.035l-0.146,0.16l-0.016,0.021c-1.565,1.642-3.654,2.534-5.78,2.646 c-2.097,0.111-4.247-0.54-5.971-1.978l-0.015-0.011l-0.204-0.175l-0.029-0.024L78.761,90.865c-0.88,0.62-1.778,1.209-2.687,1.765 c-1.233,0.755-2.51,1.466-3.813,2.115c-6.699,3.342-14.269,5.222-22.272,5.222v0.007h-0.016v-0.007 c-13.799-0.004-26.296-5.601-35.338-14.645C5.605,76.291,0.016,63.805,0.007,50.021H0v-0.033v-0.016h0.007 c0.004-13.799,5.601-26.296,14.645-35.338C23.683,5.608,36.167,0.016,49.955,0.007V0H49.988L49.988,0z M50.004,11.21v0.007h-0.016 h-0.033V11.21c-10.686,0.007-20.372,4.35-27.384,11.359C15.56,29.578,11.213,39.274,11.21,49.973h0.007v0.016v0.033H11.21 c0.007,10.686,4.347,20.367,11.359,27.381c7.009,7.012,16.705,11.359,27.403,11.361v-0.007h0.016h0.033v0.007 c10.686-0.007,20.368-4.348,27.382-11.359c7.011-7.009,11.358-16.702,11.36-27.4h-0.006v-0.016v-0.033h0.006 c-0.006-10.686-4.35-20.372-11.358-27.384C70.396,15.56,60.703,11.213,50.004,11.21L50.004,11.21z">
                        </path>
                      </g>
                    </svg>
                  </button>
                </div>

                <a class="btn" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Create provider account</a>
              </form>
            </div>

          </div>
        </div>
      </div>
    </section>

    <div class="provider-acc-popup">
      <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="provider-popup-row">
              <div class="provider-popup-img">
                <figure>
                  <img src="images/provider-popup-img.png" alt="">
                </figure>
              </div>

              <div class="provider-popup-content">
                <h5>Create Your Free provider Account</h5>

                <form id="form" method="POST" action="/create-provider-account">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-field">
                        <label>First Name *</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="e.g. Jhon">
                        <span class="text-danger" id="name-error"></span>
                        
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Last Name *</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="e.g. Doe" >
                        <span class="text-danger" id="lastname-error"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Email *</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="example@mail.com" >
                        <span class="text-danger" id="email-error"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Mobile Number *</label>
                        <input type="text" class="form-control" name="number" id="number" placeholder="e.g. 9876 543 210" >
                        <span class="text-danger" id="number-error"></span>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Password</label>
                        <div class="pass-field">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password*" >
                          <span toggle="#password-field"
                            class="fa fa-fw field-icon toggle-password fa-eye-slash"></span>
                            <span class="text-danger" id="password-error"></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-field">
                        <label>Confirm Password *</label>
                        <div class="pass-field">
                          <input type="password" class="form-control" name="con_password" id="con_password" placeholder="Password*" >
                          <span toggle="#password-field1"
                            class="fa fa-fw field-icon toggle-password1 fa-eye-slash"></span>
                            <span class="text-danger" id="con_password-error"></span>
                        </div>
                      </div>
                    </div>


                  </div>

                  <!-- <div class="check-box">
                    <input type="checkbox" id="accept_t_c" name="accept_t_c">
                    <label for="accept_t_c">I Agree to the<span>Terms of Service</span> and <span>Privacy Policy</span></label>
                  </div> -->


                  <div class="my-checkbox-wrap">
                    <label>
                      <input type="checkbox" name="accept_t_c"x`>
                      <span class="my-checkbox">
                        I Agree to the
                        <a href="{{url('terms-&-conditions')}}">Terms of Service</a>
                         and 
                         <a href="{{url('privacy-policy')}}">Privacy Policy</a>
                      </span>
                    </label>
                  </div>

                  
                  

                  <div class="create-btn">
                    <!-- <a href="{{url('business-details')}}" id="cre_a_acc" class="btn btn-primary">Create an Account</a> -->

                    <!-- <a type="submit" href="{{url('business-details')}}" class="btn btn-primary" id="cre_a_acc" data-bs-dismiss="modal">Create an Account</a> -->
                      <button type="submit" class="btn btn-primary" id="cre_a_acc">Create an Account</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <section class="provider-boxs">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 provider-box-col">
            <div class="provider-box">
              <figure class="fig-bg-info">
                <!-- <img src="images/" alt=""> -->
              </figure>

              <h6>Be Your Own Boss</h6>

              <p>Sign up for free to receive requests for quotations from customers seeking your service, which jobs you
                take, and which clients you work for is always your choice.</p>
            </div>
          </div>

          <div class="col-md-4 provider-box-col">
            <div class="provider-box">
              <figure class="fig-bg-yellow">
                <!-- <img src="images/" alt=""> -->
              </figure>

              <h6>Let us Find the Customers for You</h6>

              <p>Our platform will send leads directly to you, so you can spend less time finding new customers and more
                time working on jobs. You can accept or decline new jobs, chat with the customer, and send quotes all on
                our platform.</p>
            </div>
          </div>

          <div class="col-md-4 provider-box-col">
            <div class="provider-box">
              <figure class="fig-bg-green">
                <!-- <img src="images/" alt=""> -->
              </figure>

              <h6>Only Pay Us When You Get Paid </h6>

              <p>Ahlookin is interested in you getting the job not just the lead. To demonstrate our commitment to that,
                we will only get paid when you do.</p>
            </div>
          </div>

          <div class="col-md-4 provider-box-col">
            <div class="provider-box">
              <figure class="fig-bg-red">
                <!-- <img src="images/" alt=""> -->
              </figure>

              <h6>Grow Your Business</h6>

              <p>If you’re a good fit for the customer, you get hired. Complete the job and request a review from the
                customer. The more positive reviews you get, the more business will increase.</p>
            </div>
          </div>

          <div class="col-md-4 provider-box-col">
            <div class="provider-box">
              <figure class="fig-bg-info">
                <!-- <img src="images/" alt=""> -->
              </figure>

              <h6>Set Your Own Rates</h6>

              <p>When you receive a request for a quote, you set your own prices.</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="join-now pt-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5">
            <div class="join-now-content join-now-content-left">
              <h3>Get in on the Ground Floor- Join Now</h3>

              <p>Our ambitions are ginormous. We have this vision that anyone should be able to book a service for
                themselves or their home with just the click of a few buttons. This ease of getting service should
                increase business for service providers.</p>
              <p>We suggest that you stamp your authority on this platform as early as possible. Lead the way with
                customer reviews and a killer profile, that other vendors could only envy.</p>
            </div>
          </div>
          <div class="col-md-7">
            <figure>
              <img src="images/join-now-img.png" alt="">
            </figure>
          </div>
        </div>
    </section>

    <section class="earning">
      <div class="container">
        <div class="earning-content">
          <div class="title">
            <h3>Start Earning on Ahlookin</h3>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-6 earning-col">
              <div class="earning-box bg-info">
                <h5>Develop an A+ Profile</h5>

                <p>Persons looking for service providers will scour through your profile. The service provider with the
                  most thought-out profile is more likely to win the job. Positive reviews also go a very long way in
                  leaving a positive impression.</p>
              </div>
            </div>
            <div class="col-md-6 earning-col">
              <div class="earning-box bg-yellow">
                <h5>Browse the Tasks that Come Your Way</h5>

                <p>Some clients will request a quote from you directly (requested tasks) while others may request a
                  quote
                  through our broadcast feature (broadcasted tasks).</p>
              </div>
            </div>
            <div class="col-md-6 earning-col">
              <div class="earning-box bg-red">
                <h5>Submit a Quote</h5>

                <p>Taking into consideration the amount of work and time required, submit a fair quote. The person
                  posting
                  the job may have posted their budget, you are under no obligation for your price to be the same.
                  Simply
                  justify your price.</p>
              </div>
            </div>
            <div class="col-md-6 earning-col">
              <div class="earning-box bg-green">
                <h5>Complete the Task and Get Paid</h5>

                <p>Complete the job to the best of your ability. Once the job is completed, inform the customer, and
                  request the required payment.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="join-now">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-7">
            <figure>
              <img src="images/tackle-bills.png" alt="">
            </figure>
          </div>

          <div class="col-md-5">
            <div class="join-now-content join-now-content-right">
              <img src="images/quote.png" alt="">

              <h5>I Love Bluelbis! I Was Able to Get out of Debt, Tackle Bills, Provide for My Family, and Still Have
                Enough Room to save for Future Goals.</h5>

              <p><span>Karsheem W., New York, NY</span></p>
            </div>
          </div>
        </div>
    </section>

    <section class="faq">
      <div class="container">
        <h3>Frequently Asked Questions</h3>

        <div class="faq-tab">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                  aria-expanded="true" aria-controls="collapseOne">
                  What is Bluebis?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How trustworthy is Bluebis?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Why should I register?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFor">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
                  I didn't receive a confirmation e-mail, what should I do?
                </button>
              </h2>
              <div id="collapseFor" class="accordion-collapse collapse" aria-labelledby="headingFor"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="faq-btn">
          <a class="btn" href="{{url('faq')}}">Frequently asked question</a>
        </div>
      </div>
    </section>
  </main>


  

  @include('layouts.footer')

  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/additional-methods.js"></script>

<!-- Script for become aprovider -->  
<!-- <script>
  $(document).ready(function() {
    $("#form").validate({
      errorClass: "error text-danger",
      validClass: "valid success-alert",
      rules: {
        name: {
          required: true,
          lettersonly: true,
          nowhitespace: true,           
        },
        email: {
          required: true,
          email: true,
        },
        number: {
          required: true,
          maxlength: 12,
          minlength: 10,
        },
        password: {
          required:true,
          minlength: 5,
        },
        con_password: {
         required: true,
         equalTo: "#password"
        },
        
      }
    });
  });
</script> -->
<!-- End Script for become aprovider --> 
<script>

 $(document).ready(function($) {
        
        $("#form").validate({
                rules: {
                    name: "required",                    
                    email: {
                        required: true,
                        email: true,
                      },
                      number: {
                        required: true,
                        maxlength: 12,
                        minlength: 10,
                      },
                      password: {
                      required:true,
                      minlength: 5,
                    },
                    con_password: {
                     required: true,
                     equalTo: "#password"
                    },
                    accept_t_c: {
                      required: true,
                    },
                 
                },
                messages: {
                    name: "Please enter your Name",                   
                    email: {
                        required: "Please enter email ID",
                        email: "Enter valid email ID",
                    },
                    number: {
                      required: "Enter mobile number",
                      maxlength: "Not more than 12 digit",
                      minlength: "At least 10 digit number", 
                    },
                    password: {
                      required: "This field is required",
                      minlength: "At least five characters",
                    },
                    con_password: {
                      required: "This field is required",
                      equalTo: "Not match with password",
                    },
                    accept_t_c: {
                      required: "This field is required",
                    },
                  
                },
                 errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.form-group') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         },
                submitHandler: function(form) {
                    form.submit();
                }
                
            });
    });

  </script>




