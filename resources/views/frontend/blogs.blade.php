@include('layouts.header')

  <main id="main">
    <section class="inner-page-top">
      <div class="container">
        <h1>Blog</h1>

        <div class="menu-link-home">
          <ul>
            <li><a href="#">Home</a></li>
            <li>Blog</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="blog">
      <div class="container">
        <div class="row">
          
          @foreach($all_blogs as $all_blog)
          <div class="col-md-4">
            <div class="blog-box">
              <a href="#"></a>

              <figure>
                <img src="{{asset('uploads/blog/'.$all_blog->blog_image)}}" alt="">
              </figure>

              <div class="blog-box-content">
                <a  href="{{url('blog-detail/'.$all_blog->blog_slug)}}">
                  <h5>{{Str::limit(strip_tags($all_blog->blog_title), $limit = 25, $end = '...')}}</h5>
                </a>
                {!!Str::limit($all_blog->blog_title, $limit = 50, $end = '...')!!}
                
                
                <a  href="{{url('blog-detail/'.$all_blog->blog_slug)}}">Rea More</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
 
          <!-- <ul class="pagination">
            <div class="page-count">
                <span>Page 1 of 18</span>
            </div>
            <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link active" href="#"><i class="fa-solid fa-angle-right"></i></a></li>
          </ul> -->
    
      </div>
    </section>

  </main>

  @include('layouts.footer')