@include('layouts.admin.header')
<style type="text/css">
  .toggle-group .btn-success{background-color:#1ABC9C; border-color:transparent!important; box-shadow:transparent!important; }
</style>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            @if(session()->has('header_top'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('header_top') }}
            </div>
            @endif

            @if(session()->has('update-headertop'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('update-headertop') }}
            </div>
            @endif

            @if(session()->has('section_team'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('section_team') }}
            </div>
            @endif

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Header Top /</span> All</h4>
                <!-- Basic Bootstrap Table -->
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{url('home-top-add')}}" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div>
                <div class="card">
                  <!-- <h5 class="card-header">Table Basic</h5> -->
                  <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Title One</th>
                        <th>Title Two</th>
                        <th>Icon</th>
                        <th>Show</th>                     
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($header_top_all as $header_top_all_value)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong>{{$header_top_all_value->title_one}}</strong>
                        </td>

                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                          <strong>{{$header_top_all_value->title_two}}</strong>
                        </td>
                        
                        <td><img src="{{asset('uploads/admin/header_top/'.$header_top_all_value->icon)}}" style="height: 25px; width: auto;">
                        </td>

                        <td><input data-id="{{$header_top_all_value->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $header_top_all_value->header_top_status ? '' : 'checked' }}></td>
                        

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('header_top-edit/'.$header_top_all_value->id)}}">
                                <i class="bx bx-edit-alt me-1"></i> Edit</a> 
                              <a class="dropdown-item" href="{{url('header_top-delete/'.$header_top_all_value->id)}}"
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
           var top_id = $(this).data('id');  
           $.ajax({ 
    
               type: "GET", 
               dataType: "json", 
               url: '/header-top-status', 
               data: {'status': status, 'top_id': top_id}, 
               success: function(data){ 
               console.log(data.success) 
            } 
         }); 
      }) 
   }); 
</script>show-status

