@include('layouts.header')

  <main id="main">
    <section class="profile_provider">
      <div class="container">
        <div class="profile_head" style="background-image: url('{{asset('images/banner-group.jpg')}}');">
          <div class="top_bar">
            <a class="arrow" href="#">
              <i class="fa-solid fa-arrow-left"></i>
            </a>
            <a href="#" class="btn">Change Cover</a>
          </div>
          <div class="rating_bar">
            <ul>
              <li>
                <span>4.3 <i class="fa-solid fa-star"></i></span>
                Ratings
              </li>
              <li>
                <span>50</span>
                Reviews
              </li>
              <li>
                <span>3</span>
                Tasks
              </li>
            </ul>
          </div>
        </div>
        <div class="profile_middle">
          <div class="profile_detail">
            <div class="profile">
              <figure>
                <img src="{{asset('uploads/provider/'.$pro_profile->provider_id.'/'.$pro_profile->image)}}" alt="profile">
              </figure>
              <div class="ctnt">
                <h5>{{$pro_profile->name.' '.$pro_profile->lastname}}.
                  <svg xmlns="http://www.w3.org/2000/svg" width="15.104" height="20" viewBox="0 0 15.104 20">
                    <g id="badge" transform="translate(-0.002 0.001)">
                      <path id="Path_24108" data-name="Path 24108"
                        d="M14.9,367.339a2.405,2.405,0,0,1-2.762-1.005,2.41,2.41,0,0,1-1.448-.561q-.078-.065-.149-.136l-1.306,2.734a.593.593,0,0,0,.667.835l2.619-.594,1.183,2.411a.594.594,0,0,0,.533.332h0a.593.593,0,0,0,.532-.338l1.519-3.178a2.411,2.411,0,0,1-1.39-.5Zm0,0"
                        transform="translate(-8.819 -351.355)" fill="#47bbd0" />
                      <path id="Path_24109" data-name="Path 24109"
                        d="M200.978,365.773a5.056,5.056,0,0,0-2.658,1.534,2.41,2.41,0,0,1-1.552.032,2.411,2.411,0,0,1-1.39.5l1.519,3.178a.594.594,0,0,0,.532.337h0a.593.593,0,0,0,.533-.332l1.183-2.411,2.619.594a.593.593,0,0,0,.667-.835l-1.307-2.734Q201.056,365.708,200.978,365.773Zm0,0"
                        transform="translate(-187.745 -351.355)" fill="#47bbd0" />
                      <path id="Path_24110" data-name="Path 24110"
                        d="M14.846,7.284A1.22,1.22,0,0,0,14.531,5.5a.593.593,0,0,1-.25-.686,1.22,1.22,0,0,0-.907-1.571.593.593,0,0,1-.47-.559,1.22,1.22,0,0,0-1.389-1.166.593.593,0,0,1-.632-.365,1.219,1.219,0,0,0-1.7-.62A.594.594,0,0,1,8.46.4,1.22,1.22,0,0,0,6.647.4.594.594,0,0,1,5.927.53a1.219,1.219,0,0,0-1.7.62.593.593,0,0,1-.632.365A1.22,1.22,0,0,0,2.2,2.682a.594.594,0,0,1-.47.56,1.22,1.22,0,0,0-.907,1.57.594.594,0,0,1-.25.686A1.22,1.22,0,0,0,.26,7.284a.593.593,0,0,1,0,.73A1.22,1.22,0,0,0,.575,9.8a.593.593,0,0,1,.25.686,1.22,1.22,0,0,0,.907,1.571.593.593,0,0,1,.47.56,1.22,1.22,0,0,0,1.389,1.166.593.593,0,0,1,.632.365,1.22,1.22,0,0,0,1.7.62.593.593,0,0,1,.719.127,1.22,1.22,0,0,0,1.813,0,.593.593,0,0,1,.719-.127,1.22,1.22,0,0,0,1.7-.62.593.593,0,0,1,.633-.365,1.22,1.22,0,0,0,1.389-1.166.593.593,0,0,1,.469-.56,1.22,1.22,0,0,0,.907-1.571.593.593,0,0,1,.25-.686,1.219,1.219,0,0,0,.315-1.786.593.593,0,0,1,0-.73ZM7.553,12.848a5.2,5.2,0,1,1,5.2-5.2A5.205,5.205,0,0,1,7.553,12.848Zm0,0"
                        fill="#f9a52b" />
                      <path id="Path_24111" data-name="Path 24111"
                        d="M94.614,93.105a4.013,4.013,0,1,0,4.013,4.013A4.017,4.017,0,0,0,94.614,93.105Zm-2.506,3.277a.593.593,0,0,1,.839,0l1.183,1.183,2.152-2.152a.593.593,0,0,1,.839.839l-2.571,2.572a.593.593,0,0,1-.839,0l-1.6-1.6a.593.593,0,0,1,0-.839Zm0,0"
                        transform="translate(-87.06 -89.469)" fill="#f9a52b" />
                    </g>
                  </svg>

                </h5>
                <p>Last online 14 minutes ago</p>
                <span><i class="fa-solid fa-font-awesome"></i> Report this member</span>
              </div>
            </div>
            @if(Auth::user())
            <div class="pro_btn">
              <a href="#" class="btn"><i class="fa-solid fa-file-invoice"></i> Send Request</a>
              @php
              $oo = "Ok";
              $ewr = Auth::id();
              $p_id = $pro_profile->id;
              //echo  $ewr;exit();
              $f_p = DB::table('favorite_provider')->where('provider_id',$p_id)
              ->get()->toArray();
              if(array_search($ewr, array_column($f_p, 'user_id')) !== false)
              {
                @endphp
                <a style="color:red" class="btn"><i class="fa-regular fa-heart"></i> Favorite</a>
                @php
              }
              else
              {
                @endphp
                <a href="{{url('favorite-provider/'.$pro_profile->provider_id)}}" class="btn active"><i class="fa-regular fa-heart"></i> Favorite</a>
                @php
              }
              @endphp
            </div>
            @else
            <div class="pro_btn">
              <a href="http://127.0.0.1:8000/login" class="btn"><i class="fa-solid fa-file-invoice"></i> Send Request</a>
              <a href="http://127.0.0.1:8000/login" class="btn"><i class="fa-regular fa-heart"></i> Favorite</a>
            </div>
            @endif
          </div>
          <div class="wraper_row">
            <div class="col_wrapr">
              <div class="preview_ctnt">
                <div class="badge_ctnt">
                  <h6>Badges</h6>
                  <ul>
                    <li>
                      <figure><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24">
                          <path id="Icon_map-police" data-name="Icon map-police"
                            d="M15.171,10.492c0,1.685-1.395,1.685-2.146,1.685h-.937V8.992h1.178c.659,0,1.906,0,1.906,1.5Zm7.2-1.682a10.616,10.616,0,0,1,1.512-4.729L20.521.72a6.047,6.047,0,0,1-3.64,1.51,6.264,6.264,0,0,1-3.564-.717,6.7,6.7,0,0,1-3.571.717A6.471,6.471,0,0,1,6.283.859L2.914,4.219A10.42,10.42,0,0,1,4.295,8.811a8.289,8.289,0,0,1-.638,3.059c-.247.726-.433,1.356-.56,1.882a9.435,9.435,0,0,0-.216,1.266,6.187,6.187,0,0,0,1.177,3.775,13.783,13.783,0,0,0,3.1,2.708,20.061,20.061,0,0,0,3.639,1.541l.706.328c.222.107.46.211.709.324a2.981,2.981,0,0,1,1.11,1.029,3.235,3.235,0,0,1,1.139-1.029q.46-.2.912-.414c.245-.108.428-.189.534-.238q.348-.168.709-.308c.292-.115.651-.255,1.081-.41a8.994,8.994,0,0,0,1.818-.823,15.772,15.772,0,0,0,3.059-2.67,6.1,6.1,0,0,0,1.216-3.813,13.687,13.687,0,0,0-.808-3.046,8.214,8.214,0,0,1-.606-3.16Zm-6.175,4.605a4.61,4.61,0,0,1-2.467.522H12.155v4.3H9.79V7.2h3.357c1.56,0,2.865.1,3.771,1.205a3.222,3.222,0,0,1,.661,2.069,3.456,3.456,0,0,1-1.385,2.939Z"
                            transform="translate(-2.881 -0.72)" fill="#1caf4d" />
                        </svg>
                      </figure>
                      <div class="ctnt">
                        Police Certificate
                        <span>Verified</span>
                      </div>
                    </li>
                    <li>
                      <figure><svg xmlns="http://www.w3.org/2000/svg" width="24.5" height="24" viewBox="0 0 24.5 24">
                          <g id="Group_54948" data-name="Group 54948" transform="translate(-696 -556)">
                            <circle id="Ellipse_610" data-name="Ellipse 610" cx="12" cy="12" r="12"
                              transform="translate(696 556)" fill="rgba(253,227,200,0)" />
                            <g id="Group_52867" data-name="Group 52867" transform="translate(696 556)">
                              <circle id="Ellipse_611" data-name="Ellipse 611" cx="12" cy="12" r="12"
                                transform="translate(0.5)" fill="#47bbd0" />
                              <path id="Path_24245" data-name="Path 24245"
                                d="M-17710.422-5988.414l3.789,3.79,6.945-6.944"
                                transform="translate(17717.055 5999.991)" fill="none" stroke="#fff" stroke-width="2" />
                            </g>
                          </g>
                        </svg>

                      </figure>
                      <div class="ctnt">
                        Reference checked
                        <span>Verified</span>
                      </div>
                    </li>
                    <li>
                      <figure><svg xmlns="http://www.w3.org/2000/svg" width="23.106" height="18.728"
                          viewBox="0 0 23.106 18.728">
                          <g id="Group_54949" data-name="Group 54949" transform="translate(-528 -923)">
                            <rect id="Rectangle_13734" data-name="Rectangle 13734" width="23.106" height="14.951" rx="2"
                              transform="translate(528 926.777)" fill="#f9a52b" />
                            <g id="Rectangle_13735" data-name="Rectangle 13735" transform="translate(535.106 923)"
                              fill="none" stroke="#f9a52b" stroke-width="2">
                              <rect width="9" height="6" rx="2" stroke="none" />
                              <rect x="1" y="1" width="7" height="4" rx="1" fill="none" />
                            </g>
                            <path id="Path_26190" data-name="Path 26190"
                              d="M-17710.422-5988.924l3.176,3.178,5.824-5.822" transform="translate(18245.629 6922.909)"
                              fill="none" stroke="#fff" stroke-width="2" />
                          </g>
                        </svg>

                      </figure>
                      <div class="ctnt">
                        Registered business
                        <span>Verified</span>
                      </div>
                    </li>
                    <li>
                      <figure><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24">
                          <g id="Group_54950" data-name="Group 54950" transform="translate(-699 -556)">
                            <path id="Icon_awesome-calendar" data-name="Icon awesome-calendar"
                              d="M.563,9H20.438A.564.564,0,0,1,21,9.563V21.75A2.251,2.251,0,0,1,18.75,24H2.25A2.251,2.251,0,0,1,0,21.75V9.563A.564.564,0,0,1,.563,9ZM21,6.938V5.25A2.251,2.251,0,0,0,18.75,3H16.5V.563A.564.564,0,0,0,15.938,0H14.063A.564.564,0,0,0,13.5.563V3h-6V.563A.564.564,0,0,0,6.938,0H5.063A.564.564,0,0,0,4.5.563V3H2.25A2.251,2.251,0,0,0,0,5.25V6.938A.564.564,0,0,0,.563,7.5H20.438A.564.564,0,0,0,21,6.938Z"
                              transform="translate(699 556)" fill="#778da7" />
                            <path id="Path_26191" data-name="Path 26191"
                              d="M-17710.422-5988.924l3.176,3.178,5.824-5.822" transform="translate(18415.422 6560.128)"
                              fill="none" stroke="#fff" stroke-width="2" />
                          </g>
                        </svg>

                      </figure>
                      <div class="ctnt">
                        8 Years in business
                        <span>Verified</span>
                      </div>
                    </li>
                    <li>
                      <figure><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                          <g id="Group_54952" data-name="Group 54952" transform="translate(-340.5 -976)">
                            <circle id="Ellipse_674" data-name="Ellipse 674" cx="12" cy="12" r="12"
                              transform="translate(340.5 976)" fill="#f59158" />
                            <g id="Group_54652" data-name="Group 54652" transform="translate(5.627 3.199)">
                              <path id="Icon_awesome-tasks" data-name="Icon awesome-tasks"
                                d="M3.476,2.336a.3.3,0,0,0-.423,0L1.467,3.912.9,3.361a.3.3,0,0,0-.423,0l-.391.391a.3.3,0,0,0,0,.423l1.185,1.18a.318.318,0,0,0,.438,0L2.1,4.967l1.8-1.8a.3.3,0,0,0,0-.423Zm0,3.432a.3.3,0,0,0-.423,0L1.467,7.354.9,6.8a.3.3,0,0,0-.423,0l-.391.391a.3.3,0,0,0,0,.423L1.27,8.8a.318.318,0,0,0,.438,0L2.1,8.41l1.8-1.8a.3.3,0,0,0,0-.421ZM1.593,9.551a1.2,1.2,0,1,0,0,2.39,1.195,1.195,0,1,0,0-2.39Zm10.755.4H5.178a.4.4,0,0,0-.4.4v.8a.4.4,0,0,0,.4.4h7.17a.4.4,0,0,0,.4-.4v-.8A.4.4,0,0,0,12.348,9.949Zm0-6.9H5.178a.4.4,0,0,0-.4.4v.8a.4.4,0,0,0,.4.4h7.17a.4.4,0,0,0,.4-.4v-.8A.4.4,0,0,0,12.348,3.045Zm0,3.452H5.178a.4.4,0,0,0-.4.4v.8a.4.4,0,0,0,.4.4h7.17a.4.4,0,0,0,.4-.4V6.9A.4.4,0,0,0,12.348,6.5Z"
                                transform="translate(340 975.752)" fill="#fff" />
                              <path id="Icon_awesome-tasks-2" data-name="Icon awesome-tasks"
                                d="M1.932,18a1.2,1.2,0,1,0,0,2.39,1.195,1.195,0,1,0,0-2.39Zm10.755.4H5.517a.4.4,0,0,0-.4.4v.8a.4.4,0,0,0,.4.4h7.17a.4.4,0,0,0,.4-.4v-.8A.4.4,0,0,0,12.687,18.4Z"
                                transform="translate(339.661 971.021)" fill="#fff" />
                            </g>
                          </g>
                        </svg>

                      </figure>
                      <div class="ctnt">
                        Service insured
                        <span>Verified</span>
                      </div>
                    </li>
                    <li>
                      <figure><svg xmlns="http://www.w3.org/2000/svg" width="20.2" height="25" viewBox="0 0 20.2 25">
                          <g id="Icon_feather-file" data-name="Icon feather-file" transform="translate(-6 -2)">
                            <path id="Path_26178" data-name="Path 26178"
                              d="M16.8,3H8.4A2.4,2.4,0,0,0,6,5.4V24.6A2.4,2.4,0,0,0,8.4,27H22.8a2.4,2.4,0,0,0,2.4-2.4V11.4Z"
                              fill="#1caf4d" />
                            <path id="Path_26179" data-name="Path 26179" d="M19.5,3v7.881h7.881"
                              transform="translate(-2.181)" fill="none" stroke="#fff" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" />
                            <path id="Path_26180" data-name="Path 26180"
                              d="M-17710.422-5988.924l3.176,3.178,5.824-5.822" transform="translate(17721.521 6007.128)"
                              fill="none" stroke="#fff" stroke-width="2" />
                          </g>
                        </svg>

                      </figure>
                      <div class="ctnt">
                        Licensed to operate
                        <span>Verified</span>
                      </div>
                    </li>
                    <li>
                      <figure><svg xmlns="http://www.w3.org/2000/svg" width="21.767" height="24"
                          viewBox="0 0 21.767 24">
                          <path id="Path_26205" data-name="Path 26205"
                            d="M5.55,12.988a10.824,10.824,0,0,1,4.927-9.109.287.287,0,0,1,.311,0l1.6,1.041a.181.181,0,0,1-.017.311,8.759,8.759,0,0,0,3.8,16.517v-.771a.331.331,0,0,1,.517-.277L19.5,22.538a.331.331,0,0,1,0,.553l-2.821,1.841a.331.331,0,0,1-.509-.277v-.784A10.924,10.924,0,0,1,5.55,12.988ZM16.706,2.1V1.32a.331.331,0,0,0-.517-.277L13.369,2.882a.331.331,0,0,0,0,.553L16.19,5.277A.331.331,0,0,0,16.7,5V4.229a8.759,8.759,0,0,1,3.8,16.514.181.181,0,0,0-.017.311l1.6,1.041a.287.287,0,0,0,.311,0A10.887,10.887,0,0,0,16.706,2.1Zm-.272,16.948A6.061,6.061,0,1,1,22.5,12.988a6.061,6.061,0,0,1-6.061,6.061Zm2.172-4.866c0-.889-.473-1.43-1.648-1.846-.84-.328-1.185-.524-1.185-.85,0-.277.208-.553.85-.553a3.032,3.032,0,0,1,.874.125.556.556,0,0,0,.157.022A.573.573,0,0,0,17.8,9.957a4.219,4.219,0,0,0-.9-.13V9.445a.49.49,0,1,0-.98,0V9.9a1.825,1.825,0,0,0-1.668,1.758c0,.957.72,1.452,1.778,1.807.735.245,1.046.49,1.046.86s-.384.612-.948.612a3.318,3.318,0,0,1-1.068-.184.588.588,0,0,0-.189-.032.558.558,0,0,0-.546.419v.047a.573.573,0,0,0,.38.686,4.564,4.564,0,0,0,1.178.211v.453a.49.49,0,1,0,.967,0v-.526a1.888,1.888,0,0,0,1.756-1.824Z"
                            transform="translate(-5.55 -0.986)" fill="#47bbd0" />
                        </svg>

                      </figure>
                      <div class="ctnt">
                        No-Show Reimbursement Guarantee
                        <span>Verified</span>
                      </div>
                    </li>
                    <li>
                      <figure><svg xmlns="http://www.w3.org/2000/svg" width="21.597" height="24"
                          viewBox="0 0 21.597 24">
                          <g id="Group_54951" data-name="Group 54951" transform="translate(-697.202 -556.989)">
                            <g id="Group_54561" data-name="Group 54561" transform="translate(688.212 552.353)">
                              <g id="Group_54562" data-name="Group 54562" transform="translate(8.989 4.636)">
                                <path id="Path_26166" data-name="Path 26166"
                                  d="M20.052,4.709l10.175,5.06a.638.638,0,0,1,.359.608,23.761,23.761,0,0,1-3.263,11.17,20.556,20.556,0,0,1-7.216,7,.636.636,0,0,1-.664,0,20.789,20.789,0,0,1-7.216-7,24.3,24.3,0,0,1-3.235-11.2.613.613,0,0,1,.359-.608L19.5,4.709a.563.563,0,0,1,.553,0Z"
                                  transform="translate(-8.989 -4.636)" fill="#1caf4d" fill-rule="evenodd" />
                                <path id="Path_26168" data-name="Path 26168"
                                  d="M8.3-2.7a2.344,2.344,0,0,0-.728-1.8,5.107,5.107,0,0,0-2.38-1.043L4.9-5.614V-9.086a2.277,2.277,0,0,1,1.421.616,2.249,2.249,0,0,1,.525,1.4h1.2q-.1-2.786-3.15-3.08v-1.442H3.92v1.4a3.829,3.829,0,0,0-2.317.77A2.264,2.264,0,0,0,.756-7.588a2.358,2.358,0,0,0,.756,1.869A5.187,5.187,0,0,0,3.78-4.7l.14.028V-.882A2.237,2.237,0,0,1,1.638-3.29H.42A3.32,3.32,0,0,0,1.351-.812,4.018,4.018,0,0,0,3.92.2V1.624H4.9V.21A3.98,3.98,0,0,0,7.406-.637,2.6,2.6,0,0,0,8.3-2.7ZM1.974-7.588a1.317,1.317,0,0,1,.5-1.085A2.518,2.518,0,0,1,3.92-9.128v3.29A3.674,3.674,0,0,1,2.394-6.5,1.4,1.4,0,0,1,1.974-7.588ZM4.9-4.452a4.407,4.407,0,0,1,1.687.679,1.3,1.3,0,0,1,.5,1.071q0,1.694-2.184,1.848Z"
                                  transform="translate(6.437 16)" fill="#fff" stroke="#fff" stroke-width="0.3" />
                              </g>
                            </g>
                          </g>
                        </svg>

                      </figure>
                      <div class="ctnt">
                        Late-Fee Guarantee
                        <span>Verified</span>
                      </div>
                    </li>
                  </ul>
                  <div class="about_ctnt">
                    <h6>About Me</h6>
                    <p>{{$pro_profile->description}}</p>
                    
                   
                 
                    <!-- <a href="#">Read More</a> -->
                    <h6>No of Employees</h6>
                    <p>{{$pro_profile->n_employees}}</p>
                    <div class="gallery">
                      <div class="gallery_head">
                        <h5>Gallery <span class="badge">5</span></h5>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="gallery_ctnt">
                            <figure style="background-image: url('images/gallery_1.png');"></figure>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="gallery_ctnt">
                            <figure style="background-image: url('images/gallery_2.png');"></figure>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="gallery_ctnt">
                            <figure style="background-image: url('images/gallery_3.png');"></figure>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="gallery_ctnt">
                            <figure style="background-image: url('images/gallery_4.png');"></figure>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="gallery_ctnt">
                            <figure style="background-image: url('images/gallery_5.png');"></figure>
                          </div>
                        </div>
                      </div>
                    </div>
                    @php
                      $service_lists = DB::table('listed_services')
                      ->where('lis_providerid',$pro_profile->provider_id)
                      ->get()->toarray();
                      $count_service_lists = count($service_lists);
                      
                      @endphp
                    <div class="service_list">
                      <div class="gallery_head">
                        <h5>Service List <span class="badge">{{$count_service_lists}}</span></h5>
                      </div>
                      
                      <div class="row">
                        @foreach($service_lists as $service_list)
                        <div class="col-md-4">
                          <div class="gallery_ctnt">
                            <figure style="background-image: url('{{asset('uploads/provider/'.$service_list->lis_providerid.'/listing_image/'.$service_list->service_image)}}');"></figure>
                            <h5>{{$service_list->service_name}}</h5>
                            <p>From ${{$pro_profile->price_per_hour}} hr</p>
                            <span>Kimberly S. <i class="fa-solid fa-star"></i> 4.9 (102)</span>
                          </div>
                        </div>
                        @endforeach
                        
                      </div>
                    </div>
                    <div class="rating_list">
                      <div class="gallery_head">
                        <h5>Rating <span class="badge">50</span></h5>
                      </div>
                      <div class="rating_ctnt">
                        <div class="lft_ctnt">
                          <strong>4.8</strong>
                          <ul>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star disabled"></i></li>
                            <li><i class="fa-solid fa-star disabled"></i></li>
                          </ul>
                          <span>50 reviews</span>
                        </div>
                        <div class="right_ctnt">
                          <div class="rating_star">
                            <h6>5 Star</h6>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                aria-valuemax="100" style="width:70%">
                                <span class="sr-only">70% Complete</span>
                              </div>
                            </div>
                            <h6>10</h6>
                          </div>
                          <div class="rating_star">
                            <h6>4 Star</h6>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="32" aria-valuemin="0"
                                aria-valuemax="100" style="width:32%">
                                <span class="sr-only">32% Complete</span>
                              </div>
                            </div>
                            <h6>20</h6>
                          </div>
                          <div class="rating_star">
                            <h6>3 Star</h6>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                aria-valuemax="100" style="width:60%">
                                <span class="sr-only">60% Complete</span>
                              </div>
                            </div>
                            <h6>05</h6>
                          </div>
                          <div class="rating_star">
                            <h6>2 Star</h6>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="0"
                                aria-valuemax="100" style="width:35%">
                                <span class="sr-only">35% Complete</span>
                              </div>
                            </div>
                            <h6>1</h6>
                          </div>
                          <div class="rating_star">
                            <h6>1 Star</h6>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                aria-valuemax="100" style="width:20%">
                                <span class="sr-only">20% Complete</span>
                              </div>
                            </div>
                            <h6>20</h6>
                          </div>
                        </div>
                      </div>
                      <div class="author">
                        <div class="lft_ctnt">
                          <figure>
                            <h5>K</h5>
                          </figure>
                        </div>
                        <div class="author_right">
                          <div class="head_main">
                            <div class="main_lft">
                              <ul>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                              </ul>
                              <h6>Home Cleaning</h6>
                            </div>
                            <span>03 April 2012</span>
                          </div>
                          <div class="middle">
                            <p>Excellent Service, Great work and I will love doing business with him again</p>
                            <ul>
                              <li><svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="19.5"
                                  viewBox="0 0 19.5 19.5">
                                  <g id="Group_54533" data-name="Group 54533" transform="translate(0.75 0.75)">
                                    <circle id="Ellipse_610" data-name="Ellipse 610" cx="9" cy="9" r="9"
                                      fill="rgba(253,227,200,0)" />
                                    <g id="Group_52867" data-name="Group 52867">
                                      <circle id="Ellipse_611" data-name="Ellipse 611" cx="9" cy="9" r="9" fill="none"
                                        stroke="#1caf4d" stroke-width="1.5" />
                                      <path id="Path_24245" data-name="Path 24245"
                                        d="M-17710.422-5989.2l2.842,2.843,5.209-5.208"
                                        transform="translate(17715.396 5997.885)" fill="none" stroke="#1caf4d"
                                        stroke-width="1.5" />
                                    </g>
                                  </g>
                                </svg>
                                Responsive communication</li>
                              <li><svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="19.5"
                                  viewBox="0 0 19.5 19.5">
                                  <g id="Group_54533" data-name="Group 54533" transform="translate(0.75 0.75)">
                                    <circle id="Ellipse_610" data-name="Ellipse 610" cx="9" cy="9" r="9"
                                      fill="rgba(253,227,200,0)" />
                                    <g id="Group_52867" data-name="Group 52867">
                                      <circle id="Ellipse_611" data-name="Ellipse 611" cx="9" cy="9" r="9" fill="none"
                                        stroke="#1caf4d" stroke-width="1.5" />
                                      <path id="Path_24245" data-name="Path 24245"
                                        d="M-17710.422-5989.2l2.842,2.843,5.209-5.208"
                                        transform="translate(17715.396 5997.885)" fill="none" stroke="#1caf4d"
                                        stroke-width="1.5" />
                                    </g>
                                  </g>
                                </svg>
                                Value for money</li>
                              <li><svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="19.5"
                                  viewBox="0 0 19.5 19.5">
                                  <g id="Group_54533" data-name="Group 54533" transform="translate(0.75 0.75)">
                                    <circle id="Ellipse_610" data-name="Ellipse 610" cx="9" cy="9" r="9"
                                      fill="rgba(253,227,200,0)" />
                                    <g id="Group_52867" data-name="Group 52867">
                                      <circle id="Ellipse_611" data-name="Ellipse 611" cx="9" cy="9" r="9" fill="none"
                                        stroke="#1caf4d" stroke-width="1.5" />
                                      <path id="Path_24245" data-name="Path 24245"
                                        d="M-17710.422-5989.2l2.842,2.843,5.209-5.208"
                                        transform="translate(17715.396 5997.885)" fill="none" stroke="#1caf4d"
                                        stroke-width="1.5" />
                                    </g>
                                  </g>
                                </svg>
                                Friendly customer service</li>
                              <li><svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="19.5"
                                  viewBox="0 0 19.5 19.5">
                                  <g id="Group_54533" data-name="Group 54533" transform="translate(0.75 0.75)">
                                    <circle id="Ellipse_610" data-name="Ellipse 610" cx="9" cy="9" r="9"
                                      fill="rgba(253,227,200,0)" />
                                    <g id="Group_52867" data-name="Group 52867">
                                      <circle id="Ellipse_611" data-name="Ellipse 611" cx="9" cy="9" r="9" fill="none"
                                        stroke="#1caf4d" stroke-width="1.5" />
                                      <path id="Path_24245" data-name="Path 24245"
                                        d="M-17710.422-5989.2l2.842,2.843,5.209-5.208"
                                        transform="translate(17715.396 5997.885)" fill="none" stroke="#1caf4d"
                                        stroke-width="1.5" />
                                    </g>
                                  </g>
                                </svg>
                                Quality work</li>
                            </ul>
                            <p>Would you hire again: <strong>Yes</strong></p>
                            <p>Will You recommend to a loved one?: <strong>Yes</strong></p>
                            <strong>Review by: <span>Praveen Solanki</span></strong>
                            <h6>Was this review helpful? <i class="fa-solid fa-heart"></i></h6>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--- Side-Bar -->
            <div class="col_wrapr_mini">
              <article>
                <h6>Business Hours</h6>
                <ul>
                  <li>
                    Mon - Sat
                    <span>10:00am- 8:00 pm</span>
                  </li>
                  <li>
                    Sunday
                    <span>Closed</span>
                  </li>
                </ul>
              </article>
              <article>
                <h6>Location</h6>
                <ul class="location">
                  <li>
                    <i class="fa-solid fa-location-dot"></i>
                    {{$pro_profile->loc_address.', '.
                      $pro_profile->loc_address2.', '.
                      $pro_profile->loc_city.', '.
                      $pro_profile->loc_zip}}
                  </li>
                </ul>
              </article>
              <article>
                <h6>Contact Details</h6>
                <ul class="contact_details">
                  <li>
                    <strong>Mobile Number</strong>
                    <p><svg id="Icon_feather-info" data-name="Icon feather-info" xmlns="http://www.w3.org/2000/svg"
                        width="14" height="14" viewBox="0 0 14 14">
                        <g id="Path_24248" data-name="Path 24248" transform="translate(-3 -3)" fill="none">
                          <path d="M17,10a7,7,0,1,1-7-7A7,7,0,0,1,17,10Z" stroke="none" />
                          <path
                            d="M 10 4.5 C 6.967289924621582 4.5 4.5 6.967289924621582 4.5 10 C 4.5 13.03271007537842 6.967289924621582 15.5 10 15.5 C 13.03271007537842 15.5 15.5 13.03271007537842 15.5 10 C 15.5 6.967289924621582 13.03271007537842 4.5 10 4.5 M 10 3 C 13.86598968505859 3 17 6.134010314941406 17 10 C 17 13.86598968505859 13.86598968505859 17 10 17 C 6.134010314941406 17 3 13.86598968505859 3 10 C 3 6.134010314941406 6.134010314941406 3 10 3 Z"
                            stroke="none" fill="rgba(32,39,43,0.77)" />
                        </g>
                        <path id="Path_24249" data-name="Path 24249" d="M18,21.83V18" transform="translate(-11 -11.345)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                        <path id="Path_24250" data-name="Path 24250" d="M18,12h0" transform="translate(-11 -7.8)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                        <path id="Path_24251" data-name="Path 24251" d="M18,19.439V18" transform="translate(-11 -13.8)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                      </svg>
                      When you book him, then you can see contact information</p>
                  </li>
                  <li>
                    <strong>E-mail</strong>
                    <p><svg id="Icon_feather-info" data-name="Icon feather-info" xmlns="http://www.w3.org/2000/svg"
                        width="14" height="14" viewBox="0 0 14 14">
                        <g id="Path_24248" data-name="Path 24248" transform="translate(-3 -3)" fill="none">
                          <path d="M17,10a7,7,0,1,1-7-7A7,7,0,0,1,17,10Z" stroke="none" />
                          <path
                            d="M 10 4.5 C 6.967289924621582 4.5 4.5 6.967289924621582 4.5 10 C 4.5 13.03271007537842 6.967289924621582 15.5 10 15.5 C 13.03271007537842 15.5 15.5 13.03271007537842 15.5 10 C 15.5 6.967289924621582 13.03271007537842 4.5 10 4.5 M 10 3 C 13.86598968505859 3 17 6.134010314941406 17 10 C 17 13.86598968505859 13.86598968505859 17 10 17 C 6.134010314941406 17 3 13.86598968505859 3 10 C 3 6.134010314941406 6.134010314941406 3 10 3 Z"
                            stroke="none" fill="rgba(32,39,43,0.77)" />
                        </g>
                        <path id="Path_24249" data-name="Path 24249" d="M18,21.83V18" transform="translate(-11 -11.345)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                        <path id="Path_24250" data-name="Path 24250" d="M18,12h0" transform="translate(-11 -7.8)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                        <path id="Path_24251" data-name="Path 24251" d="M18,19.439V18" transform="translate(-11 -13.8)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                      </svg>
                      When you book him, then you can see contact information</p>
                  </li>
                  <li>
                    <strong>Website (optional)</strong>
                    <p><svg id="Icon_feather-info" data-name="Icon feather-info" xmlns="http://www.w3.org/2000/svg"
                        width="14" height="14" viewBox="0 0 14 14">
                        <g id="Path_24248" data-name="Path 24248" transform="translate(-3 -3)" fill="none">
                          <path d="M17,10a7,7,0,1,1-7-7A7,7,0,0,1,17,10Z" stroke="none" />
                          <path
                            d="M 10 4.5 C 6.967289924621582 4.5 4.5 6.967289924621582 4.5 10 C 4.5 13.03271007537842 6.967289924621582 15.5 10 15.5 C 13.03271007537842 15.5 15.5 13.03271007537842 15.5 10 C 15.5 6.967289924621582 13.03271007537842 4.5 10 4.5 M 10 3 C 13.86598968505859 3 17 6.134010314941406 17 10 C 17 13.86598968505859 13.86598968505859 17 10 17 C 6.134010314941406 17 3 13.86598968505859 3 10 C 3 6.134010314941406 6.134010314941406 3 10 3 Z"
                            stroke="none" fill="rgba(32,39,43,0.77)" />
                        </g>
                        <path id="Path_24249" data-name="Path 24249" d="M18,21.83V18" transform="translate(-11 -11.345)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                        <path id="Path_24250" data-name="Path 24250" d="M18,12h0" transform="translate(-11 -7.8)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                        <path id="Path_24251" data-name="Path 24251" d="M18,19.439V18" transform="translate(-11 -13.8)"
                          fill="none" stroke="rgba(32,39,43,0.77)" stroke-width="1.5" />
                      </svg>
                      When you book him, then you can see contact information</p>
                  </li>
                </ul>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  @include('layouts.footer')