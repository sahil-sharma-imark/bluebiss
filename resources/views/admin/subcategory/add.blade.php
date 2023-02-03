@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <!-- @if(session()->has('updatesuccess'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('updatesuccess') }}
            </div>
            @endif -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Sub Category</span> </h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('addsubcategory')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Category name</label>
                          <select class="form-select" name="cat_id" aria-label="Default select example">
                            <option>Select category name</option>
                            @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                          </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Sub-category name</label>
                            <input type="text" class="form-control" id="name" name="name" />
                            @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Category Image</label>
                            <input type="file" class="form-control" id="sub_cat_img" name="sub_cat_img" />
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