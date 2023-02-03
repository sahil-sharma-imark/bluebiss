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
                <h4 class="fw-bold py-3 mb-4"><span style="color:#47bbd0!important" class="text-muted fw-light">Blogs /</span> All</h4>
                <!-- Basic Bootstrap Table -->

                <div class="row mb-3">
                  <div class="col-md-12">
                    <a href="{{url('add-blag')}}" class="btn btn-primary" style="float:right!important">Add New</a>
                  </div>
                </div>
                <div class="card">
                	<!-- <h5 class="card-header">Table Basic</h5> -->
                	<div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    	@foreach($all_blogs as $all_blog)
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        	<strong>{{ucfirst(Str::limit($all_blog->blog_title, $limit = 50, $end = '...'))}}</strong>   
                        </td>
                        <td>{{ucfirst($all_blog->authna)}}</td>
                        <td>{{$all_blog->catname}}</td>
                        <td><img src="{{asset('uploads/blog/'.$all_blog->blog_image)}}" style="height: 25px; width: auto;"></td>
                        @if($all_blog->status == 1)
                        <td><span class="badge bg-label-primary me-1">Active</span><td>
                        @else
                        <td>In Active<td>
                        @endif

                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <!-- <a class="dropdown-item" href="#"
                                ><i class="menu-icon tf-icons bx bx-file"></i> View</a
                              >-->
                              <a class="dropdown-item" href="{{url('edit-blog/'.$all_blog->id)}}"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a> 
                              <a class="dropdown-item" href="{{url('deleteblog/'.$all_blog->id)}}"
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