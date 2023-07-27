@extends('user.dashboard')
@section('user')


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 180px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{URL('/')}}">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Thanh toán</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<?php
    $data1=Session::get('data1');
    ?>
<!-- Checkout Start -->
@if(Session::has('Cart') != null)
<div class="container-fluid pt-5">
     
    <form action="/List-Cart" method="post">
        @csrf
        <div class="row px-xl-4">
            <div class="col-lg-7">
                <div class="mb-4">

                    <h4 class="font-weight-semi-bold mb-4">Thông tin đơn hàng</h4>
                    <h5>Thông tin khách hàng đặt </h5>
                    <div class="row">
                        <input type="text" name="id_user" value="{{$data1->id}}" hidden>

                        <div class="col-md-6 form-group">
                            <label>Họ tên</label>
                            <input class="form-control" required readonly name=" " type="text"
                                value="{{$data1->fullname}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" required readonly name=" " type="email"
                                value="{{$data1->email}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" required readonly name=" " type="number"
                                value="{{$data1->phone}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" required readonly name=" " type="text"
                                value="{{$data1->address}}">
                        </div>

                    </div>
                    <h5>Thông tin khách hàng nhận </h5>
                    <div class="row">
                        <input type="text" name="id_user" value="{{$data1->id}}" hidden>

                        <div class="col-md-6 form-group">
                            <label>Họ tên</label>
                            <input class="form-control" required name="consingnee_name" type="text"
                                value="{{$data1->fullname}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" required name="consingnee_email" type="email"
                                value="{{$data1->email}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" required name="consingnee_phone" type="number"
                                value="{{$data1->phone}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" required name="consingnee_address" type="text"
                                value="{{$data1->address}}">
                        </div>

                        <input hidden type="number" required name="status_payment" value="0" id="">



                    </div>

                </div>

            </div>
            <div class="col-lg-5">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                        @if(Session::has('Cart') != null)
                        @foreach(Session::get('Cart')->products as $item)

                        <div class="d-flex justify-content-between align-items-center">
                            <p hidden name="id_product">{{$item['productInfo']->id}}</p>
                            <p name="name_product"><img style="height: 70px; "
                                    src="/frontend/img/{{$item['productInfo']->image}}" alt="" /></p>
                            <p name="name_product">{{$item['productInfo']->name_product}}</p>
                            <p name="quantity">{{$item['quanty']}}</p>
                            <p name="size">{{$item['productInfo']->number_size}}</p>
                            <p name="color">{{$item['productInfo']->name_color}}</p>

                            <p name="price">{{(number_format($item['productInfo']->price, 0, '.', '.') . ' VNĐ') }}</p>
                        </div>


                        @endforeach
                        @endif
                    </div>


                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-medium mb-3">Phí vận chuyển</h5>
                            <p class="font-weight-bold">{{(number_format(30000, 0, '.', '.') . ' VNĐ') }}</p>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-medium mb-3">Tạm tính</h5>
                            <p class="font-weight-bold">{{(number_format(Session::get('Cart')->totalPrice, 0, '.', '.')
                                . ' VNĐ') }}</p>
                        </div>
                        {{-- @php
                            dd(Session::get('coupon'));
                        @endphp --}}
                        @if(Session::get('coupon'))
                        @foreach(Session::get('coupon') as $key =>$cou)
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-medium mb-3">Mã giảm giá</h5>
                            <p class="font-weight-bold">
                            
                                @if($cou['coupon_condition'] == 1)
                                {{$cou['coupon_code']}}

                                <input hidden  type="text"   name="coupon_code" value="{{$cou['coupon_code']}}" id="">

                                @else
                                {{$cou['coupon_code']}}
                                <input hidden  type="text"   name="coupon_code" value="{{$cou['coupon_code']}}" id="">
                                @endif


                            </p>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            @if($cou['coupon_condition'] == 1)
                            @php
                            $total_coupon = (Session::get('Cart')->totalPrice*$cou['coupon_number'])/100;
                            @endphp
                            <h5 class="font-weight-medium mb-3">Tổng giảm</h5>
                            <p>{{(number_format($total_coupon, 0, '.', '.') . ' VNĐ')}} </p>
                            @else
                            @php
                            $total_coupon = ( $cou['coupon_number']);
                            @endphp
                            <h5 class="font-weight-medium mb-3">Tổng giảm</h5>
                            <p>{{(number_format($total_coupon, 0, '.', '.') . ' VNĐ')}} </p>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold ">Tổng tiền</h5>
                            <input type="hidden" name="total"
                                value="{{Session::get('Cart')->totalPrice+ 30000-$total_coupon}}">
                            <h5 class="font-weight-bold">{{(number_format(Session::get('Cart')->totalPrice+
                                30000-$total_coupon, 0, '.', '.') . ' VNĐ') }}</h5>
                        </div>
                        @endforeach
                        @else
                        <input hidden type="text"   name="coupon_used" value="0" id="">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng giá</h5>
                            <input hidden type="text" name="total" value="{{Session::get('Cart')->totalPrice+ 30000}}">
                            <h5 class="font-weight-bold">{{(number_format(Session::get('Cart')->totalPrice+ 30000, 0,
                                '.', '.') . ' VNĐ') }}</h5>
                        </div>

                        @endif
                    </div>

                </div>

                <div class="card-footer border-secondary bg-transparent" style="display:flex; ">
                    <input type="submit" style="border-radius: 10px; max-width: 300px"
                        class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3"
                        value="Thanh Toán bằng tiền mặt">

                </div>

            </div>
        </div>

</div>
</form>
<div class="row px-xl-4">
    <div class="col-lg-7">

    </div>

    <div class="col-lg-5">

        <div class="card-footer border-secondary bg-transparent">

            <?php
                $data1=Session::get('data1');
                ?>
                @if(session('message'))
                <p style="color:green">{{ session('message') }}</p>
                @endif
                @if(session('error'))
                <p style="color:red">{{ session('error') }}</p>
                @endif
            <form class="mb-5" method="POST" action="{{url('/check_coupon') }}">
                @csrf
             
                <div class="input-group">
                    <input hidden  type="text"   name="id_user" value="{{$data1->id??""}}" id="">
                    
                      
                    <input type="text" name="coupon" value="{{ old('coupon') }}" class="form-control p-4" placeholder="Nhập mã giảm giá">
                 
                  
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary check_coupon">Mã giảm giá</button>
                    </div>
                </div>
            </form>
        </div>
        <form action="{{url('/vnpayment')}}" method="post" style=" padding: 0px 19px;">
            @csrf
            @if(Session::get('coupon'))
                @foreach(Session::get('coupon') as $key =>$cou)
                    @if($cou['coupon_condition'] == 1)
                        @php
                        $total_coupon = (Session::get('Cart')->totalPrice*$cou['coupon_number'])/100;
                        @endphp
                    @else
                        @php
                        $total_coupon = ( $cou['coupon_number']);
                        @endphp
                    @endif

                    <input hidden type="text" name="total" value="{{(Session::get('Cart')->totalPrice+ 30000 -$total_coupon) }}">
                @endforeach
            @else
                 <input hidden  type="text" name="total" value="{{(Session::get('Cart')->totalPrice+ 30000) }}">
            @endif
            <button style="border-radius: 10px; max-width: 300px; " type="submit" name="redirect"
                class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh Toán VNPAY </button>

        </form>
        <form action="{{url('/momopayment')}}" method="post" style=" padding: 0px 19px;">
            @csrf
            <input type="hidden" name="totalmomo" value="{{(Session::get('Cart')->totalPrice+ 30000) }}">
            <button style="border-radius: 10px; max-width: 300px; " type="submit" name="payUrl"
                class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">thanh toán MoMo</button>
        </form>
    </div>
</div>




</div>
@else
<div class="  d-flex justify-content-center  ">
    <p>bạn chưa có sản phẩm nào trong trong hàng <a href="{{" /"}}">Quay lại trang Mua hàng</a></p>
</div>
@endif
<!-- Checkout End -->


<!-- Footer Start -->

@section('footter')




@endsection
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="{{url('frontend')}}/js/main.js"></script>
@endsection