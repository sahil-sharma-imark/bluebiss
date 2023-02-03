<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="ceate-listing-popup">
  <div class="modal fade" id="request_quote" aria-hidden="true" aria-labelledby="ceateNewlistingLabel"
    tabindex="-1">


    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="chat-case-box">
          <div class="chat-case-cnt chat-case-cnt-padd">
           <div class="chat-case-heading-title">
            <h6>Create Quotation</h6>
           </div>

         

          


          <form role="form" action="{{url('request-quote')}}" method="POST">
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
                 <!--  <a class="add-btn" href="#"><i class="fa-solid fa-plus"></i> Add</a> -->
                </div>
              </div>
            </div>
              <div id="quote_detail" class="chat-case-box">
                <div class="table">
                  <div class="col-md-5" style="float: left;">
                    <input type="text" name="des[]" id="des" class="form-control" required>
                    <span style="color: red"> @error('card_number'){{$deal_mrp}}@enderror</span>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <input type="text" name="qty[]"  class="form-control qty" required>
                    <span style="color: red"> @error('card_number'){{$deal_dis}}@enderror</span>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <input type="text" name="unit_price[]" id="unit_price" class="form-control unit_price" required>
                    <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                  </div>
                  <div class="col-md-2" style="float: left;">
                    <input type="text" name="amount[]" id="amount" class="form-control amount" required readonly>
                    <span style="color: red"> @error('card_number'){{$deal_expiry}}@enderror</span>
                  </div>

                  <div class="col-md-1" style="float: left;">
                    <label></label>
                    <a class="add-btn add_item_btn" style="margin-top:28px"><i class="fa-solid fa-plus"></i> Add</a>
                  </div>
                </div>
              </div>
              <div class="chat-case-box">
                <div class="table">
                  <div class="col-md-9" style="float: left; text-align: right;">Sub total</div>
                  <div class="col-md-3" id="total_rate" style="float: left; padding-left: 10px;"></div>
                </div>
              </div>
              <div class="chat-case-box">
                <div class="table">
                  <div class="col-md-9" style="float: left; text-align: right; padding-top: 15px;">Discount</div>
                  <div class="col-md-2" class="discount" style="float: left; padding-top: 15px;">
                    <input type="text" name="discount" id="discount"  class="form-control discount" required>
                  </div>
                </div>
              </div>
              <div class="chat-case-box">
                <div class="table">
                  <div class="col-md-9" style="float: left; text-align: right; padding-top: 15px;">The customer pays</div>
                  <div class="col-md-2"  style="float: left; padding-top: 15px;">
                    <input type="text" name="total" id="total"  class="form-control" required readonly>
                  </div>
                </div>
              </div>

              <div class="chat-case-box">
              <div class="table">
                <h5>Service Duration</h5>
                <h1 id="total_rate"></h1>
                <div class="col-md-12">
                  <label>Time duration (Est.)</label>
                  <input type="text" name="time_duration" id="time_duration" class="form-control" placeholder="36 Hours">
                  <textarea placeholder="Notes (Optinal)" name="notes" id="notes" style="margin-top: 10px"></textarea>
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
<script type="text/javascript">
  $("body").on("blur",".qty",function(){
    var qty = $(this).val()
  })
  
 
 $("body").on("blur",".unit_price",function(){
    
    var qty = $(".qty").val();
    var unit_price = $(this).val();
    var total_amount = qty*unit_price
    var sum_rate = 0;
    $("#amount").val(total_amount)
    $('.amount').each(function(){
      sum_rate += +$(this).val();
      $('#total_rate').text(sum_rate);
    });
  });
 $("body").on("blur",".discount",function(){
    var discount = $(this).val()
    var totalrate =  $('#total_rate').text();
    var dis_total = totalrate-discount;
    $('#total').val(dis_total);
    
  })



  

</script>

