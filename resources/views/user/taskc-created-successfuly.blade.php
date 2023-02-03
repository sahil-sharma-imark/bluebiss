@include('layouts.header')

<main id="main" class="bg-color-gray">

    <section class="business-detail task-detail-sec">
      <div class="container">
        <form id="stepForm" method="POST" action="">
          <div class="main_wrap">
            <fieldset>
              <div class="wrap_bg">
                <div class="good-news">
                  <div class="good-news-top">
                    <figure>
                      <svg xmlns="http://www.w3.org/2000/svg" width="81.972" height="82" viewBox="0 0 81.972 82">
                        <g id="Group_53194" data-name="Group 53194" transform="translate(-646 -190)">
                          <g id="Group_53193" data-name="Group 53193" transform="translate(641.334 196.647)">
                            <path id="Path_24270" data-name="Path 24270" d="M77.823,42.988c0-3.725-1.893-6.924-4.654-8.13a10.474,10.474,0,0,0,.566-3.42c0-4.862-3.117-8.67-7.1-8.67H57.072c5.43-6.779,7.923-12.52,7.417-17.087-.971-8.721-7.8-11.223-11.315-11.328a3.1,3.1,0,0,0-2.286,1,2.99,2.99,0,0,0-.738,2.417c.023.181.5,4.482-3.75,9.057a13.941,13.941,0,0,1-2.855,2.053,45.336,45.336,0,0,0-8.174,6.168,173.289,173.289,0,0,1-13.5,10.977H8.673a3.01,3.01,0,0,0-3.007,3.014L5.73,59.317a3.009,3.009,0,0,0,3.006,3H20.447c5.11,7.506,12.361,11.972,19.5,11.972H51.364a2.74,2.74,0,0,0,.65-.076,6.018,6.018,0,0,0,1.254.138H62.43c3.98,0,7.1-3.81,7.1-8.672a10.267,10.267,0,0,0-.506-3.221c2.791-1.185,4.71-4.4,4.71-8.151a10.327,10.327,0,0,0-.5-3.2C75.991,49.883,77.823,46.735,77.823,42.988Zm-8.99,11.319c0,2.158-1.158,3.768-2.194,3.768H50.607c-1.038,0-2.2-1.61-2.2-3.768,0-2.133,1.132-3.727,2.16-3.764h16.1C67.7,50.58,68.833,52.174,68.833,54.307Zm-6.4,15.143h-9.16c-1.038,0-2.2-1.613-2.2-3.77a5.621,5.621,0,0,1,.194-1.484,4.294,4.294,0,0,1,1.357-1.786,1.683,1.683,0,0,0,.415-.452,1.057,1.057,0,0,1,.229-.043h9.16c1.036,0,2.2,1.611,2.2,3.766S63.467,69.45,62.431,69.45Zm4.316-22.693c-.036,0-.071-.007-.109-.007H50.607c-.036,0-.072.007-.11.007H48.809c-1.038,0-2.2-1.614-2.2-3.769s1.16-3.77,2.2-3.77H70.726c1.038,0,2.2,1.613,2.2,3.77s-1.16,3.769-2.2,3.769Zm-.109-11.551H50.607c-1.038,0-2.2-1.613-2.2-3.767s1.158-3.769,2.2-3.769H66.639c1.038,0,2.2,1.612,2.2,3.769S67.675,35.206,66.639,35.206ZM50.091,23.385A7.656,7.656,0,0,0,44.569,27.9a1.884,1.884,0,0,0-.506,1.47,8.722,8.722,0,0,0-.278,2.084,8.853,8.853,0,0,0,.286,2.169c-.437,4.551-2.562,11.318-11.187,12.55a1.894,1.894,0,0,0,.263,3.768,1.821,1.821,0,0,0,.271-.021,16.328,16.328,0,0,0,8.951-4.009A8.16,8.16,0,0,0,45.2,49.8a8.6,8.6,0,0,0-1.42,4.773,8.236,8.236,0,0,0,4.27,7.354,8.8,8.8,0,0,0-.358.958,8.76,8.76,0,0,0,0,6.5H39.946c-6.8,0-12.679-5.451-16-10.667a1.894,1.894,0,0,0-1.8-1.3H10.624l-.055-26.492H22.862a1.9,1.9,0,0,0,1.125-.37A187.8,187.8,0,0,0,38.735,18.608a40.662,40.662,0,0,1,7.373-5.556A17.526,17.526,0,0,0,49.99,10.16a18.151,18.151,0,0,0,5-10.5c1.76.65,4.158,2.31,4.63,6.558C60.036,10,56.485,16.387,50.091,23.385Z" transform="translate(0)" fill="#47bbd0" stroke="#fff" stroke-width="2"/>
                          </g>
                          <path id="Icon_feather-check" data-name="Icon feather-check" d="M21.507,9,10.846,19.661,6,14.815" transform="translate(705.404 190.221)" fill="none" stroke="#47bbd0" stroke-width="3"/>
                        </g>
                      </svg>
                    </figure>
                    <h6>Good news!  <br> We've received your request for a quotation.</h6>
                    <P>We will notify you via email and SMS when your request receives quotes from pros. You can follow your request easily,</P>
                    <div class="bnt-right">
                      <a class="btn action-button" href="{{url('my-tasks/'.Auth::user()->id)}}" >Go to my task</a>
  
                      <!-- <input type="button" name="submit" class="submit bg-color-gray action-button" value="Start new task"> -->
                      <a class="btn gray-br-btn bg-color-gray" href="{{url('task-details')}}">Start new task</a>
                    </div>
  
                  </div>
                  <hr>

                  <p class="text-align-left">We will notify you via email and SMS when your request receives quotes from pros. You can follow your request easily,</p>

                  <ul class="count-list">
                    <li>Receive multiple quotes within a few hours.</li>
                    <li>Compare prices, check past projects and read reviews.</li>
                    <li>Call or text the pros to ask questions or work out any details.</li>
                    <li>When you're ready, hire the pro you like and get your project done. </li>
                  </ul>
 
                </div>
              </div>
            </fieldset>
        </form>
      </div>
      </div>
      </div>
      </div>
    </section>

    <div class="provider-listing-popup">
      <div class="modal fade" id="ProjectPublished" aria-hidden="true" aria-labelledby="ProjectPublishedLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="ceate-listing-content">
              <div class="published-text">Your project is almost published.</div>

              <p>We are just missing a few details in order to publish your project. As soon as you fill it out, service providers will send you offers. You can find the draft of this project in My Projects section.</p>
   
              <div class="create-btn">
                <button type="button" class="btn gray-br-btn" data-bs-dismiss="modal">Skip</button>
                
                <a href="#" data-bs-dismiss="modal" class="btn btn-primary">Finish Project</a>
               </div>
              
            </div>
  
          </div>
        </div>
      </div>
    </div>


  </main>

  @include('layouts.footer')


    

    














</body>
</html>