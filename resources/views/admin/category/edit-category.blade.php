@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if(session()->has('updatesuccess'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('updatesuccess') }}
            </div>
            @endif
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Update/</span> {{$cat_detail->name}}</h4>
               
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('update-category/'.$cat_detail->id)}}">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Name</label>
                          <input type="text" class="form-control" name="name" value="{{$cat_detail->name}}" />
                          @if($errors->has('name'))
                              <div class="error">{{ $errors->first('name') }}</div>
                          @endif
                        </div>
                        
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Status</label>
                          <select class="form-select" name="status" aria-label="Default select example">
                            <option value="0" {{ ( $cat_detail->sub_cat_status == 0) ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ ( $cat_detail->sub_cat_status == 1) ? 'selected' : '' }}>In Active</option>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Reflect on desktop</label>
                          <select class="form-select" name="show_desk" aria-label="Default select example">
                            <option value="0" {{ ( $cat_detail->show_desk == 0) ? 'selected' : '' }}>Yes</option>
                            <option value="1" {{ ( $cat_detail->show_desk == 1) ? 'selected' : '' }}>No</option>
                          </select>
                        </div>
                        <div class="col-xl">
                          <label class="form-label" for="basic-default-fullname">Category Image</label>
                          <input type="file" class="form-control" id="cat_img" name="cat_img" />
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