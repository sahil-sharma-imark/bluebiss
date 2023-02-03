<?php
foreach($value_edit as $value_edit_value){   
  $table_listed_services = DB::table("listed_services")->where("listing_id",$value_edit_value)->first();

  $category_name = DB::table("sub_category")->where("name",$table_listed_services->service_name)->first();
  



  ?>
<div class="ceate-listing-popup">
  <div class="modal fade" id="editlisting<?php echo $value_edit_value; ?>" aria-hidden="true" aria-labelledby="ceateNewlistingLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="ceate-listing-content">
          <div class="title"> 
            <h5>Select Your Services</h5>

          
          </div>
          
          <form id="edit_list" method="POST" action="{{url('edit-listing/'.$value_edit_value)}}"  enctype="multipart/form-data">
            @csrf
            <?php
            $all_category = DB::table('sub_category')->where('sub_cat_status',0)->get();
            ?>
            <div class="form-field">
              <label>Services Offered Category</label>
              <input type="text" list="cars" name="subject" id="cars" value="{{$table_listed_services->category}}" alt="This is read only field" placeholder="Start typing to find services" readonly style="background-color: #FAEEEB;" / >
              
            </div>

            <div class="form-field">
              <label>Category</label>
              <div id="kdedit"></div>
              <input  type="text" name="" id="hidesubedit" value="{{$table_listed_services->service_name}}" readonly style="background-color: #FAEEEB;" class="form-control"  
                placeholder="Select Sub Category">
              <small></small>
            </div>


            <!-- <div class="form-field">
              <label>Title</label>

              <p>Write a short title that accurately describes the service you'll provide</p>

              <input type="text" value="{{$table_listed_services->service_name}}" name="edit_title" id="edit_title" class="form-control" placeholder="e.g. Family and Newborn Photography">
              <span style="color: red"> @error('card_number'){{$title}}@enderror</span>
            </div> -->

            <!-- <div class="form-field">
              <label>Description</label>

              <p>Please describe the service you are offering in detail</p>

              <textarea class="form-control" name="edit_list_text" id="edit_list_text" placeholder="Describe here">{{$table_listed_services->service_des}}</textarea>
              <span style="color: red"> @error('card_number'){{$list_text}}@enderror</span>
            </div> -->

            <div class="form-field">
              <label>Add Image</label>

              <p>This is the first image potential customers see when viewing your listing</p>

              <div class="upload-box">
                <label class="upload-btn">
                  <p><i class="fa-solid fa-plus"></i></p>
                  
                  <input type="file" name="edit_list_img" id="edit_list_img" data-max_length="20" class="upload-inputfile">

                </label>
              </div>
              
            </div>

            

            <div class="create-btn">
              <a href="#" class="btn gray-br-btn">Cancel</a>
              <!-- <a href="#" class="btn btn-primary">Save</a> -->
              <button class="btn btn-primary">Save</button>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div>
</div>
<?php }?>
