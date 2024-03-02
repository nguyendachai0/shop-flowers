@extends('client.layouts.layout')
@section('content')
<!-- ...:::: Start Cart Section:::... -->
<div class="cart-section">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_remove">Xóa</th>
                                        <th class="product_thumb">Ảnh</th>
                                        <th class="product_name">Tên</th>
                                        <th class="product-price">Giả</th>
                                        <th class="product_quantity">Số lượng</th>
                                        <th class="product_total">Tổng phụ</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>
                                    <!-- Start Cart Single Item-->
                                    @foreach(session('cart', []) as $item)
                                    <tr>
                                        <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td class="product_thumb">
                                            <a href="product-details-default.html">
                                                <img src="{{ asset('uploads/' . ($item['image'] ?? 'default.png')) }}" alt="{{ $item['name'] }}">
                                            </a>
                                        </td>
                                        <td class="product_name">
                                            <a href="product-details-default.html">{{ $item['name'] }}</a>
                                        </td>
                                        <td class="product_price">{{ $item['price'] }} VND</td>
                                        <td class="product_quantity">
                                          
                                            <input min="1" max="100" value="{{ $item['quantity'] }}" type="number">
                                        </td>
                                        <td>{{ $item['price'] * $item['quantity'] }} VND</td>
                                    </tr> <!-- End Cart Single Item-->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->

    <!-- Start Coupon Start -->
    <div class="coupon_area">
        <div class="container">
            <div class="row">
              
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                        <h3>Tổng giỏ hàng</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Tổng giỏ hàng</p>
                                <p class="cart_amount">{{session('total_price', 0)}} VND</p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Phí vận chuyển</p>
                                <p class="cart_amount">   10000 VND</p>
                            </div>

                            <div class="cart_subtotal">
                                <p>Tổng phải thanh toán</p>
                                <p class="cart_amount">{{session('total_price', 0) + 10000}}  VND</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="#" class="btn btn-md btn-golden">Tiếp tục</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Coupon Start -->
</div> <!-- ...:::: End Cart Section:::... -->
@endsection