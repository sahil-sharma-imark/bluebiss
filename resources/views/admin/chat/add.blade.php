@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <!-- @if(session()->has('updatesuccess'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('updatesuccess') }}
            </div>
            @endif -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin Chat</span> </h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('getadmin-chat')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-md-4">
                            <input type="hidden" name="provider_id_value" value="" id="provider_id_value">
                            <input type="hidden" name="user_id_value" value="" id="user_id_value">
                            <input type="hidden" name="task_id_value" value="" id="task_id_value">

                            <label class="form-label" for="basic-default-fullname">Select Provider</label>
                            <select class="form-select" name="selected_pro" id="selected_pro" aria-label="Default select example">
                              <option>Select provider name</option>
                              @foreach($get_providers as $get_provider)
                              <option value="{{$get_provider->id}}">{{$get_provider->name.' '.$get_provider->lastname}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Select User</label>
                             <div id="selecteduser"></div>
                          <select class="form-select" name="cat_id" id="susers" aria-label="Default select example">
                            <option>Select user name</option>
                           
                            <option value="#"></option>
                            
                          </select>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="basic-default-fullname">Select Task</label>
                            <div id="selectedtask"></div>
                          <select class="form-select" name="cat_id" id="drop_t_s" aria-label="Default select example">
                            <option>Select task</option>
                           
                            <option value="#"></option>
                            
                          </select>
                          </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Get Selected Chat</button>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>

              </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')
<script>


    $('#selected_pro').on('change',function(){
      //alert("Hello");
      var pro_id = this.value

      if(pro_id>0){
      $.ajax({
        url: "/select-user", 
        type: "GET",
        data: {provider_id:pro_id},

        cache: false,
        success: function(output){
        //alert(dataa)
          $("#selecteduser").html(output)
          if($("#selecteduser").html(output))
            {
            $("#susers").hide();
          }
        }
      });
    }


    });




$('#selecteduser').on('change',function(){
      var u_id = $("#sub_user").val();
      var p_id = $("#selected_pro").val();

      $.ajax({
        url: "/select-tasks", 
        type: "GET",
        data: {p_id:p_id,
        u_id:u_id},

        cache: false,
        success: function(out){
        //alert(dataa)
          $("#selectedtask").html(out)
          if($("#selectedtask").html(out))
            {
            $("#drop_t_s").hide();
          }
        }
      });

      var p_id = $("#selected_pro").val();
      $("#provider_id_value").val(p_id);
      $("#user_id_value").val(u_id);
      
      

});


$('#selectedtask').on('change',function(){
      var u_id = $("#sub_user").val();
      var p_id = $("#selected_pro").val();
      var t_id = $("#tid").val();

        $("#provider_id_value").val(p_id);
        $("#user_id_value").val(u_id);
        $("#task_id_value").val(t_id);

      
      

});

</script>





