@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if(session()->has('contact-edit'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('contact-edit') }}
            </div>
            @endif
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Contact Us</span> / Edit</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('contactus-update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <!-- Section 1 -->
                          <!-- <h6 class="fw-bold py-3 mb-1"><span style="color:#47bbd0!important" class="text-muted fw-light">Heading</h6> -->
                          <div class="col-md-12 mb-1">
                            <label class="form-label" for="basic-default-fullname">Heading</label>
                            <input type="text" class="form-control" name="contactus_heading" id="contactus_heading" value="<?php echo isset($contactus_edit->contactus_heading) ? $contactus_edit->contactus_heading : '';?>" placeholder="change above text." />
                          </div>

                          <div class="col-md-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="contactus_title" id="contactus_title" value="<?php echo isset($contactus_edit->contactus_title) ? $contactus_edit->contactus_title : '';?>" placeholder="change above text." />
                          </div>

                          <div class="col-md-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">Sub Title</label>
                            <input type="text" class="form-control" name="contactus_sub_title" id="contactus_sub_title" value="<?php echo isset($contactus_edit->contactus_sub_title) ? $contactus_edit->contactus_sub_title : '';?>" placeholder="change above text." />
                          </div>


                          <!-- Section 6 -->


                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Message Description</label>         
                            <textarea class="form-control" name="contactus_msg" id="contactus_msg"><?php echo isset($contactus_edit->contactus_msg) ? $contactus_edit->contactus_msg : '';?></textarea>
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

<!-- for ckeditor -->
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>