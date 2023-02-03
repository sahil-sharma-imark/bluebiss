@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Subject</span> / Edit</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('subject-update/'.$get_by_id->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <!-- Section 1 -->
                          <!-- <h6 class="fw-bold py-3 mb-1"><span style="color:#47bbd0!important" class="text-muted fw-light">Heading</h6> -->
                          <div class="col-md-12 mb-1">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="{{$get_by_id->subject}}" />
                          </div>

                          <div class="col-md-12 mb-3">
                            <label class="form-label" for="basic-default-fullname">Slug</label>
                            <input type="text" class="form-control" name="subject_slug" id="subject_slug" value="{{$get_by_id->subject_slug}}" />
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