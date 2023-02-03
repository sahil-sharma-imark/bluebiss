@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light" style="color:#47bbd0!important">Broadcast Task </span> </h4>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                  <!-- <h5 class="card-header">Table Basic</h5> -->
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Task Type</th>
                          <th>Task ID</th>
                          <!-- <th>Cleaning Type</th> -->
                          <th>Budget</th>
                          <th>Commission</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ucfirst($broad_task_detail->cleaning_radio)}}</strong>
                          </td>
                          <td>{{ucfirst($broad_task_detail->task_requestID)}}</td>
                          <!-- <td>{{$broad_task_detail->stand_clean_radio}}</td> -->
                          <td>${{$broad_task_detail->task_budget}}</td>
                          <td>${{$broad_task_detail->admin_com}}</td>
                          <td>
                            @if($broad_task_detail->status == 0)
                            <span class="badge bg-label-primary me-1">Process</span></td>
                            @else
                            <span class="badge bg-label-info me-1">Pending</span></td>
                            @endif
                            <td>
                              
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!--/ Basic Bootstrap Table -->
              </div>


              <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light" style="color:#47bbd0!important">The task already broadcast to diffrent provider </span> </h4>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                  <!-- <h5 class="card-header">Table Basic</h5> -->
                  <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Provider</th>
                          <th>Email</th>
                          <th>Number</th>
                          <th>Total credit</th>
                          <th>Image</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        @foreach($task_broadcat_provider as $broadcat_pro_value)
                        <tr>
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ucfirst($broadcat_pro_value->name.' '.$broadcat_pro_value->lastname)}}</strong>
                          </td>
                          <td>{{$broadcat_pro_value->email}}</td>
                          <!-- <td>{{$broad_task_detail->stand_clean_radio}}</td> -->
                          <td>{{$broadcat_pro_value->number}}</td>
                          <td>${{$broadcat_pro_value->total_credit}}</td>
                          <td><img height="25px" width="auto" src="{{asset('uploads/provider/'.$broadcat_pro_value->provider_id.'/business_profile/'.$broadcat_pro_value->image)}}" alt="Avatar" class="rounded-circle" /></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!--/ Basic Bootstrap Table -->
              </div>







            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light" style="color:#47bbd0!important">Related Providers</span></h4>
                <form method="POST" action="{{url('broadcast-all')}}">
                  @csrf
                  <input type="hidden" name="sender_id" value="{{$broad_task_detail->id}}">
                  <input type="hidden" name="service_type" value="{{$broad_task_detail->cleaning_radio}}">
                  <input type="hidden" name="task_point" value="{{$broad_task_detail->task_budget}}">
                  <input type="hidden" name="admin_com" value="{{$broad_task_detail->admin_com}}">

                <!-- Basic Bootstrap Table -->
                <div class="card">
                  <!-- <h5 class="card-header">Table Basic</h5> -->
                  <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Provider</th>
                        <th>Service</th>
                        <th>Company Type</th>
                        <th>Email</th>
                        <th>Price</th>
                        <th>subscription</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                   
                       @foreach($broadcast_providers as $broadcast_provider)
                        @if(!in_array($broadcast_provider->lis_providerid,$user_id_not))
                      <tr>
                        <td><input type="checkbox" name="list[]" value="{{$broadcast_provider->lis_providerid}}" /></td>
                        <td name="tt" value="{{$broadcast_provider->name}}">
                          <strong>{{$broadcast_provider->name.' '.$broadcast_provider->lastname}}</strong>
                        </td>
                        <td>{{$broadcast_provider->service_name}}</td>
                        <td>{{$broadcast_provider->service_name}}</td>
                        <td>${{$broadcast_provider->email}}</td>
                        <th>subscription</th>
                        <td>premium</td>

                        
                        
                          
                        </td>
                      </tr>
                      @endif
                      @endforeach

                    </tbody>
                  </table>
                   <button class="btn btn-primary" type="submit" style="margin-top: 20px;" >broadcast</button>
                    </div>
                </div>
              </form>
                <!--/ Basic Bootstrap Table -->
            </div>
            <!-- / Content -->
            <!-- Footer -->
            @include('layouts.admin.footer')