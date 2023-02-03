@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            @if(session()->has('task_update'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('task_update') }}
            </div>
            @endif
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"style="color:#47bbd0!important">Task /</span> All</h4>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Task Type</th>
                        <th>Requset ID</th>
                        <th>Address</th>
                        <th>Budget</th>
                        <th>Commission</th>
                        <!-- <th>Status</th> -->
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($post_tasks as $post_task)
                      <tr>
                        <td>
                        	<strong>{{ucfirst($post_task->cleaning_radio)}}</strong>
                        </td>
                        <td>{{ucfirst($post_task->task_requestID)}}</td>
                        <td>{{Str::limit(strip_tags($post_task->task_address), $limit = 50, $end = '...')}}</td>

                        <td>${{ucfirst($post_task->task_budget)}}</td>
                        <td>${{$post_task->admin_com}}</td>
                        
                        <!-- <td>
                        	@if($post_task->status == 0)
                        	<span class="badge bg-label-primary me-1">Process</span></td>
                        	@else
                        	<span class="badge bg-label-info me-1">Pending</span></td>
                        	@endif -->
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('task-view/'.$post_task->id)}}"
                                ><i class="menu-icon tf-icons bx bx-file"></i> View</a
                              >
                              <a class="dropdown-item" href="{{url('task-edit/'.$post_task->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="{{url('user-delete/'.$post_task->id)}}"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >   
                              <a class="dropdown-item" href="{{url('broadcast-task/'.$post_task->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i>Broadcast</a>                           
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