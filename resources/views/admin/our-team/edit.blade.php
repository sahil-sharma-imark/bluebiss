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
                      <form method="POST" action="{{url('update-team/'.$team_first->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Name<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="team_name" id="team_name" value="{{$team_first->team_name}}" />
                            @if($errors->has('team_name'))
                              <div class="error">{{ $errors->first('team_name') }}</div>
                            @endif
                          </div>
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Designation<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="team_designation" id="profile" value="{{$team_first->team_designation}}" />
                            @if($errors->has('team_designation'))
                              <div class="error">{{ $errors->first('team_designation') }}</div>
                            @endif
                          </div>
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Image</label>
                            <img src="{{asset('uploads/admin/team/'.$team_first->team_img)}}" style="height: 25px; width: auto;">
                            <input type="file" class="form-control" name="team_img" id="team_img">
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