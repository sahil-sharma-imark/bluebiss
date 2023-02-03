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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sub Category /</span> All</h4>

                <div class="row mb-3">
                  <div class="col-md-12">
                    <a href="{{url('add-subcategory')}}" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div> 
                
                <!-- Basic Bootstrap Table -->
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>REFLECT ON DESKTOP</th>
                        <th>popular categories</th>
                        <th>Status</th>
                        
                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($sub_category as $sub_cat)

                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        	<strong>{{ucfirst($sub_cat->name)}}</strong>
                        </td>
                        <td>{{ucfirst($sub_cat->cat_name)}}</td>

                        <td><input data-id="{{$sub_cat->id}}" class="reflect-subcat" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $sub_cat->show_sub_cat ? '' : 'checked' }}>
                        </td>

                        <td><input data-id="{{$sub_cat->id}}" class="popular-cat" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $sub_cat->show_pop_cat ? '' : 'checked' }}>
                        </td>                        

                        <td><input data-id="{{$sub_cat->id}}" class="status-subcat" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $sub_cat->cat_status ? '' : 'checked' }}>
                        </td>


                        
                        
                        
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('update-sub-cat/'.$sub_cat->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <!-- <a class="dropdown-item" href="#"
                                ><i class="menu-icon tf-icons bx bx-file"></i> View</a
                              >
                               -->
                              <a class="dropdown-item" href="{{url('delete-sub-cat/'.$sub_cat->id)}}"
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
                       $('.reflect-subcat').change(function() { 
                       var status = $(this).prop('checked') == true ? 0 : 1;  
                       var subcat_id = $(this).data('id');  
                       $.ajax({ 
                
                           type: "GET", 
                           dataType: "json", 
                           url: '/subcat-show-desk', 
                           data: {'status': status, 'subcat_id': subcat_id}, 
                           success: function(data){ 
                           console.log(data.success) 
                        } 
                     }); 
                  }) 
               }); 
            </script>

            <script>
               $(function() { 
                       $('.status-subcat').change(function() { 
                       var status = $(this).prop('checked') == true ? 0 : 1;  
                       var subcat_id = $(this).data('id');  
                       $.ajax({ 
                
                           type: "GET", 
                           dataType: "json", 
                           url: '/status-subcat', 
                           data: {'status': status, 'subcat_id': subcat_id}, 
                           success: function(data){ 
                           console.log(data.success) 
                        } 
                     }); 
                  }) 
               }); 
            </script>

            <script>
               $(function() { 
                       $('.popular-cat').change(function() { 
                       var status = $(this).prop('checked') == true ? 0 : 1;  
                       var subcat_id = $(this).data('id');  
                       $.ajax({ 
                
                           type: "GET", 
                           dataType: "json", 
                           url: '/show-popular-cat', 
                           data: {'status': status, 'subcat_id': subcat_id}, 
                           success: function(data){ 
                           console.log(data.success) 
                        } 
                     }); 
                  }) 
               }); 
            </script>

            <!-- Toogle status button script end -->            