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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add / FAQ</span> </h4>
              

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('add-faq')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Question</label>
                            <input type="text" class="form-control" id="cat_name" name="faq_question" />
                            <div class="error"></div>
                          </div>


                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Answer</label>
                            <textarea class="form-control" rows="10" name="faq_answer" id=""></textarea>
                            <div class="error"></div>
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