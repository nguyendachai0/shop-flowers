@extends('client.layouts.layout')
@section('content')
  <!-- Start Hero Slider Section-->
  <div class="hero-slider-section">
    <!-- Slider main container -->
    <div class="hero-slider-active swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="assets/images/hero-slider/5ad470634f4b54.1686684520180416164403.jpeg" alt="">
                </div>
                <!-- Hero Slider Content -->
               
            </div> <!-- End Hero Single Slider Item -->
            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="assets/images/hero-slider/5a593056f053d9.4005942320180113050158.jpeg" alt="">
                </div>
                <!-- Hero Slider Content -->
                
            </div> <!-- End Hero Single Slider Item -->
        </div>

        <!-- If we need pagination -->
        <div class="swiper-pagination active-color-golden"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev d-none d-lg-block"></div>
        <div class="swiper-button-next d-none d-lg-block"></div>
    </div>
</div>
<!-- End Hero Slider Section-->

<div class="product-default-slider-section section-top-gap-100 section-fluid pb-7">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">Các mặt hàng</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-2rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-2row p-3">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach($products as $product)
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="{{asset('uploads/'.$product->image)}}" alt="">
                                         
                                        </a>
                                        <div class="tag">
                                            <span>sale</span>
                                        </div>
                                        {{-- <div class="action-link">
                                            <div class="action-link-left">
                                                <form action="{{ route('cart.add') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                                <button  data-bs-toggle="modal"
                                                    >Mua ngay</button>
                                                </form>
                                            </div>
                                           
                                        </div> --}}
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="">
                                                    {{$product->name}}</a></h6>
                                         
                                        </div>
                                        <div class="content-right">
                                            <span class="price">{{$product->price}} VND</span>
                                        </div>
                                        <!-- HTML !-->
                                    </div>
                                    @php
    $cart = session('cart');
@endphp
                                  @if($cart && is_array($cart) && in_array($product->name, array_column(session('cart'), 'name')))
                                  @php
                                  $cartItem = collect(session('cart'))->firstWhere('name', $product->name);
                              @endphp
                             
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                               
                                <div class="quantity-input d-flex justify-content-between">
                                    <livewire:quantity-updater :product="$product" :initialQuantity="$cartItem['quantity']" />
                                </div>                          
                                 
                          
                          

                                  @else
                                    <form class="text-center" action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="productId" value="{{ $product->id }}">
                                        <button class="button-77" role="button">Mua ngay</button>
                                    </form>
                                @endif
                                </div>                            
                                <!-- End Product Default Single Item -->
                                @endforeach
                       
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
      var scrollpos = localStorage.getItem("scrollpos");
      if (scrollpos) window.scrollTo(0, scrollpos);
    });
    function refreshPage(){
    window.onscroll = function (e) {
      localStorage.setItem("scrollpos", window.scrollY);
    };
}
  </script>
@endsection