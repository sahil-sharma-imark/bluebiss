<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@foreach($yy as $yy_value)
<div class="ceate-listing-popup">
  <div class="modal fade" id="modify_request_quote{{$yy_value}}" aria-hidden="true" aria-labelledby="ceateNewlistingLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="chat-case-box">
          <div class="chat-case-cnt chat-case-cnt-padd">
            <div class="chat-case-heading-title">
              <h6>Create Quotation</h6>
            </div>

            
<div class="row">
                  <div class="col-md-3">
                    <input type="button" class="btn btn-danger add_item" style="margin-top:28px" value="Add">
                  </div>
                </div>
            <form role="form" action="{{url('resend-quote')}}" method="POST">
            @csrf

              <input type="hidden" name="user_id" value="{{$_GET['user_id']}}">
              <input type="hidden" name="provider_id" value="{{Auth::user()->id}}">
              <input type="hidden" name="task_id" value="{{$_GET['task_id']}}">
              <div class="chat-case-box">
                <div class="table">
                  <div class="col-md-5" style="float: left;">
                    <label>Description</label>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <label>Qty</label>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <label>Unit Price</label>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <label>Amount</label>
                  </div>
                  <div class="col-md-1" style="float: left;">
                    <label></label>
                  </div>
                </div>
              </div>
              
              <div id="quote_det" class="chat-case-box">
                
                
                <?php
              $quoteid = $yy_value;
              $quote_detail = DB::table('req_quote')->where('quote_id',$quoteid)->first();
              $quotedes = json_decode($quote_detail->quote_des,true);
              $quoteqty = json_decode($quote_detail->quote_qty,true);
              $quoteunit = json_decode($quote_detail->quote_unit,true);
              $quoteamount = json_decode($quote_detail->quote_amount,true);
              $quotediscount = $quote_detail->quote_discount;
              $quotetotal = $quote_detail->quote_total;
              $granttotal = $quote_detail->quote_discount + $quote_detail->quote_total;
              $granttime = $quote_detail->time_duration;
              $grantnotes = $quote_detail->notes;
              $count = count($quotedes);

              for($i=0; $i<=$count-1; $i++){?>
                <div class="table">
                  <input type="hidden" value="<?php echo $count ?>" id="count_val" name="">
                  <div class="col-md-5" style="float: left;">
                    <input type="text" name="des[]" id="des" class="form-control" value="<?php echo $quotedes[$i];?>" required>
                    <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <input type="text" name="qty[]" id="quantity{{$i}}"  class="form-control quantity" value="<?php echo $quoteqty[$i];?>" required>
                    <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <input type="text" name="unit_price[]" data-val="<?php echo $quoteqty[$i];?>" id="unitprice{{$i}}" value="<?php echo $quoteunit[$i];?>" class="form-control unitprice" required>
                    <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <input type="text" name="amount[]" id="tamount{{$i}}" value="<?php echo $quoteamount[$i];?>" class="form-control tamount" required readonly>
                    <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                  </div>

                  <div class="col-md-1" style="float: left;">
                    <label></label>
                    <a class="close-btn remove_item" style="margin-top:28px"><i class="fa-solid fa-xmark"></i></a>
                  </div>
                </div>
                <?php }
            ?>
              </div>
            
              <div class="chat-case-box">
                <div class="table">
                  <div class="col-md-9" style="float: left; text-align: right;">Sub total</div>
                  <div class="col-md-3" id="total_rat" style="float: left; padding-left: 10px;"><?php echo $granttotal ?></div>
                </div>
              </div>
              <div class="chat-case-box">
                <div class="table">
                  <div class="col-md-9" style="float: left; text-align: right; padding-top: 15px;">Discount</div>
                  <div class="col-md-2" class="discount" style="float: left; padding-top: 15px;">
                    <input type="text" name="discount" id="discount" value="<?php echo $quotediscount ?>"  class="form-control discount" required>
                  </div>
                </div>
              </div>
              <div class="chat-case-box">
                <div class="table">
                  <div class="col-md-9" style="float: left; text-align: right; padding-top: 15px;">The customer pays</div>
                  <div class="col-md-2"  style="float: left; padding-top: 15px;">
                    <input type="text" name="total" id="overall" value="<?php echo $quotetotal ?>"  class="form-control overall" required readonly>
                  </div>
                </div>
              </div>

              

              <div class="chat-case-box">
              <div class="table">
                <h5>Service Duration</h5>
                <h1 id="total_rat"></h1>
                <div class="col-md-12">
                  <label>Time duration (Est.)</label>
                  <input type="text" name="time_duration" id="time_duration" value="<?php echo $granttime ?>" class="form-control" placeholder="36 Hours">
                  <textarea placeholder="Notes (Optinal)" name="notes" id="notes" style="margin-top: 10px"><?php echo $grantnotes ?></textarea>
                </div>
                <div class="create-btn mt-3">
                  <button type="submit" class="btn">Send Quote to customer</button>
                </div>
              </div>
            </div>
              
            </div>
            
          </form>

          

          
          </div>

          <!-- ul class="chat-case-btn-wrap">
            <li>
              <a class="accept-btn accept-color" href="#"><i class="fa-solid fa-circle-check"></i> Accept & Book</a>
            </li>
            <li>
              <a class="reject-btn reject-color" href="#"><i class="fa-solid fa-circle-xmark"></i> Reject Quote</a>
            </li>
            <li>
              <a class="counter-btn counter-color" href="#"><img src="images/peice-doller-icon.png" alt=""> Counter price</a>
            </li>
          </ul> -->
        </div>

      </div>
    </div>



  </div>
</div>
@endforeach


<script type="text/javascript">
  $('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    $(".add-field", $(this)).click(function(e) {
        $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
    });
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});
</script>

<script>
  $(document).ready(function(){
    $(".add_item").click(function(e){
      e.preventDefault();
      $("#quote_det").prepend(`
        <div id="quote_det" class="chat-case-box">
          <div class="table">
            <div class="col-md-5" style="float: left;">
              <input type="text" name="des[]" id="des" class="form-control" required>
              <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
            </div>
            <div class="col-md-2" style="float: left;">
              <input type="text" name="qty[]"  class="form-control quantit" required>
              
            </div>
            <div class="col-md-2" style="float: left;">
              <input type="text" name="unit_price[]"  class="form-control unitpric" required>
              
            </div>
            <div class="col-md-2" style="float: left;">
              <input type="text" name="amount[]" id="tamoun" class="form-control tamount" required readonly>
              <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
            </div>

            <div class="col-md-1" style="float: left;">
              <label></label>
              <a class="close-btn remove_item" style="margin-top:28px"><i class="fa-solid fa-xmark"></i></a>
            </div>
          </div>`);
    });
    $(document).on('click','.remove_item', function(e){
      e.preventDefault();
      let row_item = $(this).parent().parent();
      $(row_item).remove();
    });
  });
</script>


<!-- <script type="text/javascript">
  $("body").on("blur",".quantity",function(){
    var qt = $(this).val()
    
 
  })
  
 
 $("body").on("blur",".unitprice",function(){

    var qt = $(this).attr('data-val');
    var unitprice = $(this).val();
    var tamount = qt*unitprice;
    alert(tamount)
    var sum_rate = 0;
    $("#tamount").val(tamount)
    $('.tamount').each(function(){
      sum_rate += +$(this).val();
      $('#total_rat').text(sum_rate);
    });
  });
 $("body").on("blur",".discount",function(){
    var discount = $(this).val()
    var totalrate =  $('#total_rat').text();
    var dis_total = totalrate-discount;
    $('#total').val(dis_total);
    
  })
</script> -->


<script>

//   $(".quantity, .unitprice").on('blur',function(){
//      var count_value = $("#count_val").val();

//      var qt = $(".quantity").val();
//      var unitprice = $(".unitprice").val();

//    alert(qt)
//     var tamount = qt*unitprice;
   
// });



   $(".quantity, .unitprice").on('blur',function(){
      var count_value = $("#count_val").val();

      for (var i = 0; i <= count_value-1; i++) {
        var qt = $("#quantity"+i).val();
        var unitprice = $("#unitprice"+i).val();
        var tamount = qt*unitprice;
         $("#tamount"+i).val(tamount)
        // alert(tamount)
        
      }
   
 });

 $("body").on("blur",".unitpric",function(){

    var unitpric = $(this).val();
    var quantit = $(".quantit").val();
    var tamoun = quantit*unitpric;
    $("#tamoun").val(tamoun)
    
   
    var sum = 0;
    $(".tamount").each(function(){
        sum += +$(this).val();

        $('#total_rat').text(sum);
    });
    
  });

 $("body").on("blur",".discount",function(){
    var discount = $(this).val()
    var total_rat =  $('#total_rat').text();
    var dis_total = total_rat-discount;
    
    //alert(dis_total)
    $('#overall').val(dis_total);
    
  })
  
</script>



