@extends('client.layouts.layout')
@section('content')

    <!-- ...:::: Start Checkout Section:::... -->
    <div class="checkout-section">
        <div class="container">

            <!-- Start User Details Checkout Form -->
            <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>Thông tin khách hàng</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Họ và tên <span>*</span></label>
                                        <input type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Email <span>*</span></label>
                                        <input type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Số điện thoại <span>*</span></label>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                              
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Thành phố/tỉnh <span>*</span></label>
                                        <input  type="text" name="city">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Quận huyện <span>*</span></label>
                                        <input type="text" name="district">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Phường/Xã<span>*</span></label>
                                        <input type="text" name="commune">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Địa chỉ cho nhân viên giao hàng<span>*</span></label>
                                        <input type="text" name="address">
                                    </div>
                                </div>
                               
                              
                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Ghi chú</label>
                                        <textarea id="order_note" name="note"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>Hàng hóa bạn mua</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (session('cart', []) as $item)
                                        <tr>
                                            <td> {{$item['name']}} <strong> × {{$item['quantity']}}</strong></td>
                                            <td> {{$item['price'] * $item['quantity']}} VND</td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tổng giá tiền phải thanh toán (đã bao gồm phí vận chuyển)</th>
                                            <td>{{session('total_price') + 10000 ?? 0}} VND</td>
                                        </tr>
                                       
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                
                                     Chuyển khoản
                                   <input style="width:10%;" type="radio" name="payment_method" value="credit_card" id="credit_card" checked>
                                  Thanh toán khi nhận hàng
                                   <input style="width:10%" type="radio" name="payment_method" value="cod" id="cod">
                                    
                                </div>
                                <div class="order_button pt-3">
                                    <p> <small><i class="fa fa-info-circle" aria-hidden="true"></i> Bằng cách đặt hàng, bạn đã đồng ý với điều khoản và điều kiện của DuyNguyenGarden.</small></p>
                                    <button id="paymentButton" class="btn btn-md btn-black-default-hover" type="submit">
                                        Thanh toán
                                        </button>
                                </div>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.getElementById('credit_card').addEventListener('change', function() {
                                        if(this.checked) {           
                                            document.getElementById('paymentButton').textContent = ' Thanh toán chuyển khoản';
                                        }
                                    });
                                
                                    document.getElementById('cod').addEventListener('change', function() {
                                        if(this.checked) {
                                            document.getElementById('paymentButton').textContent = 'Thanh toán khi nhận hàng';
                                        }
                                    });
                                });
                                </script>
                        </form>
                        {!! QrCode::size(100)->generate(Request::url()); !!}
                    </div>
                </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->
@endsection