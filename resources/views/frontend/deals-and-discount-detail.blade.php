@include('layouts.header')
@php
$selected_cat = DB::table('category')->where('id',$deal_detail->dealid)->first();
@endphp

  <main id="main">

    <section class="clean-solutions">
      <div class="container">
        <ul class="inner-page-links">
          <li><a href="#">Hom</a></li>
          <li>{{$selected_cat->name}}</li>
        </ul>

        <div class="clean-solutions-title">
          <h3>{{$deal_detail->deal_title}}</h3>

         <!--  <p>{{$deal_detail->deal_title}}</p> -->
        </div>
        @php
        $detail_images = json_decode($deal_detail->details_images, true)
        @endphp
        <div class="clean-solutions-wrppar">
          <div class="clean-solutions-left">
            <div class="slider clean-solutions-Slider">
              @if(isset($detail_images))
              @foreach($detail_images as $detail_image)
              <div class="item">
                <figure>
                  <img src="{{asset('uploads/provider/detail_image/'.$detail_image)}}" alt="">
                </figure>
              </div>
              @endforeach
              @endif
            </div>
            <div class="slider slider-nav">
              @if(isset($detail_images))
              @foreach($detail_images as $detail_image)
              <div class="item">
                <figure>
                  <img src="{{asset('uploads/provider/detail_image/'.$detail_image)}}" alt="">
                </figure>
              </div>
              @endforeach
              @endif
            </div>

            <div class="clean-solut-content">
              <h4>Highlights</h4>
             <p>{{$deal_detail->detail_highlight}}</p>
            </div>

            <div class="clean-solut-content">
              <h4>About This Deal</h4>
              
              {{strip_tags($deal_detail->detail_about)}}
            </div>
          </div>
          @php
          $offer_title = json_decode($deal_detail->offer_title, true);
          $offer_price = json_decode($deal_detail->offer_price, true);
          $offer_discount = json_decode($deal_detail->offer_discount, true);
          $len = count($offer_title);
          @endphp

          <div class="clean-solutions-right">

            @for($i=0; $i<=$len-1; $i++)
            <label class="discountBox">
              <input class="discount-check" type="radio" name="discount">

              <div class="discountBox-cnt">
                <p>{{$offer_title[$i]}}</p>

                <div class="discount-price">
                  <del>${{$offer_price[$i]}}</del>
                  <span>${{$offer_price[$i]-$offer_price[$i]*$offer_discount[$i]/100}}</span>
                  <small>{{$offer_discount[$i]}}% Off</small>
                </div>

                 
              </div>
          </label>
          @endfor

          <label class="discountBox">
              <input class="discount-check" type="checkbox" name="agree" checked>

              <label for="Saveinfo">I Agree to the <span>Terms of Service</span> and <span>Privacy
                        Policy</span></label>
          </label>



        <div class="btns">
          <a class="btn" href="#">Buy Now</a>
          <a class="btn gray-br-btn" href="#">Add to Cart</a>
        </div>

          </div>
        </div>
      </div>
    </section>

  </main>

  @include('layouts.footer')