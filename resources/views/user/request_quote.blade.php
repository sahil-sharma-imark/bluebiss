<div class="upgrade-membership-popup">
      <div class="modal fade" id="request_quote" aria-hidden="true" aria-labelledby="Cancel-jobLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="ceate-listing-content modal-content-padd">
              
  
              <p>Send a message to the professional for <span class="link-info">REQUEST QUOTE</sapn> .</p>
              <form role="form" action="{{url('request-quote-user')}}" method="POST">
              @csrf

              <input type="hidden" name="provider_id" value="{{$_GET['provider_id']}}">
              <input type="hidden" name="task_id" value="{{$_GET['task_id']}}">

              <div class="create-btn">
                <button type="button" class="btn gray-br-btn" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-bg-red" data-bs-toggle="modal" data-bs-dismiss="modal">Request</button>
                <!-- <a class="btn btn-bg-red" data-bs-toggle="modal" href="#Cancel-Task-Request" role="button" data-bs-dismiss="modal">Submit</a> -->
              </div>
                
              </form>
              
              
            </div>
  
          </div>
        </div>
      </div>
    </div>