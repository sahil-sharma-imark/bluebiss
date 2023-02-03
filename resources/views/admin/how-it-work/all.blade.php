@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            @if(session()->has('add'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('add') }}
            </div>
            @endif

            @if(session()->has('edit'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('edit') }}
            </div>
            @endif

            @if(session()->has('delete'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('delete') }}
            </div>
            @endif

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blogs /</span> All</h4>
                <!-- Basic Bootstrap Table -->
                <div class="row">
                  <div class="col-md-12">
                    <a href="{{url('how-it-work')}}" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div>
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>DESCRIPTION</th>
                        <th>Image</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($how_it_work_all as $how_it_work)
                    	<tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        	<strong>{{$how_it_work->title}}</strong>
                        </td>
                        <?php $limit_des = Str::limit($how_it_work->how_it_work_des, 30); ?>
                        <td>{!! $limit_des !!}</td>
                        <td><img src="{{asset('uploads/admin/how-it-work/'.$how_it_work->how_it_work_image)}}" style="height: 25px; width: auto;">
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('how-it-work-edit/'.$how_it_work->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a> 
                              <a class="dropdown-item" href="{{url('how-it-work-delete/'.$how_it_work->id)}}"
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