@include('layouts.admin.header')
<style type="text/css">
  .toggle-group .btn-success{background-color:#1ABC9C; border-color:transparent!important; box-shadow:transparent!important; }
</style>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            @if(session()->has('faq'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('faq') }}
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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">FAQ /</span> All</h4>

                <div class="row mb-3">
                  <div class="col-md-12">
                    <a href="{{url('faq-add')}}" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div> 
                
                <!-- Basic Bootstrap Table -->
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Question</th>
                        <th>Created</th>
                        
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	
                      @foreach($all_faq as $all_faq_value)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        	<strong>{{$all_faq_value->faq_question}}</strong>
                        </td>
                        

                        <td>{{$all_faq_value->created_at}}</td>

                        <td><input data-id="{{$all_faq_value->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $all_faq_value->faq_status ? '' : 'checked' }}>
                        </td>


                        
                        
                        
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="#"
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

            <!-- Toogle status button script -->
            <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
            <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 

            <script>
               $(function() { 
                       $('.toggle-class').change(function() { 
                       var status = $(this).prop('checked') == true ? 0 : 1;  
                       var faq_id = $(this).data('id');  
                       $.ajax({ 
                
                           type: "GET", 
                           dataType: "json", 
                           url: '/faq-status', 
                           data: {'status': status, 'faq_id': faq_id}, 
                           success: function(data){ 
                           console.log(data.success) 
                        } 
                     }); 
                  }) 
               }); 
            </script>   