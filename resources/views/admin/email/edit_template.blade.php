@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
           <!--  @if(session()->has('updatesuccess'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('updatesuccess') }}
            </div>
            @endif -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Email Template</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('email-tem-update/'.$edit_template->id)}}">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Template Name</label>
                          <input type="text" class="form-control" name="name" value="{{$edit_template->template_name}}" />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Send To</label>
                          <input type="text" class="form-control" name="name" value="{{$edit_template->send_to}}" />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Template Header</label>
                          <textarea class="ckeditor form-control" name="header_text" id="header_text">{{$edit_template->header}}</textarea>
                          
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Template Body</label>
                          <textarea class="ckeditor form-control" name="header_body" id="header_body">{{$edit_template->body}}</textarea>
                          
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Template Footer</label>
                          <textarea class="ckeditor form-control" name="header_footer" id="header_footer">{{$edit_template->footer}}</textarea>
                          
                        </div>
                        
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Change Status</label>

                          <select class="form-select" name="status" aria-label="Default select example">
                          <option value="0" {{ ( $edit_template->email_tem_status == 0) ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ ( $edit_template->email_tem_status == 1) ? 'selected' : '' }}>In Active</option>
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