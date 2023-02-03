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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User/</span> {{$update_user->name.' '.$update_user->lastname}}</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('users-update-detail/'.$update_user->id)}}">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">First Name</label>
                          <input type="text" class="form-control" name="name" value="{{$update_user->name}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Last Name</label>
                          <input type="text" class="form-control" name="lastname" value="{{$update_user->lastname}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Email ID</label>
                          <input type="text" class="form-control" name="email" value="{{$update_user->email}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Status</label>
                          <select class="form-select" name="status" aria-label="Default select example">
                            <option value="0" {{ ( $update_user->status == 0) ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ ( $update_user->status == 1) ? 'selected' : '' }}>In Active</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Number</label>
                          <input type="text" class="form-control" name="number" value="{{$update_user->number}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label"  for="basic-default-fullname">Gender</label>
                          <input type="text" class="form-control" name="gender" value="{{$update_user->gender}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Date of birth</label>
                          <input type="text" class="form-control" name="dob" value="{{$update_user->dob}}" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Company Type</label>
                          <select class="form-select" name="company_type" id="company_type" aria-label="Default select example">
                            <option value="1" {{ ( $update_user->company_type == 1) ? 'selected' : '' }}>Sole proprietor</option>
                            <option value="2" {{ ( $update_user->company_type == 2) ? 'selected' : '' }}>Registered sole trader</option>
                            <option value="3" {{ ( $update_user->company_type == 3) ? 'selected' : '' }}>Registered partnership</option>
                            <option value="4" {{ ( $update_user->company_type == 4) ? 'selected' : '' }}>Limited liability</option>
                            <option value="5" {{ ( $update_user->company_type == 5) ? 'selected' : '' }}>Other</option>
                          </select>
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