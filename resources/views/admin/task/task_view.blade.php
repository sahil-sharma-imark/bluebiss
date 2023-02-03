@include('layouts.admin.header')

@php
$all_questions = DB::table('admin_task_page')->where('selected_cat',$task->cleaning_radio)->get();

@endphp

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Task/</span> Detail</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Requested Service"</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$task->cleaning_radio}}" readonly />
                        </div>
                        @foreach($all_questions as $all_question)
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">{{$all_question->question}}</label>
                          @php
                           if(in_array($all_question->field_name, array_keys($long_text_decode))){
                            if(is_array($long_text_decode[$all_question->field_name])){
                              $arrya_using = $long_text_decode[$all_question->field_name];
                              foreach($arrya_using as $arrya_using_value){@endphp
                                <input type="text" class="form-control" id="basic-default-fullname" value="<?php echo $arrya_using_value ?>" readonly/>@php
                              
                              }
                            }else{@endphp
                              <input type="text" class="form-control" id="basic-default-fullname" value="<?php echo $long_text_decode[$all_question->field_name]?>" readonly/>@php
                            }
                          }
                          @endphp
                          
                        </div>
                        @endforeach
                         <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <textarea class="form-control" readonly>{{$task->task_des}}</textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Address</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$task->task_address}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Budget  </label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$task->task_budget}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Don't konow Budget</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$task->know}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Are you interested in financing?</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$task->financing}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Date</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$task->datetimes}}" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Time</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="{{$task->shipping}}" readonly/>
                        </div>
                        <!--<div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Gender</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Date of birth</label>
                          <input type="text" class="form-control" id="basic-default-fullname"
                          value="" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Created at</label>
                          <input type="text" class="form-control" id="basic-default-company" value="" readonly/>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Created at</label>
                          <input type="text" class="form-control" id="basic-default-company" value="" readonly/>
                        </div> -->
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')