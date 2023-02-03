@include('layouts.header')

  <main id="main">

    <section class="deals-discount">
      <div class="container">
        <ul class="inner-page-links">
          <li><a href="#">Home</a></li>
          <li>Deals and Discount</li>
        </ul>

         <div class="discount-title">
          <h3>Deals and Discount</h3>
         </div>

         <div class="deals-discount-wrppar">
          <div class="left-menus-col">
            <h5>Categories</h5>
              <ul>
                @foreach($all_categorys as $all_category)
                <li><a href="{{url('deals-discount?id='.$all_category->id)}}">{{$all_category->name}}</a></li>
                
                @endforeach
               </ul>
          </div>

          <div class="right-content-col">
            @if(count($all_deals)>0)
              

              

              @foreach($all_deals as $all_deal)  
              @php
              $offertitle = $all_deal->offer_title;
              $offerprice = $all_deal->offer_price;
              $offerdiscount = $all_deal->offer_discount;

              
              $offer_title = json_decode($offertitle, true);
              $offer_price = json_decode($offerprice, true);
              $offer_discount = json_decode($offerdiscount, true);
              
              @endphp
                    <div class="recently-viewed-box">
                      <figure style="background-image: url('{{asset('uploads/deals/'.$all_deal->deal_image)}}');"></figure>
                      <div class="recent-view-cnt">
                        <h6>{{$all_deal->deal_title}}</h6>
                        <div class="rating-wrapper">5.0
                          <ul>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                          </ul>
                        2 Ratings
                      </div>
                      <div class="discount-price">
                        @if(isset($all_deal->deal_title))
                        <h6>{{$offer_title[0]}}</h6>
                        <del>${{$offer_price[0]}}</del>
                        <span>${{$offer_price[0]-$offer_price[0]*$offer_discount[0]/100}}</span>
                        <small>{{$offer_discount[0]}}% Off</small>
                        @else
                        <span>${{$offer_price[0]}}</span>
                        @endif
                      </div>
                      <p>{{$all_deal->deal_description}}</p>
                       @if(isset($all_deal->deal_expiry))
                      <p>Expiry Date <span class="exp-date">{{date('d-M-y',(strtotime($all_deal->deal_expiry)))}}</span></p>
                      @endif
                      <a class="btn" href="{{url('deal-&-detail/'.$all_deal->id)}}"> View Deal </a>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <div class="recent-requests-main">
                    <div class="recent-requests-content" style="padding: 0px;">
                      <figure>
                        <img src="{{asset('images/requests-img.svg')}}" alt="">
                      </figure>
                      <h5>You have no deal & discount in selected category.</h5>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </section>
      </main>
  
  @include('layouts.footer')