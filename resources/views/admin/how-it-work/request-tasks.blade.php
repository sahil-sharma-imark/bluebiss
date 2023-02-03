@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Request Tasks /</span> All</h4>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Task Type</th>
                        <th>REquested</th>
                        <th>REquested Id</th>
                        <th>Address</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($request_tasks as $request_task)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        	<strong>{{ucfirst($request_task->cleaning_radio)}}</strong>
                        </td>
                        <td>{{ucfirst($request_task->name.' '.$request_task->lastname)}}</td>
                        <td>{{ucfirst($request_task->requstid)}}</td><td>{{ucfirst($request_task->task_address)}}</td>
                        <td>${{$request_task->task_budget}}</td>
                        <td>
                        	@if($request_task->status == 0)
                        	<span class="badge bg-label-primary me-1">Process</span></td>
                        	@else
                        	<span class="badge bg-label-info me-1">Pending</span></td>
                        	@endif
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('users-view/'.$request_task->id)}}"
                                ><i class="menu-icon tf-icons bx bx-file"></i> View</a
                              >
                              <a class="dropdown-item" href="{{url('users-update/'.$request_task->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="{{url('user-delete/'.$request_task->id)}}"
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