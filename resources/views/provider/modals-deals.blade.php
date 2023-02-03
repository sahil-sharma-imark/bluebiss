<div class="ceate-listing-popup">
  <div class="modal fade" id="editdeal{{$deal_detail->id}}" aria-hidden="true" aria-labelledby="ceateNewlistingLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="ceate-listing-content">
          <div class="title"> 
            <h5>Describe Your Deal</h5>

          <p>This is your chance to impress potential customers with what this listing offers and why you’re the best person for the task.</p>
          </div>
          
          
          <form id="dealsdis" method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <div class="form-field">
              <label>Title</label>

              <p>Write a short title that accurately describes the service you'll provide</p>

              <input type="text" name="deal_title" id="deal_title" class="form-control" placeholder="e.g. Family and Newborn Photography">
              <span style="color: red"> @error('card_number'){{$deal_title}}@enderror</span>
            </div>

            <div class="form-field">
              <label>Description</label>

              <p>Please describe the service you are offering in detail</p>

              <textarea class="form-control" name="deal_desc" id="deal_desc" placeholder="Describe here"></textarea>
              <span style="color: red"> @error('card_number'){{$list_text}}@enderror</span>
            </div>

            <div class="form-field">
              <div class="row">
                <div class="col-md-4">
                  <label>MRP</label>
                  <p>Write a short title that accurately describes the service you'll provide</p>
                  <input type="text" name="deal_mrp" id="deal_mrp" class="form-control" placeholder="e.g. Family and Newborn Photography">
                  <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
                </div>
                <div class="col-md-4">
                  <label>Discount</label>
                  <p>Write a short title that accurately describes the service you'll provide</p>
                  <input type="text" name="deal_dis" id="deal_dis" class="form-control" placeholder="e.g. Family and Newborn Photography">
                  <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
                </div>
                <div class="col-md-4">
                  <label>Expiry</label>
                  <p>Write a short title that accurately describes the service you'll provide</p>
                  <input type="text" name="deal_expiry" id="deal_expiry" class="form-control" placeholder="e.g. Family and Newborn Photography">
                  <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                </div>
              </div>
            </div>

            <div class="form-field">
              <label>Detail Title</label>

              <p>Write a short title that accurately describes the service you'll provide</p>

              <input type="text" name="detail_title" id="detail_title" class="form-control" placeholder="e.g. Family and Newborn Photography">
              <span style="color: red"> @error('card_number'){{$detail_title}}@enderror</span>
            </div>

            <div class="form-field">
              <label>Detail Highlight</label>

              <p>Write a short title that accurately describes the service you'll provide</p>

              <input type="text" name="detail_highlight" id="detail_highlight" class="form-control" placeholder="e.g. Family and Newborn Photography">
              <span style="color: red"> @error('card_number'){{$detail_highlight}}@enderror</span>
            </div>

            <div class="form-field">
              <label>About Detail</label>

              <p>Please describe the service you are offering in detail</p>

              <textarea class="ckeditor form-control" name="detail_about" id="detail_about" placeholder="Describe here"></textarea>
              <span style="color: red"> @error('card_number'){{$detail_about}}@enderror</span>
            </div>

            <div id="deal_detail" class="form-field">
              <div class="row">
                <div class="col-md-3">
                  <label>Offer title</label>
                  <input type="text" name="offer_title[]" id="offer_title" class="form-control" required>
                  <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
                </div>
                <div class="col-md-3">
                  <label>Offer price</label>
                  <input type="text" name="offer_price[]" id="offer_price" class="form-control" required>
                  <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
                </div>
                <div class="col-md-3">
                  <label>Offer Dicount</label>
                  <input type="text" name="offer_discount[]" id="offer_discount" class="form-control" required>
                  <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                </div>

                <div class="col-md-3">
                  <label></label>
                  <button class="btn btn-success add_item_btn" style="margin-top:28px">Add</button>
                </div>
              </div>
            </div>

            <div class="form-field">
              <label>Add Image</label>

              <p>This is the first image potential customers see when viewing your listing</p>

              <div class="upload-box">
                <label class="upload-btn">
                  <p><i class="fa-solid fa-plus"></i></p>
                  <input type="file" name="deal_image" id="deal_image"  data-max_length="20" class="upload-inputfile">
                </label>
              </div>
              
            </div>

            <div class="form-field">
              <label>Add Details Images</label>

              <p>This is the first image potential customers see when viewing your listing</p>

              <div class="upload-box">
                <label class="upload-btn">
                  <p><i class="fa-solid fa-plus"></i></p>
                  <input type="file" multiple="multiple" name="details_images[]" data-max_length="20" class="upload__inputfile">
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