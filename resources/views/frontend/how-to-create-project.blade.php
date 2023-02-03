@include('layouts.header')
<style>
  #ckeditor_list ul li{list-style-type: disc;}
   #ckeditor_list ol li{list-style-type: decimal;}
</style>

  <main id="main">
    <section class="inner-page-top">
      <div class="container">
        <h1>How to create a project</h1>

        <div class="menu-link-home">
          <ul>
            <li><a href="#">Home</a></li>
            <li>How to create a project</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="content-section-main">
      <div class="container" id="ckeditor_list" >
        <!-- <div class="content-section-banner-img">
          <figure>
            <img src="images/create-project-banner-img.png" alt="">
          </figure>
        </div> -->

        <div class="content-section">
          {!!$how_create_project->create_project_detail!!}











 
          </div>
        </div>
    </section>

    <!-- <section class="life-easier">
      <div class="container">
        <div class="life-easier-content">
          <div class="title">
            <h2>Make your life easier</h2>
          
            <div class="rating-text">Answer questions specific to your needs and enter contact information.</div>
          </div>

          <a class="btn login-btn" href="#"><img src="images/user-icon.png" alt=""> Login/Signup</a>
        </div>
      </div>
    </section> -->

  </main>

  @include('layouts.footer')