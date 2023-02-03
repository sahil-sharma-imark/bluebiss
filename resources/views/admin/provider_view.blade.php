@include('layouts.admin.header')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Provider/</span> {{$provider->name.' '.$provider->lastname}}</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">First Name</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                            value="{{$provider->name}}" readonly />
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Last Name</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                            value="{{$provider->lastname}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Email ID</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                            value="{{$provider->email}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Number</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                            value="{{$provider->number}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Gender</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                            value="{{$provider->gender}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-fullname">Date of birth</label>
                            <input type="text" class="form-control" id="basic-default-fullname"
                            value="{{$provider->dob}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Created at</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$provider->created_at}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Updated at</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$provider->updated_at}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3 mt-5">
                          <div class="col-xl">
                            <h5 class="mb-0">Business Details</h5>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Company Type</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->company_type}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Name</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->business_name}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Number</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->business_number}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Website</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->business_website}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Email</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->business_email}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Date</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->business_date}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Description</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->description}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">No. of employees</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->n_employees}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Price per hour</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->price_per_hour}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Licence number</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->licence_number}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Reg ID number</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->reg_id_number}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Address Line 1</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->loc_address}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Address Line 2</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->loc_address2}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">City</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->loc_city}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">State</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->loc_state}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Country</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->loc_country}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Zip</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->loc_zip}}" readonly/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Radius</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->loc_radius}}" readonly/>
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Lat & Lng</label>
                            <input type="text" class="form-control" id="basic-default-company" value="{{$bus_detail->lat.' & '.$bus_detail->lng}}" readonly/>
                          </div>
                        </div>
                        @php
                        $business = json_decode($bus_detail->image, true);
                        $identity_document = json_decode($bus_detail->identity_document, true);
                        $address_proof = json_decode($bus_detail->address_proof, true);
                        $bus_registration = json_decode($bus_detail->bus_registration, true);
                        $police_cer = json_decode($bus_detail->police_cer, true);


                        
                        @endphp
                        <div class="row mb-3 mt-5">
                          <!-- <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business profile</label>
                            <img style="width: 100px; height: auto" src="{{asset('uploads/provider/'.$bus_detail->provider_id.'/business_profile/'.$bus_detail->bus_img)}}" alt="">
                          </div> -->
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Identity document</label>
                            @if(isset($identity_document))
                            
                            <a href="{{asset('uploads/provider/'.$bus_detail->provider_id.'/business_doc/'.$identity_document['identity_document'])}}" target="_blank">
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
                            @endif
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Address proof</label>
                            @if(isset($address_proof))
                            
                            <a href="{{asset('uploads/provider/'.$bus_detail->provider_id.'/business_doc/'.$address_proof['address_proof'])}}" target="_blank">
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
                            @endif
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Business Registration</label>
                            @if(isset($bus_registration))
                            
                            <a href="{{asset('uploads/provider/'.$bus_detail->provider_id.'/business_doc/'.$bus_registration['bus_registration'])}}" target="_blank">
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
                            @endif
                          </div>
                          <div class="col-xl">
                            <label class="form-label" for="basic-default-company">Police certificate</label>
                             @if(isset($police_cer))
                            
                            <a href="{{asset('uploads/provider/'.$bus_detail->provider_id.'/business_doc/'.$police_cer['police_cer'])}}" target="_blank">
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
                                  <img style="height: 200px; width: auto" src="{{asset('uploads/provider/'.$bus_detail->provider_id.'/business/'.$bus)}}" alt="">
                                </div>
                                @endforeach
                              @else
                              @endif
                          </div>
                            
                          </div>
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