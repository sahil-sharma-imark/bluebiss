@include('layouts.header')

  <main id="main">
    <section class="page-404">
      <div class="container">
        <figure>
            <img src="{{asset('images/image-404.png')}}" alt="">
        </figure>

        <h2>404</h2>
        <p>Sorry, the page you are looking for cannot be found.</p>

        <div class="Go-Back-btn">
          <a class="btn btn-go-back" href="{{ url()->previous() }}">Go Home</a>
          <!-- <a class="btn btn-go-home" href="#">Go Home</a> -->
        </div>

        <!-- <a class="link" href="#">Get a Quotation</a> -->
      </div>
    </section>

 

  </main>

 

  <!-- jQuery first, then Bootstrap JS. -->
  <script src="{{asset('js/bundle.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/latest/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/latest/respond.min.js"></script>
     <![endif]-->
</body>

</html>