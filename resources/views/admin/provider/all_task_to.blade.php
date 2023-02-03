@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light" style="color:#47bbd0!important">All broadcask task to /</span> {{$provider_name->name.' '.$provider_name->lastname}}</h4>
                
                <!-- Basic Bootstrap Table -->
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Task Type</th>
                        <th>Request ID</th>
                        <th>Address</th>
                        <th>Budget</th>
                        <th>Commisssion</th>                        
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($all_task_to as $all_task_to_value)
                      <tr>
                        <td><strong>{{ucfirst($all_task_to_value->cleaning_radio)}}</strong></td>
                        <td>{{$all_task_to_value->task_requestID}}</td>
                        <td>{{$all_task_to_value->task_address}}</td>                        
                        <td>${{$all_task_to_value->task_budget}}</td>
                        <td>${{$all_task_to_value->admin_com}}</td>
                        
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