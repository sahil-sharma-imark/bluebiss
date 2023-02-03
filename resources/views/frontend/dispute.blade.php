@include('layouts.header')
@php
$customer_id = $customer_id;
$customer_name = DB::table('users')->where('id',$customer_id)->select('name','lastname')->first();
@endphp
  <main id="main">
    @if(session()->has('Report'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('Report') }}
    </div>
    @endif
    <section class="dispute" >
      <div class="container">
        <div class="dispute-box">
          <div class="dispute-title">
            <h3>File a Dispute</h3>
          </div>

          <div class="dispute-form">
            <form method="POST" action="{{url('dispute')}}">
              @csrf
              <div class="form-field">
                <label>Have you made an attempt to resolve the matter with<br> <b>{{$customer_name->name.' '.$customer_name->lastname}}</b>.</label>
                <input type="hidden" name="customer_id" value="{{$customer_id}}">
                <div class="radio-btn-row">
                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="radio" id="radio" value="yes" checked>                      
                      <span></span>
                      Yes
  
                    </label>
                  </div>
  
                  <div class="check-box-radius">
                    <label>
                      <input type="radio" name="radio" id="radio" value="no">
                      <span></span>
                      No
  
                    </label>
                  </div>
                </div>
              </div>
  
              <div class="form-field">
                <label>Please describe the issue</label>
  
                <textarea class="form-control" name="dispute_issue" id="dispute_issue"  placeholder="Please describe the issue, with as much detail as possible"></textarea>
              </div>
  
              <div class="form-field">
                <label>What would you like to see as the outcome of this dispute?</label>
  
                <textarea class="form-control" name="dispute_outcome" id="dispute_outcome"  placeholder="What would you like to see as the outcome of this dispute?"></textarea>
              </div>
  
              <div class="right-btn-main">
                <a class="btn gray-br-btn" data-bs-dismiss="modal" href="{{ url()->previous() }}">Cancel</a>
                 <button type="submit" class="btn btn-primary">Submit</button>
  
                
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  

  <!-- jQuery first, then Bootstrap JS. -->
  <script src="{{url('js/bundle.min.js')}}"></script>
  <script src="{{url('js/custom.js')}}></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/latest/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/latest/respond.min.js"></script>
     <![endif]-->
</body>

</html>


