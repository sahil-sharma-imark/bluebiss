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
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Subject</span> / Add</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('add-subject')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="{{old('subject')}}" />
                            @if($errors->has('subject'))
                              <div class="error">{{ $errors->first('subject') }}</div>
                            @endif
                          </div>
                          
                         
                        
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Slug</label>
                            <input type="text" class="form-control" name="subject_slug" id="subject_slug" value="{{old('subject_slug')}}" />
                            @if($errors->has('subject_slug'))
                              <div class="error">{{ $errors->first('subject_slug') }}</div>
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