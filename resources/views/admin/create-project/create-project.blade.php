@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if(session()->has('create_project'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('create_project') }}
            </div>
            @endif
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Create Project</span></h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('create-project-update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <textarea class="ckeditor form-control" name="create_project_detail" id="create_project_detail">{{$create_project ? $create_project->create_project_detail : '';}}</textarea>
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

