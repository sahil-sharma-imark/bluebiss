@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if(session()->has('homepage-edit'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('homepage-edit') }}
            </div>
            @endif
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Home Page</span> / Edit</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('homepage-update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <!-- Section 1 -->
                          <h6 class="fw-bold py-3 mb-1"><span style="color:#47bbd0!important" class="text-muted fw-light">Find local professionals for just about anything.</span> - Section</h6>
                          <div class="col-md-12 mb-1">
                            <label class="form-label" for="basic-default-fullname">Find local professionals for just about anything.</label>
                            <input type="text" class="form-control" name="sec1_title" id="sec1_title" value="<?php echo isset($homepage_first_edit->sec1_title) ? $homepage_first_edit->sec1_title : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Background Image</label>
                            <input type="file" class="form-control" name="sec1_img" id="sec1_img">
                          </div>


                          <!-- Section 2 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">What do you need done?</span>-Section</h6>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">What do you need done?</label>
                            <input type="text" class="form-control" name="sec2_title" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec2_title) ? $homepage_first_edit->sec2_title : '';?>" placeholder="change above text." />
                          </div>

                          <!-- Section 3 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">Browse popular categories</span>-Section</h6>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Browse popular categories</label>
                            <input type="text" class="form-control" name="sec3_title" id="sec3_title" value="<?php echo isset($homepage_first_edit->sec3_title) ? $homepage_first_edit->sec3_title : '';?>" placeholder="change above text." />
                          </div>

                          <!-- Section 4 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">How does bluelbis work?</span>-Section</h6>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">How does bluelbis work?</label>
                            <input type="text" class="form-control" name="sec4_title" id="sec4_title" value="<?php echo isset($homepage_first_edit->sec4_title) ? $homepage_first_edit->sec4_title : '';?>" placeholder="change above text." />
                          </div>

                           <!-- Section 5 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">100% Happiness Guarantee!</span>-Section</h6>
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="sec5_title" id="sec4_title" value="<?php echo isset($homepage_first_edit->sec5_title) ? $homepage_first_edit->sec5_title : '';?>" placeholder="change above text." />
                          </div>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <textarea class="ckeditor form-control" name="sec5_des" id="sec5_des"><?php echo isset($homepage_first_edit->sec5_des) ? $homepage_first_edit->sec5_des : '';?></textarea>
                          </div>
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Image</label>
                           <input type="file" class="form-control" name="sec5_img" id="sec5_img">
                          </div>

                          <!-- Section 6 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">Thousands of Happy Customer</span>-Section</h6>


                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">What customers are saying</label>
                            <input type="text" class="form-control" name="sec6_subtitle" id="sec6_subtitle" value="<?php echo isset($homepage_first_edit->sec6_subtitle) ? $homepage_first_edit->sec6_subtitle : '';?>" />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Thousands of Happy Customer</label>
                            <input type="text" class="form-control" name="sec6_title" id="sec6_title" value="<?php echo isset($homepage_first_edit->sec6_title) ? $homepage_first_edit->sec6_title : '';?>" />
                          </div>


                          <!-- Section 7 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">Get the right price for your task</h6>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Get the right price for your task</label>
                            <input type="text" class="form-control" name="sec7_title" id="sec7_title" value="<?php echo isset($homepage_first_edit->sec7_title) ? $homepage_first_edit->sec7_title : '';?>" />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">The Oneflare Cost Guide Centre is your one-stop shop to help you set your budget; from smaller tasks to larger projects.</label>
                            <input type="text" class="form-control" name="sec7_subtitle" id="sec7_subtitle" value="<?php echo isset($homepage_first_edit->sec7_subtitle) ? $homepage_first_edit->sec7_subtitle : '';?>" />
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

<!-- for ckeditor -->
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>