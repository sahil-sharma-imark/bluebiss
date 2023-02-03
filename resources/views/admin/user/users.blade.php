@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users /</span> All</h4>
                <!-- Basic Bootstrap Table -->
                <div class="row mb-3">
                  <div class="col-md-12">
                    <a href="#" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div>
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Users</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($all_users as $user)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        	<strong>{{ucfirst($user->name.' '.$user->lastname)}}</strong>
                        </td>
                        <td>{{ucfirst($user->email)}}</td>
                        <td>{{ucfirst($user->number)}}</td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center"><li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Christina Parker"
                            >
                              <img src="{{asset('uploads/user/'.$user->id.'/'.$user->image)}}" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>
                        <td>
                        	@if($user->status == 0)
                        	<span class="badge bg-label-primary me-1">Active</span></td>
                        	@else
                        	<span class="badge bg-label-info me-1">In Active</span></td>
                        	@endif
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('users-view/'.$user->id)}}"
                                ><i class="menu-icon tf-icons bx bx-file"></i> View</a
                              >
                              <a class="dropdown-item" href="{{url('users-update/'.$user->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="{{url('user-delete/'.$user->id)}}"
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