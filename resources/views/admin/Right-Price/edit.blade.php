@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if(session()->has('add'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('add') }}
            </div>
            @endif
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Right Price</span> / Edit</h4>

              <!-- Basic Layout -->
              
              <div class="row">
                <div class="col-xl">
                  
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('update-right-price/'.$rightprice_first->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" class="form-control" name="rightprice_title" id="rightprice_title" value="{{$rightprice_first->rightprice_title}}" />
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Sub title</label>
                            <input type="text" class="form-control" name="rightprice_subtitle" id="rightprice_subtitle" value="{{$rightprice_first->rightprice_subtitle}}" />
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Min price</label>
                           <input type="text" class="form-control" name="rightprice_min" id="rightprice_min" value="{{$rightprice_first->rightprice_min}}" />
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="basic-default-fullname">Max price</label>
                            <input type="text" class="form-control" name="rightprice_max" id="rightprice_max" value="{{$rightprice_first->rightprice_max}}" />
                          </div>
                          <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Image</label>
                            <input type="file" class="form-control" name="rightprice_img" id="rightprice_img">
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