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
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Header Top</span> / Add</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('add-header-top')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title One<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="title_one" id="title_one" value="{{ old('title_one') }}" />
                            @if($errors->has('title_one'))
                              <div class="error">{{ $errors->first('title_one') }}</div>
                            @endif
                          </div>
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Title Two<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="title_two" id="title_two" value="{{ old('title_two') }}" />
                            @if($errors->has('title_two'))
                              <div class="error">{{ $errors->first('title_two') }}</div>
                            @endif
                          </div>
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Icon</label>
                            <input type="file" class="form-control" name="icon" id="icon">
                          </div>
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Slug<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="header_slug" id="header_slug" value="{{ old('header_slug') }}" />
                            @if($errors->has('header_slug'))
                              <div class="error">{{ $errors->first('header_slug') }}</div>
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