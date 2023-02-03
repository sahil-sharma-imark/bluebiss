@include('layouts.admin.header')
<style type="text/css">
  .toggle-group .btn-success{background-color:#1ABC9C; border-color:transparent!important; box-shadow:transparent!important; }
</style>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            @if(session()->has('team_insert'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('team_insert') }}
            </div>
            @endif

            @if(session()->has('update-team'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('update-team') }}
            </div>
            @endif

            @if(session()->has('delete-team'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('delete-team') }}
            </div>
            @endif

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Our Team /</span> All</h4>
                <!-- Basic Bootstrap Table -->
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{url('our-team-add')}}" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div>
                <div class="card">
                  <!-- <h5 class="card-header">Table Basic</h5> -->
                  <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Show</th>
                     
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($team_all as $team_all_value)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong>{{$team_all_value->team_name}}</strong>
                        </td>
                        
                        <td>{{$team_all_value->team_designation}}</td>
                        <td><img src="{{asset('uploads/admin/team/'.$team_all_value->team_img)}}" style="height: 25px; width: auto;">
                        </td>

                        <td><input data-id="{{$team_all_value->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $team_all_value->team_status ? '' : 'checked' }}></td>

                        <td><input data-id="{{$team_all_value->id}}" class="show-status" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $team_all_value->show_status ? '' : 'checked' }}></td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('team-edit/'.$team_all_value->id)}}">
                                <i class="bx bx-edit-alt me-1"></i> Edit</a> 
                              <a class="dropdown-item" href="{{url('team-delete/'.$team_all_value->id)}}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      
                      
                      
                      
                    </tbody>
                  </table>
                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->
            </div>
            <!-- / Content -->
            <!-- Footer -->
            @include('layouts.admin.footer')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 

<script>
   $(function() { 
           $('.toggle-class').change(function() { 
           var status = $(this).prop('checked') == true ? 0 : 1;  
           var team_id = $(this).data('id');  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/team-status', 
               data: {'status': status, 'team_id': team_id}, 
               success: function(data){ 
               console.log(data.success) 
            } 
         }); 
      }) 
   }); 
</script>show-status

<script>
   $(function() { 
           $('.show-status').change(function() { 
           var status = $(this).prop('checked') == true ? 0 : 1;  
           var team_id = $(this).data('id');  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/team-show-status', 
               data: {'status': status, 'team_id': team_id}, 
               success: function(data){ 
               console.log(data.success) 
            } 
         }); 
      }) 
   }); 
</script>show-status