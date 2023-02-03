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
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Blog</span> / Add</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('addblog')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Blog Title</label>
                            <input type="text" class="form-control" name="blog_title" id="blog_title" value="{{old('blog_title')}}" />
                            @if($errors->has('blog_title'))
                              <div class="error">{{ $errors->first('blog_title') }}</div>
                            @endif
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Slug</label>
                            <input type="text" class="form-control" name="blog_slug" id="blog_slug" value="{{old('blog_slug')}}" />
                            @if($errors->has('blog_slug'))
                              <div class="error">{{ $errors->first('blog_slug') }}</div>
                            @endif
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Posted By</label>
                            <select class="form-select" name="author_name" id="author_name" aria-label="Default select example">
                            <option value="">Select Author</option>
                            @foreach($author as $author_value)
                            <option value="{{$author_value->id}}">{{$author_value->author_name}}</option>
                            @endforeach
                          </select>
                          @if($errors->has('author_name'))
                            <div class="error">{{ $errors->first('author_name') }}</div>
                          @endif
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Select Category</label>
                            <select class="form-select" name="blog_category" id="blog_category" aria-label="Default select example">
                            <option value="">Select category name</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                          </select>
                          @if($errors->has('blog_category'))
                            <div class="error">{{ $errors->first('blog_category') }}</div>
                          @endif
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Blog Description</label>
                            <textarea class="ckeditor form-control" name="blog_des" id="blog_des">{{old('blog_des')}}</textarea>
                          </div>
                          @if($errors->has('blog_des'))
                            <div class="error">{{ $errors->first('blog_des') }}</div>
                          @endif
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Upload Blog Image</label>
                            <input class="form-control" type="file" name="blog_image" id="blog_image" />
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