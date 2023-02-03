@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Provider/</span> {{$show_user->name.' '.$show_user->lastname}}</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">First Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$show_user->name}}" readonly />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Last Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$show_user->lastname}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Email ID</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$show_user->email}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Number</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$show_user->number}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Gender</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$show_user->gender}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Date of birth</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{date('d-M-Y', strtotime($show_user->dob))}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Created at</label>
                          <input type="text" class="form-control" id="basic-default-company" value="{{date('d-M-Y', strtotime($show_user->created_at))}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Created at</label>
                          <input type="text" class="form-control" id="basic-default-company" value="{{date('d-M-Y', strtotime($show_user->updated_at))}}" readonly/>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')