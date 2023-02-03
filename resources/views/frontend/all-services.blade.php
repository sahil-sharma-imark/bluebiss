@include('layouts.header')

  <main id="main" class="bg-color-gray">
    <section class="all-services">
      <div class="container">
        @foreach($cate as $category)
        <h4>{{$category->cname}}</h4>
        <div class="all-services-box">
          <div class="row">
            @foreach($sub_categories as $sub_category)
            @if($sub_category->catid == $category->cid)
            <div class="col-md-3">
              <ul class="services-list">
                <li style="list-style: none; color: #000">
                  <a style="color: #000" class="nav-link" href="task-details?name={{$sub_category->name}}">{{$sub_category->name}}</a></li>
                <!-- <li><a href="task-details?name='.$row->name.'">'.$row->name.'</a></li> -->
              </ul>
            </div>
            @endif
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </section>
  </main>
  @include('layouts.footer')