@include('layouts.header')

  <main id="main">
    @if(session()->has('dealupdtae'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('dealupdtae') }}
    </div>
    @endif

    <section class="clean-solutions">
      <div class="container">
        <ul class="inner-page-links">
          <li><a href="#">Home</a></li>
          <li>Clean Indoor Solutions</li>
        </ul>

        <div class="clean-solutions-title">
          <h3>{{$deal_detail->detail_title}}</h3>

          <p>{{$deal_detail->deal_title}}</p>
        </div>
        @php
        $detail_images = json_decode($deal_detail->details_images, true)
        @endphp
        <div class="clean-solutions-wrppar">
          <div class="clean-solutions-left">
            <div class="slider clean-solutions-Slider">
              @if(isset($detail_images))
              @foreach($detail_images as $detail_image)
              <div class="item">
                <figure>
                  <img src="{{asset('uploads/provider/detail_image/'.$detail_image)}}" alt="">
                </figure>
              </div>
              @endforeach
              @endif
            </div>
            <div class="slider slider-nav">
              @if(isset($detail_images))
              @foreach($detail_images as $detail_image)
              <div class="item">
                <figure>
                  <img src="{{asset('uploads/provider/detail_image/'.$detail_image)}}" alt="">
                </figure>
              </div>
              @endforeach
              @endif
            </div>

            <div class="clean-solut-content">
              <h4>Highlights</h4>
             <p>{{$deal_detail->detail_highlight}}</p>
            </div>


            <div class="clean-solut-content">
              <h4>About This Deal</h4>
              @php
              echo $deal_detail->detail_about;
              @endphp
            </div>
          </div>
          @php
          $offer_title = json_decode($deal_detail->offer_title, true);
          $offer_price = json_decode($deal_detail->offer_price, true);
          $offer_discount = json_decode($deal_detail->offer_discount, true);
          $len = count($offer_title);
          @endphp

          <div class="clean-solutions-right">

            @for($i=0; $i<=$len-1; $i++)
            <label class="discountBox">
              <input class="discount-check" type="radio" name="discount">

              <div class="discountBox-cnt">
                <p>{{$offer_title[$i]}}</p>

                <div class="discount-price">
                  <del>${{$offer_price[$i]}}</del>
                  <span>${{$offer_price[$i]-$offer_price[$i]*$offer_discount[$i]/100}}</span>
                  <small>{{$offer_discount[$i]}}% Off</small>
                </div>

                 
              </div>
          </label>
          @endfor

          <?php $edit_deal = DB::table('deals')->where('id',$deal_detail->id)->first(); ?> 
          

                <!-- Edit Deal Start -->
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
                          
                          
                          <form id="dealsdis" method="POST" action="{{url('update-deal-detail/'.$edit_deal->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-field">
                            <label>Category</label>
                            <select name="deal_cat_id" class="form-control">
                              <option>Select Category</option>
                              @foreach($all_categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              
                              @endforeach
                            </select>
                          </div>
                          
                            <div class="form-field">
                              <label>Title</label>

                              <input type="text" name="deal_title" id="deal_title" value="{{$edit_deal->deal_title}}" class="form-control" placeholder="e.g. Family and Newborn Photography">
                              <span style="color: red"> @error('card_number'){{$deal_title}}@enderror</span>
                            </div>

                            <div class="form-field">
                              <label>Description</label>

                              <textarea class="form-control" name="deal_desc" id="deal_desc" placeholder="Describe here">{{$edit_deal->deal_description}}</textarea>
                              <span style="color: red"> @error('card_number'){{$list_text}}@enderror</span>
                            </div>

                            <div class="form-field">
                              <div class="row">
                                <div class="col-md-12">
                                  <label>Expiry</label>
                                  <input type="date" name="deal_expiry" id="deal_expiry" class="form-control date-field valid success-alert" value="{{$edit_deal->deal_expiry}}" placeholder="e.g. Family and Newborn Photography">
                                  <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                                </div>
                              </div>
                            </div>                            

                            <div class="form-field">
                              <label>Detail Highlight</label>

                              <input type="text" name="detail_highlight" id="detail_highlight" class="form-control" value="{{$edit_deal->detail_highlight}}" placeholder="e.g. Family and Newborn Photography">
                              <span style="color: red"> @error('card_number'){{$detail_highlight}}@enderror</span>
                            </div>

                            <div class="form-field">
                              <label>About Detail</label>

                              <textarea class="ckeditor form-control" name="detail_about" id="detail_about" placeholder="Describe here">{{$edit_deal->detail_about}}</textarea>
                              <span style="color: red"> @error('card_number'){{$detail_about}}@enderror</span>
                            </div>

                            <div id="deal_detail_edit" class="form-field">


                                <div class="row">
                                  

                                  <div class="col-md-3">
                                    <input type="button" class="btn btn-danger add_item_btn " style="margin-top:28px" value="Add">
                                  </div>
                                </div>

                                <?php
                              $offer_titles = json_decode($edit_deal->offer_title, true);
                              $offer_price = json_decode($edit_deal->offer_price, true);
                              $offer_discount = json_decode($edit_deal->offer_discount, true);
                              $count = count($offer_titles);
                              for($i=0; $i<=$count-1; $i++){?>
                                <div class="row mt-2">
                                  <div class="col-md-12" style="float: left;">
                                    <div class="col-md-4" style="float: left;">
                                      <input type="text" name="offer_title[]" id="offer_title" class="form-control" value="<?php echo $offer_titles[$i];?>" required>
                                      <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
                                    </div>
                                    <div class="col-md-4" style="float: left;">
                                      <input type="text" name="offer_price[]" id="offer_price" value="<?php echo $offer_price[$i];?>" class="form-control offerpri" required>
                                      <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
                                    </div>
                                    <div class="col-md-4" style="float: left;">
                                      <input type="text" name="offer_discount[]" id="offer_discount" value="<?php echo $offer_discount[$i];?>" class="form-control offerdis" alt="editcom{{$i}}" editprovider="editpro{{$i}}" required>
                                      <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                                    </div>
                                    
                                  </div>
                                  <?php 
                                  $admin = $offer_price[$i]-$offer_price[$i]*$offer_discount[$i]/100;
                                  $admin_get = $admin*20/100; 
                                  $providerget = $admin-$admin_get; ?>
                                  <div class="col-md-12 mt-1">
                                    <div class="col-md-5" style="float: left;">
                                      <input type="text" name="" id="editcom{{$i}}" value="<?php echo $admin_get; ?>- Admin Commission" class="form-control editcom" placeholder="Admin Commission"  readonly>
                                      <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                                    </div>
                                    <div class="col-md-5" style="float: left;">
                                      <input type="text" name="" id="editpro{{$i}}" value="<?php echo $providerget; ?>- Credit to provider" class="form-control editpro" placeholder="The amount that provider will get." readonly>
                                      <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                                    </div>
                                    <div class="col-md-2" style="float: left;">
                                      <input type="button" class="btn btn-danger remove_item_btn " style="margin-top:0px" value="Remove">
                                    </div>
                                  </div>
                                  </div>
                                <?php }
                                ?>
                              </div>

                            <div class="form-field">
                              <label>Add Image</label>
                            <p>This will be reflect in Deal & Discount list page</p>
                            <div class="upload-box">
                              <label class="upload-btn" style="width:50%!important; float:left">
                                <p><i class="fa-solid fa-plus"></i></p>
                                <!-- <input type="file" name="deal_image" id="deal_image" class="upload-inputfile"> -->
                                <input accept="image/*" name="deal_image" type='file' id="imgInp" />
                              </label>
                              <label class="upload-btn" style="width:50%!important; border: none; float:left">
                                <img id="blah" src="#" alt="your image" style="height:100%; width:auto" />
                              </label>
                            </div>
                              
                            </div>

                            <!-- Multiple Image -->


<div class="form-field business-detail task-detail-sec">
  <div class="wrap_bg task-detail" style="padding:0px!important; margin:0px!important ; width:100%">
          <div class="check-box-listMain" id="hi">
            <div class="demo_work" style="margin-top:100px">
              <div class="form-field mb-0">
                <label>Would you like to add pictures?</label>
              </div>
              <div class="upload__box" >
                <div class="upload__img-wrap">
                  <div class="upload__btn-box">
                    <label class="upload__btn upload-box-bg">
                      <p class="plus-circle">
                        <svg viewBox="0 0 31 31">
                          <g id="Group_54735" data-name="Group 54735" transform="translate(-518.292 -314.292)">
                            <circle id="Ellipse_676" data-name="Ellipse 676" cx="14.5" cy="14.5" r="14.5" transform="translate(519.292 315.292)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-width="2" />
                            <g id="Group_41342" data-name="Group 41342" transform="translate(526.216 322.215)">
                              <line id="Line_239" data-name="Line 239" y2="14.907" transform="translate(7.335 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-width="2" />
                              <line id="Line_240" data-name="Line 240" y2="14.67" transform="translate(14.67 7.453) rotate(90)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-width="2" />
                            </g>
                          </g>
                        </svg>
                      </p>
                      <input type="file" multiple="" data-max_length="20" name="details_images[]" id="task_image" class="upload__inputfile">
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
                          <!-- Multiple Image End -->

                            <!-- <div class="form-field">
                              <label>Add Details Images</label>

                              <p>This is the first image potential customers see when viewing your listing</p>

                              <div class="upload-box">
                                <label class="upload-btn">
                                  <p><i class="fa-solid fa-plus"></i></p>
                                  <input type="file" multiple="multiple" name="details_images[]" data-max_length="20" class="upload__inputfile">
                                </label>
                              </div>
                              
                            </div> -->
                            <div class="form-field" style="margin-bottom: 10px;">
                              <div class="late_check">
                                <div class="checkBox">
                                  <label for="Money">
                                    <input type="checkbox" id="Money" name="drafts_status" value="1"><span></span> Save in drafts
                                  </label>
                                </div>
                              </div>
                            </div>

                            <div class="form-field">
                              <div class="late_check">
                                <div class="checkBox">
                                  <label for="Money">
                                    <input type="checkbox" id="Money" name="tcdeal" value="1" checked><span></span> I Agree to the <span>Terms of Service</span></label>@if($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                    
                                </div>
                              </div>
                            </div>

                            <div class="create-btn">
                              <a href="#" class="btn gray-br-btn" data-bs-dismiss="modal">Cancel</a>
                              <!-- <a href="#" class="btn btn-primary">Save</a> -->
                              <button class="btn btn-primary">Save</button>
                            </div>
                          </form>

                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Deal Edit -->


        <div class="btns">
          <!-- <a class="btn" href="#editdeal{{$deal_detail->id}}">Edit</a>
           --><a class="btn" data-bs-toggle="modal" href="#editdeal{{$deal_detail->id}}" role="button">Edit</a>
          <a class="btn" href="{{url('delete-deal/'.$deal_detail->id)}}">Delete</a>
        </div>

          </div>
        </div>
      </div>
    </section>

  </main>
  @include("provider.modals-deals")
  @include('layouts.footer')


  <script>
  $(document).ready(function(){
    $(".add_item_btn").click(function(e){
      e.preventDefault();
      $("#deal_detail_edit").prepend(`<div class="row mb-4" style="padding-right:0px!important; padding-left:0px!important">
      
        <div class="col-md-4" style="float: left; padding-right:0px!important; padding-left:0px!important">
        <input type="text" name="offer_title[]" id="offertitle" class="form-control" placeholder="Offer title" required>
        <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
        </div>

        <div class="col-md-4" style="float: left; padding-right:0px!important; padding-left:0px!important">
          <input type="text" name="offer_price[]" id="offerprice" class="form-control offerprice" placeholder="Offer price" required>
          <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
        </div>
        <div class="col-md-4" style="float: left; padding-right:0px!important; padding-left:0px!important">
          <input type="text" name="offer_discount[]" id="offerdiscount" class="form-control offerdiscount" placeholder="Offer Dicount in %" required>
          <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
        </div>
      
        <div class="col-md-5" style="float: left; padding-right:0px!important; padding-left:0px!important;margin-top:2px">
          <input type="text" name="" id="com" class="form-control com" placeholder="Admin Commission" readonly>
          <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
        </div>

        <div class="col-md-5" style="float: left; padding-right:0px!important; padding-left:0px!important;margin-top:2px">
        <input type="text" name="" id="provider_com" class="form-control provider_com" placeholder="The amount that provider will get." readonly>
        <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
        </div>

        <div class="col-md-2" style="float: left; padding-right:0px!important; padding-left:0px!important; margin-top:2px">
          <button class="btn btn-danger remove_item_btn">Remove</button>
        </div>
        
      
      </div>`);
    });
    $(document).on('click','.remove_item_btn', function(e){
      e.preventDefault();
      let row_item = $(this).parent().parent();
      $(row_item).remove();
    });
  });


</script>


<script type="text/javascript">
  $("body").on("blur",".offerpri",function(){
    var offerpri = $(this).val();


  });
  
 
 $("body").on("blur",".offerdis",function(){
    
    var offerpri = $(".offerpri").val();

    var offerdis = $(this).val();
   var offerdis_name = $(this).attr('alt');
   var editprovider = $(this).attr('editprovider');
    //var providerget = offerpri-offerpri*offerdis/100
    var admi = offerpri-offerpri*offerdis/100

    var adminget = admi*20/100

    var provider_com = admi-admi*20/100
  $("#"+offerdis_name).val("$"+adminget+" - Admin Commission")
  $("#"+editprovider).val("$"+provider_com+" - Credit to provider")
    //$(".editpro").val(provider_com)
    /*$("#editcom").val("$"+adminget+" - Admin Commission");
    $("#editpro").val("$"+provider_com+" - Credit to provider");
*/
    
    
  });
 imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>

<script type="text/javascript">
  $("body").on("blur",".offerprice",function(){
    var offerprice = $(this).val();
  });
  
 
 $("body").on("blur",".offerdiscount",function(){
    
    var offerprice = $(".offerprice").val();

    var offerdiscount = $(this).val();

    var admiget = offerprice-offerprice*offerdiscount/100

    var admin_commi = admiget*20/100

    var provider_commi = admiget-admiget*20/100

    $("#com").val("$"+admin_commi+" - Admin Commission");
    $("#provider_com").val("$"+provider_commi+" - Credit to provider");
    
  });
 imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>




<!-- Deal and Disscount section end -->


