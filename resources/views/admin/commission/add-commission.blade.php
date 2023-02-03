@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
             @if(session()->has('Commission'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('Commission') }}
            </div>
            @endif
            <!-- Content -->
            <!-- @if(session()->has('updatesuccess'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('updatesuccess') }}
            </div>
            @endif -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Commission</span> </h4>
              

              <!-- Basic Layout -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('add_comm')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-form-label" for="basic-default-name">Ahlookin commission in %</label>
                          <input type="text" class="form-control" name="admin_comm"  placeholder="Admin Commission in %" value="{{$get_percentage->commission}}" />
                          
                        </div>
                        
                        
                        
                        
                        <div class="row justify-content-end">
                          <div class="col-sm-12" style="padding-left:0px!important">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
                
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')