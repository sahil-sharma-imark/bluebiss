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
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Setting</span> </h4>
              

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('update-dashboard-setting')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Logo</label>
                            @if(isset($get_logo->logo_img))
                            <br>
                            <img class="mb-1" src="{{asset('uploads/admin/setting/'.$get_logo->logo_img)}}" alt="">
                            @endif
                            <input type="file" class="form-control" id="logo_img" name="logo_img" />
                          </div>
                          
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Favicon</label>
                            @if(isset($get_logo->favicon_img))
                            <br>
                            <img class="mb-1" src="{{asset('uploads/admin/setting/'.$get_logo->favicon_img)}}" alt="">
                            @endif
                            <input type="file" class="form-control" id="favicon_img" name="favicon_img" />
                          </div>
                          
                          <div class="col-md-12 mt-5">
                            <label class="form-label" for="basic-default-fullname">Social Media</label>
                            
                            <input type="url" class="form-control mt-2" id="setting_facebook_link" name="setting_facebook_link" value="{{ isset($get_logo->setting_facebook_link) ? $get_logo->setting_facebook_link : '' }}" placeholder="Facebook Link" />
                            <input type="text" class="form-control mt-2" id="setting_insta_link" name="setting_insta_link" value="{{ isset($get_logo->setting_insta_link) ? $get_logo->setting_insta_link : '' }}" placeholder="Insta Link" />
                            <input type="text" class="form-control mt-2" id="setting_twitter_link" name="setting_twitter_link" value="{{ isset($get_logo->setting_twitter_link) ? $get_logo->setting_twitter_link : '' }}" placeholder="Twitter Link" />
                            <input type="text" class="form-control mt-2" id="setting_youtube_link" name="setting_youtube_link" value="{{ isset($get_logo->setting_youtube_link) ? $get_logo->setting_youtube_link : '' }}" placeholder="Youtube Link" />
                            <input type="text" class="form-control mt-2" id="setting_tiktok_link" name="setting_tiktok_link" value="{{ isset($get_logo->setting_tiktok_link) ? $get_logo->setting_tiktok_link : '' }}" placeholder="Tiktok Link" />
                            
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