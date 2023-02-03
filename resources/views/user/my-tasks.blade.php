@include('layouts.header')

  <main id="main">

    @if(session()->has('canceltask'))
    <div class="alert alert-success" style="text-align: center;">
        {{ session()->get('canceltask') }}
    </div>
    @endif

    <section class="my-tasks-main">
      <div class="container">
        <div class="my-tasks-title">
          <h4>My Tasks</h4>

          <div class="my-tasks-title-right">
            <div class="my-tasks-menu">
              <ul>
                <li><a class="activelink" href="javascript:void(0)" data-tag="ActiveTasks">Active tasks</a></li>
                <li><a href="javascript:void(0)" data-tag="AssignedTask" class="">Assigned task</a></li>
                <li><a href="javascript:void(0)" data-tag="PastTask" class="">Past task</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="my-tasksBox active" id="ActiveTasks">
          @if($my_tasks)
          @foreach($my_tasks as $task)
          @php
          if(isset($task->task_image)){
            $task_single_image = json_decode($task->task_image, true);

          }
          
          @endphp
          <div class="my-tasks-row">
            <div class="my-tasks-col">
              <div class="my-tasks-info">
                <figure>
                  @if(isset($task_single_image))
                  <img src="{{asset('uploads/task_image/'.$task_single_image[0])}}" alt="">
                  @endif
                </figure>
                

                <div class="my-tasks-about">
                  <ul class="list-trinid">
                    <li>
                      <span>
                        <img src="images/calendar.png" alt="">
                      </span>
                      @php
                      $date = date("d-M",strtotime($task->created_at))
                      @endphp
      
                      {{$date}}
                    </li>
                    
                    <li>
                      <span>
                        <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                          <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.75 -0.75)">
                            <path id="Path_24078" data-name="Path 24078" d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z" transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path id="Path_24079" data-name="Path 24079" d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z" transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                          </g>
                        </svg>
                      </span>
      
                      {{$task->task_address}}
                    </li>
       
                  </ul>

                  <h6><a href="{{url('my-task-detail/'.$task->id)}}"> {{$task->cleaning_radio}}</a> <span class="badge">{{$task->qty}}</span></h6>
                  
                  <p>{{$task->task_des}}</p>
                </div>

              </div>
              <div class="right-view">
  
                <div class="dropdown">
                  <button type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis"></i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item" href="{{url('edit-task-detail/'.$task->id)}}">Edit task</a></li>
                    <li><a class="dropdown-item" href="{{url('cancle-task/'.$task->id)}}">Cancel task</a></li>
                  </ul>
                </div>

              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="recent-requests-main">
            <div class="recent-requests-content">
              <figure>
                <img src="{{asset('images/requests-img.svg')}}" alt="">
              </figure>

              <h5>You have not posted any task.</h5>

              <p>Select a service that you need from the catalog.</p>

              <a class="btn" href="{{url('task-details')}}">Post a task</a>
            </div>
          </div>
          @endif
        </div>

        
         
        <div class="my-tasksBox " id="AssignedTask">
          <div class="my-tasks-row">
            @foreach($my_assigned_tasks as $my_assigned_task)
            <div class="my-tasks-col">
              <div class="my-tasks-info">
                <figure>
                  <!-- <img src="images/urbanclab.png" alt=""> -->
                </figure>

                <div class="my-tasks-about">
                  <ul class="list-trinid">
                    <li>
                      <span>
                        <img src="images/calendar.png" alt="">
                      </span>
      
                      {{$my_assigned_task->created_at}}
                    </li>
                    
                    <li>
                      <span>
                        <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                          <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.75 -0.75)">
                            <path id="Path_24078" data-name="Path 24078" d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z" transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path id="Path_24079" data-name="Path 24079" d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z" transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                          </g>
                        </svg>
                      </span>
      
                      {{$my_assigned_task->task_address}}
                    </li>
       
                  </ul>

                  <h6>{{$my_assigned_task->cleaning_radio}}<a class="chat-icon" href="#">
                    <svg width="12" height="12" viewBox="0 0 12 12">
                      <g id="Group_55026" data-name="Group 55026" transform="translate(-520 -223)">
                        <path id="Icon_material-chat-bubble" data-name="Icon material-chat-bubble" d="M13.8,3H4.2A1.2,1.2,0,0,0,3,4.2V15l2.4-2.4h8.4A1.2,1.2,0,0,0,15,11.4V4.2A1.2,1.2,0,0,0,13.8,3Z" transform="translate(517 220)" fill="#47bbd0"/>
                      </g>
                    </svg>
                    
                  </a></h6>
                  
                  <p>{{$my_assigned_task->task_des}}</p>
                
                  <div class="my-tasks-rating">
                    <figure>
                      <img src="{{asset('uploads/provider/'.$my_assigned_task->requstid.'/'.$my_assigned_task->image)}}" alt="">
                    </figure>
    
                    <div class="my-tasks-rating-content">
                      <div class="inter-name">{{$my_assigned_task->name.' '.$my_assigned_task->lastname}}</div>
    
                      <div class="rating-wrap"><span>0 <i class="fa-solid fa-star"></i></span> Newcomer</div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="right-view">
  
                <div class="dropdown">
                  <button type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis"></i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item" href="{{url('cancle-task/'.$my_assigned_task->id)}}">Cancel task</a></li>
                  </ul>
                </div>

                <a class="btn chat-btn" href="#"><i class="fa-solid fa-message"></i> Chat</a>

              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="my-tasksBox " id="PastTask">
          <div class="my-tasks-row">
            <div class="my-tasks-col">
              <div class="my-tasks-info">
                <figure>
                  <!-- <img src="images/urbanclab.png" alt=""> -->
                </figure>

                <div class="my-tasks-about">
                  <ul class="list-trinid">
                    <li>
                      <span>
                        <img src="images/calendar.png" alt="">
                      </span>
      
                      Dec 25, 2021
                    </li>
                    
                    <li>
                      <span>
                        <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                          <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.75 -0.75)">
                            <path id="Path_24078" data-name="Path 24078" d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z" transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path id="Path_24079" data-name="Path 24079" d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z" transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                          </g>
                        </svg>
                      </span>
      
                      Trinidad and Tobago
                    </li>
       
                  </ul>

                  <h6>Tax Accountant <span class="badge">1</span></h6>
                  
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
                
                  <div class="my-tasks-rating">
                    <figure>
                      <!-- <img src="images/user-profile.png" alt=""> -->
                    </figure>
    
                    <div class="my-tasks-rating-content">
                      <div class="inter-name">Wander S.</div>
    
                      <div class="rating-wrap"><span>0 <i class="fa-solid fa-star"></i></span> Newcomer</div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="right-view">
  
                <div class="dropdown">
                  <button type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis"></i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item" href="#">View booking</a></li>
                    <li><a class="dropdown-item" href="#">Give Review</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="my-tasks-col">
              <div class="my-tasks-info">
                <figure>
                  <!-- <img src="images/urbanclab.png" alt=""> -->
                </figure>

                <div class="my-tasks-about">
                  <ul class="list-trinid">
                    <li>
                      <span>
                        <img src="images/calendar.png" alt="">
                      </span>
      
                      April 26, 2021, 09:00 AM
                    </li>
                    
                    <li>
                      <span>
                        <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                          <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.75 -0.75)">
                            <path id="Path_24078" data-name="Path 24078" d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z" transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path id="Path_24079" data-name="Path 24079" d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z" transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                          </g>
                        </svg>
                      </span>
      
                      Trinidad and Tobago
                    </li>
       
                  </ul>

                  <h6>Home Interior Painting <span class="badge">1</span></h6>
                  
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
                
                  <div class="my-tasks-rating">
                    <figure>
                      <!-- <img src="images/user-profile.png" alt=""> -->
                    </figure>
    
                    <div class="my-tasks-rating-content">
                      <div class="inter-name">Steve J.</div>
    
                      <div class="rating-wrap"><span>5 <i class="fa-solid fa-star"></i></span> Newcomer</div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="right-view">
  
                <div class="dropdown">
                  <button type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis"></i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item" href="#">View booking</a></li>
                    <li><a class="dropdown-item" href="#">Give Review</a></li>
                  </ul>
                </div>

                <a class="br-btn br-btn-red" href="#">Cancelled</a>

              </div>
            </div>

            <div class="my-tasks-col">
              <div class="my-tasks-info">
                <figure>
                  <!-- <img src="images/urbanclab.png" alt=""> -->
                </figure>

                <div class="my-tasks-about">
                  <ul class="list-trinid">
                    <li>
                      <span>
                        <img src="images/calendar.png" alt="">
                      </span>
      
                      April 26, 2021, 09:00 AM
                    </li>
                    
                    <li>
                      <span>
                        <svg width="16.227" height="19.5" viewBox="0 0 16.227 19.5">
                          <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(-3.75 -0.75)">
                            <path id="Path_24078" data-name="Path 24078" d="M19.227,8.864c0,5.727-7.364,10.636-7.364,10.636S4.5,14.591,4.5,8.864a7.364,7.364,0,1,1,14.727,0Z" transform="translate(0 0)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path id="Path_24079" data-name="Path 24079" d="M18.409,12.955A2.455,2.455,0,1,1,15.955,10.5a2.455,2.455,0,0,1,2.455,2.455Z" transform="translate(-4.091 -4.091)" fill="none" stroke="#47bbd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                          </g>
                        </svg>
                      </span>
      
                      Trinidad and Tobago
                    </li>
       
                  </ul>

                  <h6>Carpet Cleaning <span class="badge">1</span></h6>
                  
                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout...</p>
                
                  <div class="my-tasks-rating">
                    <figure>
                      <img src="images/user-profile.png" alt="">
                    </figure>
    
                    <div class="my-tasks-rating-content">
                      <div class="inter-name">Kimberly S.</div>
    
                      <div class="rating-wrap"><span>4 <i class="fa-solid fa-star"></i></span> Newcomer</div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="right-view">
  
                <div class="dropdown">
                  <button type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis"></i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item" href="#">View booking</a></li>
                    <li><a class="dropdown-item" href="#">Give Review</a></li>
                  </ul>
                </div>

                <a class="br-btn br-btn-yellow" href="#">Job Incomplete</a>

              </div>
            </div>
 
          </div>
        </div>



      </div>
    </section>

  </main>


 @include('layouts.footer')