@include('layouts.admin.header')

<style type="text/css">
  .toggle-group .btn-success{background-color:#1ABC9C; border-color:transparent!important; box-shadow:transparent!important; }
</style>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            @if(session()->has('add'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('add') }}
            </div>
            @endif

            @if(session()->has('delete'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('delete') }}
            </div>
            @endif

            @if(session()->has('update'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('update') }}
            </div>
            @endif

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Users /</span> All</h4>
                <!-- Basic Bootstrap Table -->
                <div class="row mb-3">
                  <div class="col-md-12">
                    <a href="{{url('add')}}" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div>
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>REFLECT ON DESKTOP</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($category as $cat)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        	<strong>{{ucfirst($cat->name)}}</strong>
                        </td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center"><li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              
                            >
                              <img src="{{asset('uploads/category_img/'.$cat->image)}}" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>

                        <td><input data-id="{{$cat->id}}" class="reflect-cat" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $cat->show_desk ? '' : 'checked' }}>
                        </td>

                        <td><input data-id="{{$cat->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $cat->sub_cat_status ? '' : 'checked' }}>
                        </td>
                        
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('edit-category/'.$cat->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a
                              > 
                              <!-- <a class="dropdown-item" href="#"
                                ><i class="menu-icon tf-icons bx bx-file"></i> View</a
                              >
                              -->
                              <a class="dropdown-item" href="{{url('delete-category/'.$cat->id)}}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                              <!-- <a class="dropdown-item" href="#"
                                ><i class="bx bx-edit-alt me-1"></i>Broadcast</a
                              > -->
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

            <!-- Toogle status button script -->
            <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 

            <script>
               $(function() { 
                       $('.toggle-class').change(function() { 
                       var status = $(this).prop('checked') == true ? 0 : 1;  
                       var cat_id = $(this).data('id');  
                       $.ajax({ 
                
                           type: "GET", 
                           dataType: "json", 
                           url: '/cat-status', 
                           data: {'status': status, 'cat_id': cat_id}, 
                           success: function(data){ 
                           console.log(data.success) 
                        } 
                     }); 
                  }) 
               }); 
            </script>

            <script>
               $(function() { 
                       $('.reflect-cat').change(function() { 
                       var status = $(this).prop('checked') == true ? 0 : 1;  
                       var cat_id = $(this).data('id');  
                       $.ajax({ 
                
                           type: "GET", 
                           dataType: "json", 
                           url: '/cat-show-desk', 
                           data: {'status': status, 'cat_id': cat_id}, 
                           success: function(data){ 
                           console.log(data.success) 
                        } 
                     }); 
                  }) 
               }); 
            </script>

            <!-- Toogle status button script end -->