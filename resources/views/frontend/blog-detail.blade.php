@include('layouts.header')

  <main id="main">
    <section class="blog-page-banner" style="background-image: url('{{asset('uploads/blog/'.$blog_detail->blog_image)}}');">
      <div class="container">
         <div class="title">
          <h2>{{$blog_detail->blog_title}}</h2>
      
          <div class="date-provider">{{ucfirst($author_name->author_name)}} | {{date('M-d-Y', strtotime($blog_detail->created_at));}}</div>

         </div>
        </div>
      </div>
    </section>

    <section class="blog-content-section">
      <div class="container">
        <div class="blog-cnt">          
          {!!$blog_detail->blog_des!!}    
        </div>
      </div>
    </section>

    <div class="container">
      <hr class="hr-gray m-0">
    </div>
    @php
    $resent_blogs = DB::table('bluebis_blog')->where('id', '!=' , $blog_detail->id)->get()->toArray();
    
    @endphp 

    @if($resent_blogs)   
    <section class="related-blog">
      <div class="container">
        <h3>Related Blog</h3>

        <div class="blogSlider">
          
          @foreach($resent_blogs as $resent_blog)
          <div>
            <div class="blog-box">
              <a class="link" href="{{url('blog-detail/'.$resent_blog->id)}}"></a>

              <figure>
                <img src="{{asset('uploads/blog/'.$resent_blog->blog_image)}}" alt="">
              </figure>

              <div class="blog-box-content">
                <h5>{{$resent_blog->blog_title}}</h5>

                {!! Str::limit(strip_tags($resent_blog->blog_des), $limit = 150, $end = '...') !!}
              </div>
            </div>
          </div>
          @endforeach

          
        </div>
      </div>
    </section>
    @endif

  </main>

    @include('layouts.footer')