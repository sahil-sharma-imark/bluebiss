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
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Image Link</span> / Add</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('add-image-link')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          
                          <!-- <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Note</label>
                            <input type="text" class="form-control" name="note" id="note" value="{{ old('name') }}" />
                            @if($errors->has('note'))
                              <div class="error">{{ $errors->first('note') }}</div>
                            @endif
                          </div> -->

                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Image<span style="color:red;">*</span></label>
                            <input type="file" class="form-control" name="image_link_img" id="testimonial_img">
                            @if($errors->has('image_link_img'))
                              <div class="error">{{ $errors->first('image_link_img') }}</div>
                            @endif
                          </div>

                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Slug<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="image_link_slug" id="testimonial_slug" value="{{ old('testimonial_slug') }}" />
                            @if($errors->has('image_link_slug'))
                              <div class="error">{{ $errors->first('image_link_slug') }}</div>
                            @endif
                          </div>

                          
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')

<!-- for ckeditor -->
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>