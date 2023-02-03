@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Providers /</span> All</h4>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <a href="#" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Providers</th>
                        <th>Email</th>
                        <th>Number</th>
                        
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($providers as $provider)
                      <tr>
                        <td><a href="{{url('view-all-to/'.$provider->id)}}"><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        	<strong>{{ucfirst($provider->name.' '.$provider->lastname)}}</strong></a>
                        </td>
                        <td>{{ucfirst($provider->email)}}</td>
                        <td>{{ucfirst($provider->number)}}</td>
                                               
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center"><li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Christina Parker"
                            >
                              <img src="{{asset('uploads/provider/'.$provider->id.'/business_profile/'.$provider->image)}}" alt="Avatar" class="rounded-circle" />
                            </li>
                          </ul>
                        </td>
                        <td>
                        	@if($provider->user_type == 3)
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
                              <a class="dropdown-item" href="{{url('providers-view/'.$provider->id)}}"
                                ><i class="menu-icon tf-icons bx bx-file"></i> View</a
                              >
                              <a class="dropdown-item" href="{{url('providers-edit/'.$provider->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <!-- <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
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