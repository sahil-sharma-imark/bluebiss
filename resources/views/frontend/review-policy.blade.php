@include('layouts.header')
<style>
  #ckeditor_list ul li{list-style-type: disc;}
   #ckeditor_list ol li{list-style-type: decimal;}
</style>

  <main id="main">
    <section class="inner-page-top">
      <div class="container">
        <h1>Review Policy</h1>

        <div class="menu-link-home">
          <ul>
            <li><a href="#">Home</a></li>
            <li>Review Policy</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="inner-page-content-section ">
      <div class="container">
        <div id="ckeditor_list" class="inner-page-content review-policy">
          {!!$review_policy_detail->review_policy_detail!!}
 
        </div>
      </div>
    </section>

  </main>

  @include('layouts.footer')