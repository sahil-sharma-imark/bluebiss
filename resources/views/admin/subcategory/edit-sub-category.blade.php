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
                      <form method="POST" action="{{url('update-subcat/'.$sub_cat_detail->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Category name</label>
                          <select class="form-select" name="cat_id" aria-label="Default select example">
                            <option>Select category name</option>
                            @foreach($cat_details as $cat_detail)
                            <option value="{{$cat_detail->id}}" {{ ( $sub_cat_detail->catid == $cat_detail->id) ? 'selected' : '' }}>{{$cat_detail->name}}</option>
                            @endforeach
                          </select>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Sub-category name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$sub_cat_detail->name}}" />
                            @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">On Desktop</label>
                          <select class="form-select" name="show_desk" aria-label="Default select example">
                            <option>Select </option>
                            <option value="0" {{ ( $sub_cat_detail->show_sub_cat == 0) ? 'selected' : '' }}>Yes</option>
                            <option value="1" {{ ( $sub_cat_detail->show_sub_cat == 1) ? 'selected' : '' }}>No</option>
                          </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">On Desktop</label>
                          <select class="form-select" name="sub_status" aria-label="Default select example">
                            <option>Select </option>
                            <option value="0" {{ ( $sub_cat_detail->cat_status == 0) ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ ( $sub_cat_detail->cat_status == 1) ? 'selected' : '' }}>In-Active</option>
                          </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Category Image</label>
                            <input type="file" class="form-control" id="sub_cat_img" name="sub_cat_img" />
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