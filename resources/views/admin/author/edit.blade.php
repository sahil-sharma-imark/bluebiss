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
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Author</span> / Edit</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('update-author/'.$get_author_byid->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">

                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Author Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control mt-3" name="author_name" id="author_name" value="{{$get_author_byid->author_name}}">
                            
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

