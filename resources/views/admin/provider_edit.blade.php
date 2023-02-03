@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @if(session()->has('success'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('success') }}
            </div>
            @endif

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Provider/</span> {{$provider_edit->name.' '.$provider_edit->lastname}}</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form method="POST" action="{{url('edit-profile/'.$provider_edit->id)}}">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">First Name</label>
                            <input type="text" class="form-control" id="name" name="name" 
                            value="{{$provider_edit->name}}" />
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{$provider_edit->lastname}}" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Email ID</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$provider_edit->email}}" />
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Number</label>
                            <input type="text" class="form-control" id="number" name="number" value="{{$provider_edit->number}}" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="{{$provider_edit->gender}}" />
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Date of birth</label>
                            <input type="text" class="form-control" id="dob" name="dob"    value="{{$provider_edit->dob}}" />
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">User Type</label>
                            <select class="form-select" name="status" aria-label="Default select example">
                            <option value="3" {{ ( $provider_edit->user_type == 3) ? 'selected' : '' }}>Provider</option>
                            <option value="2" {{ ( $provider_edit->user_type == 2) ? 'selected' : '' }}>User</option>
                          </select>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>

                        <div class="row mb-3 mt-5">
                          <div class="col-xl">
                            <h5 class="mb-0">Business Details</h5>
                          </div>
                        </div>

                      <form method="POST" action="{{url('business-edit/'.$business_edit->provider_id)}}">
                        @csrf
                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Company Type</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->company_type}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Name</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->business_name}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Number</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->business_number}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Website</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->business_website}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Email</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->business_email}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Date</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->business_date}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Description</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->description}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">No. of employees</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->n_employees}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Price per hour</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->price_per_hour}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Licence number</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->licence_number}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Reg ID number</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->reg_id_number}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Address Line 1</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->loc_address}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Address Line 2</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->loc_address2}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">City</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->loc_city}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">State</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->loc_state}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Country</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->loc_country}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Zip</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->loc_zip}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Radius</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->loc_radius}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Lat & Lng</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$business_edit->lat.' & '.$business_edit->lng}}" readonly/>
                          </div>
                        </div>
                        @php
                        $business = json_decode($business_edit->image, true);
                        $identity_document = json_decode($business_edit->identity_document, true);
                        $address_proof = json_decode($business_edit->address_proof, true);
                        $bus_registration = json_decode($business_edit->bus_registration, true);
                        $police_cer = json_decode($business_edit->police_cer, true);


                        
                        @endphp

                        <div class="row mb-3">
                          <!-- <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business profile</label>
                            <img style="width: 100px; height: auto" src="{{asset('uploads/provider/'.$business_edit->provider_id.'/business_profile/'.$business_edit->bus_img)}}" alt="">
                          </div> -->
                          <div class="col-xl">
                            
                            @if(isset($identity_document))
                            
                            <a href="{{asset('uploads/provider/'.$business_edit->provider_id.'/business_doc/'.$identity_document['identity_document'])}}" target="_blank">
                              <figure>
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" viewBox="0 0 20.2 25">
                                  <g id="Icon_feather-file" data-name="Icon feather-file" transform="translate(-6 -2)">
                                    <path id="Path_26178" data-name="Path 26178" d="M16.8,3H8.4A2.4,2.4,0,0,0,6,5.4V24.6A2.4,2.4,0,0,0,8.4,27H22.8a2.4,2.4,0,0,0,2.4-2.4V11.4Z" fill="#1caf4d"></path>
                                    <path id="Path_26179" data-name="Path 26179" d="M19.5,3v7.881h7.881" transform="translate(-2.181)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    <path id="Path_26180" data-name="Path 26180" d="M-17710.422-5988.924l3.176,3.178,5.824-5.822" transform="translate(17721.521 6007.128)" fill="none" stroke="#fff" stroke-width="2"></path>
                                  </g>
                                </svg>
                              </figure>
                            </a>
                            <label class="form-label" for="basic-default-company">Identity document</label>
                            <select class="form-select" name="identity_doc_status" aria-label="Default select example">
                            <option value="0" {{ ( $identity_document['status'] == 0) ? 'selected' : '' }}>Verified</option>
                            <option value="1" {{ ( $identity_document['status'] == 1) ? 'selected' : '' }}>Need to verify
                            </option>
                          </select>
                            @endif
                          </div>
                          <div class="col-xl">
                            
                            @if(isset($address_proof))
                            
                            <a href="{{asset('uploads/provider/'.$business_edit->provider_id.'/business_doc/'.$address_proof['address_proof'])}}" target="_blank">
                              <figure>
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" viewBox="0 0 20.2 25">
                                  <g id="Icon_feather-file" data-name="Icon feather-file" transform="translate(-6 -2)">
                                    <path id="Path_26178" data-name="Path 26178" d="M16.8,3H8.4A2.4,2.4,0,0,0,6,5.4V24.6A2.4,2.4,0,0,0,8.4,27H22.8a2.4,2.4,0,0,0,2.4-2.4V11.4Z" fill="#1caf4d"></path>
                                    <path id="Path_26179" data-name="Path 26179" d="M19.5,3v7.881h7.881" transform="translate(-2.181)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    <path id="Path_26180" data-name="Path 26180" d="M-17710.422-5988.924l3.176,3.178,5.824-5.822" transform="translate(17721.521 6007.128)" fill="none" stroke="#fff" stroke-width="2"></path>
                                  </g>
                                </svg>
                              </figure>
                            </a>
                            <label class="form-label" for="basic-default-company">Address proof</label>
                            <select class="form-select" name="address_proof_status" aria-label="Default select example">
                            <option value="0" {{ ( $address_proof['status'] == 0) ? 'selected' : '' }}>Verified</option>
                            <option value="1" {{ ( $address_proof['status'] == 1) ? 'selected' : '' }}>Need to verify
                            </option>
                          </select>
                            @endif
                          </div>
                          <div class="col-xl">
                           
                            @if(isset($bus_registration))
                            
                            <a href="{{asset('uploads/provider/'.$business_edit->provider_id.'/business_doc/'.$bus_registration['bus_registration'])}}" target="_blank">
                              <figure>
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" viewBox="0 0 20.2 25">
                                  <g id="Icon_feather-file" data-name="Icon feather-file" transform="translate(-6 -2)">
                                    <path id="Path_26178" data-name="Path 26178" d="M16.8,3H8.4A2.4,2.4,0,0,0,6,5.4V24.6A2.4,2.4,0,0,0,8.4,27H22.8a2.4,2.4,0,0,0,2.4-2.4V11.4Z" fill="#1caf4d"></path>
                                    <path id="Path_26179" data-name="Path 26179" d="M19.5,3v7.881h7.881" transform="translate(-2.181)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    <path id="Path_26180" data-name="Path 26180" d="M-17710.422-5988.924l3.176,3.178,5.824-5.822" transform="translate(17721.521 6007.128)" fill="none" stroke="#fff" stroke-width="2"></path>
                                  </g>
                                </svg>
                              </figure>
                            </a>
                            <label class="form-label" for="basic-default-company">Business Registration</label>
                            <select class="form-select" name="bus_registration_status" aria-label="Default select example">
                            <option value="0" {{ ( $bus_registration['status'] == 0) ? 'selected' : '' }}>Verified</option>
                            <option value="1" {{ ( $bus_registration['status'] == 1) ? 'selected' : '' }}>Need to verify
                            </option>
                          </select>
                            @endif

                          </div>
                          <div class="col-xl">
                            
                             @if(isset($police_cer))
                            
                            <a href="{{asset('uploads/provider/'.$business_edit->provider_id.'/business_doc/'.$police_cer['police_cer'])}}" target="_blank">
                              <figure>
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="100" viewBox="0 0 20.2 25">
                                  <g id="Icon_feather-file" data-name="Icon feather-file" transform="translate(-6 -2)">
                                    <path id="Path_26178" data-name="Path 26178" d="M16.8,3H8.4A2.4,2.4,0,0,0,6,5.4V24.6A2.4,2.4,0,0,0,8.4,27H22.8a2.4,2.4,0,0,0,2.4-2.4V11.4Z" fill="#1caf4d"></path>
                                    <path id="Path_26179" data-name="Path 26179" d="M19.5,3v7.881h7.881" transform="translate(-2.181)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    <path id="Path_26180" data-name="Path 26180" d="M-17710.422-5988.924l3.176,3.178,5.824-5.822" transform="translate(17721.521 6007.128)" fill="none" stroke="#fff" stroke-width="2"></path>
                                  </g>
                                </svg>
                              </figure>
                            </a>
                            <label class="form-label" for="basic-default-company">Police certificate</label>
                            <select class="form-select" name="police_cer_status" aria-label="Default select example">
                            <option value="0" {{ ( $police_cer['status'] == 0) ? 'selected' : '' }}>Verified</option>
                            <option value="1" {{ ( $police_cer['status'] == 1) ? 'selected' : '' }}>Need to verify
                            </option>
                          </select>
                            @endif
                            
                          </div>
                        </div>

                        <!-- <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Image</label>
                            <div class="row">
                              @if($business)
                                @foreach($business as $bus)
                                <div class="col-md-3">
                                  <img style="height: 200px; width: auto" src="{{asset('uploads/provider/'.$business_edit->provider_id.'/business/'.$bus)}}" alt="">
                                </div>
                                @endforeach
                              @else
                              @endif
                          </div>
                            
                          </div>
                        </div> -->

                        
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('layouts.admin.footer')