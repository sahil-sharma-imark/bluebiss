@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if(session()->has('add'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('add') }}
            </div>
            @endif
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Testimonial</span> / Edit</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('update-testimonial/'.$testimonial_first->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$testimonial_first->name}}" />
                            @if($errors->has('name'))
                              <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Profile</label>
                            <input type="text" class="form-control" name="profile" id="profile" value="{{$testimonial_first->profile}}" />
                          </div>
                          <div class="col-md-6 mt-3">
                            <label class="form-label" for="basic-default-fullname">Star<span style="color:red">*</span></label>
                           <input type="text" class="form-control" name="testimonial_star" id="testimonial_star" value="{{$testimonial_first->testimonial_star}}" />
                           @if($errors->has('testimonial_star'))
                              <div class="error">{{ $errors->first('testimonial_star') }}</div>
                            @endif
                          </div>
                          <div class="col-md-6 mt-3">
                            <label class="form-label" for="basic-default-fullname">Status</label>
                            <select class="form-select" name="testimonials_status" aria-label="Default select example">
                            <option value="0" {{ ( $testimonial_first->testimonial_slug == 0) ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ ( $testimonial_first->testimonial_slug == 1) ? 'selected' : '' }}>In Active</option>
                          </select>
                          </div>
                          
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Image</label>
                            <input type="file" class="form-control" name="testimonial_img" id="testimonial_img">
                          </div>
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <textarea class="ckeditor form-control" name="testimonials_text" id="testimonials_text">{{$testimonial_first->testimonials_text}}</textarea>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')

