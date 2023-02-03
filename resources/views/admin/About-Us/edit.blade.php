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
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">About Us</span> / Edit</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('aboutus-update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <!-- Section 1 -->
                          <h6 class="fw-bold py-3 mb-1"><span style="color:#47bbd0!important" class="text-muted fw-light">Services delivered by the community for the community.</h6>
                          <div class="col-md-12 mb-1">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="sec1_title" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec1_title) ? $homepage_first_edit->sec1_title : '';?>" placeholder="change above text." />
                          </div>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <textarea class="ckeditor form-control" name="sec1_des" id="sec1_des"><?php echo isset($homepage_first_edit->sec1_des) ? $homepage_first_edit->sec1_des : '';?></textarea>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Image 1</label>
                            <input type="file" class="form-control" name="sec1_img_1" id="sec1_img_1">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Image 2</label>
                            <input type="file" class="form-control" name="sec1_img_2" id="sec1_img_2">
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Image 3</label>
                            <input type="file" class="form-control" name="sec1_img_3" id="sec1_img_3">
                          </div>


                          <!-- Section 2 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">Building Communities</span>-Section</h6>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="sec2_title" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec2_title) ? $homepage_first_edit->sec2_title : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <textarea class="ckeditor form-control" name="sec2_des" id="sec2_des"><?php echo isset($homepage_first_edit->sec2_des) ? $homepage_first_edit->sec2_des : '';?></textarea>
                          </div>
                          <div class="col-md-12 mt-3">
                            <div class="col-md-2" style="float:left; text-align: center;">
                              <label class="form-label" for="basic-default-fullname">6 m+</label>
                            </div>
                            <div class="col-md-5" style="float:left;">
                              <input type="text" class="form-control" name="sec2_point1_title" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec2_point1_title) ? $homepage_first_edit->sec2_point1_title : '';?>" placeholder="change above text." />
                            </div>
                            <div class="col-md-5" style="float:left;">
                              <input type="text" class="form-control" name="sec2_point1_des" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec2_point1_des) ? $homepage_first_edit->sec2_point1_des : '';?>" placeholder="change above text." />
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <div class="col-md-2" style="float:left; text-align: center;">
                              <label class="form-label" for="basic-default-fullname">10 k+</label>
                            </div>
                            <div class="col-md-5" style="float:left;">
                              <input type="text" class="form-control" name="sec2_point2_title" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec2_point2_title) ? $homepage_first_edit->sec2_point2_title : '';?>" placeholder="change above text." />
                            </div>
                            <div class="col-md-5" style="float:left;">
                              <input type="text" class="form-control" name="sec2_point2_des" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec2_point2_des) ? $homepage_first_edit->sec2_point2_des : '';?>" placeholder="change above text." />
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <div class="col-md-2" style="float:left; text-align: center;">
                              <label class="form-label" for="basic-default-fullname">$2b+</label>
                            </div>
                            <div class="col-md-5" style="float:left;">
                              <input type="text" class="form-control" name="sec2_point3_title" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec2_point3_title) ? $homepage_first_edit->sec2_point3_title : '';?>" placeholder="change above text." />
                            </div>
                            <div class="col-md-5" style="float:left;">
                              <input type="text" class="form-control" name="sec2_point3_des" id="rightprice_title" value="<?php echo isset($homepage_first_edit->sec2_point3_des) ? $homepage_first_edit->sec2_point3_des : '';?>" placeholder="change above text." />
                            </div>
                          </div>

                          <!-- Section 3 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">Developing And Promoting Standards</span>-Section</h6>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="sec3_title" id="sec3_title" value="<?php echo isset($homepage_first_edit->sec3_title) ? $homepage_first_edit->sec3_title : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <input type="text" class="form-control" name="sec3_des" id="sec3_title" value="<?php echo isset($homepage_first_edit->sec3_des) ? $homepage_first_edit->sec3_des : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Point 1</label>
                            <input type="text" class="form-control" name="sec3_p1" id="sec3_p1" value="<?php echo isset($homepage_first_edit->sec3_p1) ? $homepage_first_edit->sec3_p1 : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Point 2</label>  
                            <input type="text" class="form-control" name="sec3_p2" id="sec3_p2" value="<?php echo isset($homepage_first_edit->sec3_p2) ? $homepage_first_edit->sec3_p2 : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Point 3</label>
                            <input type="text" class="form-control" name="sec3_p3" id="sec3_p3" value="<?php echo isset($homepage_first_edit->sec3_p3) ? $homepage_first_edit->sec3_p3 : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Point 4</label>
                            <input type="text" class="form-control" name="sec3_p4" id="sec3_p4" value="<?php echo isset($homepage_first_edit->sec3_p4) ? $homepage_first_edit->sec3_p4 : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Point 5</label>
                            <input type="text" class="form-control" name="sec3_p5" id="sec3_p5" value="<?php echo isset($homepage_first_edit->sec3_p5) ? $homepage_first_edit->sec3_p5 : '';?>" placeholder="change above text." />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Point 6</label>
                            <input type="text" class="form-control" name="sec3_p6" id="sec3_p6" value="<?php echo isset($homepage_first_edit->sec3_p6) ? $homepage_first_edit->sec3_p6 : '';?>" placeholder="change above text." />
                          </div>


                          <!-- Section 4 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">Our Services</span>-Section</h6>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="sec4_title" id="sec4_title" value="<?php echo isset($homepage_first_edit->sec4_title) ? $homepage_first_edit->sec4_title : '';?>" placeholder="change above text." />
                          </div>

                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <textarea class="ckeditor form-control" name="sec4_des" id="sec4_des"><?php echo isset($homepage_first_edit->sec4_des) ? $homepage_first_edit->sec4_des : '';?></textarea>
                          </div>

                           <!-- Section 5 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">Our Team</span>-Section</h6>
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="sec5_title" id="sec5_title" value="<?php echo isset($homepage_first_edit->sec5_title) ? $homepage_first_edit->sec5_title : '';?>" placeholder="change above text." />
                          </div>

                          
                          

                          <!-- Section 6 -->

                          <h6 class="fw-bold mt-5"><span style="color:#47bbd0!important" class="text-muted fw-light">OUR PLATFORM</span>-Section</h6>


                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="sec6_title" id="sec6_title" value="<?php echo isset($homepage_first_edit->sec6_title) ? $homepage_first_edit->sec6_title : '';?>" />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <input type="text" class="form-control" name="sec6_des" id="sec6_des" value="<?php echo isset($homepage_first_edit->sec6_des) ? $homepage_first_edit->sec6_des : '';?>" />
                          </div>
                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Image1</label>
                            <input type="file" class="form-control" name="sec6_img1" id="sec6_img1">
                          </div>

                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Image 2</label>
                            <input type="file" class="form-control" name="sec6_img2" id="sec6_img2">
                          </div>

                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Image 3</label>
                            <input type="file" class="form-control" name="sec6_img3" id="sec6_img3">
                          </div>

                          <div class="col-md-12 mt-2">
                            <label class="form-label" for="basic-default-fullname">Image 4</label>
                            <input type="file" class="form-control" name="sec6_img4" id="sec6_img4">
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