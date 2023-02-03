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
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Image Link</span> / Edit</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('update-image-link/'.$get_image_byid->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">

                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Image<span style="color:red;">*</span></label><br><img src="{{asset('uploads/admin/image-link/'.$get_image_byid->image_link_img)}}" style="height: 50px; width: auto;">
                            <input type="file" class="form-control mt-3" name="image_link_img" id="image_link_img">
                            @if($errors->has('image_link_img'))
                              <div class="error">{{ $errors->first('image_link_img') }}</div>
                            @endif
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

