@include('layouts.header')

  <main id="main">
    <section class="contact-main">
      <div class="container">
          <div class="title">
            <div class="contact-text">{{$contactus_first->contactus_heading}}</div>

            <h1 class="heading-large">{{$contactus_first->contactus_title}}</h1>

            <p>{{$contactus_first->contactus_sub_title}}</p>
          </div>
          
          <div class="max-width-NF">
            <form method="POST" action="{{url('contact-store')}}">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-field">
                    <label>First Name *</label>  
                    <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Michelle" value="{{ old('name') }}">
                    <span class="text-danger" id="name-error"></span>
                    @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                  </div>
                </div>
  
                <div class="col-md-6">
                  <div class="form-field">
                    <label>Last Name</label>  
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="e.g Mohammed" value="{{ old('lastname') }}">
                    <span class="text-danger" id="lastname-error"></span>
                  </div>
                </div>
  
                <div class="col-md-6">
                  <div class="form-field">
                    <label>Mail *</label>
  
                    <div class="email-address-f ield">
                      <input type="text" class="form-control wrong-email" name="email" id="email" placeholder="youremail@gmail.com" value="{{ old('email') }}">
                      @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                      @endif
                    <span class="text-danger" id="email-error"></span>

  
                      <!-- <span class="info">i</span> -->
                    </div>
                  </div>
                </div>
  
                <div class="col-md-6">
                  <div class="form-field">
                    <label>Select a Subject *</label>
  
                    <select class="form-select form-control" name="subject" id="subject" aria-label="Default select example">
                      <option selected>-- Please select --</option>
                      @foreach($get_subjects as $get_subjects_value)
                      <option value="{{$get_subjects_value->subject}}">{{$get_subjects_value->subject}}</option>
                      @endforeach                      
                    </select>
                    <span class="text-danger" id="subject-error"></span>

                  </div>
                </div>
  
                <div class="col-md-12">
                  <div class="form-field">
                    <label>Message *</label>
  
                      <textarea class="form-control" name="message" id="message" placeholder="Describe your problem or question"></textarea>
                      @if($errors->has('message'))
                        <div class="error">{{ $errors->first('message') }}</div>
                      @endif
                    <span class="text-danger" id="message-error"></span>
                  </div>
                </div>
  
              </div>
  
              <p>{{$contactus_first->contactus_msg}}</p>
            
              <div class="send-btn-main">
                  <!-- <a class="btn" href="#">Send message</a> -->
                  <button type="submit" class="btn">Send message</button>
              </div>
            </form>
          </div>
      </div>
    </section>

  </main>


 
  @include('layouts.footer')
<div id="info" style="display: none;">
 Data Successfully inserted!
</div>
