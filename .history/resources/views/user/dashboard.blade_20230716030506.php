<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SHOP GIÀY NEW</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{url('frontend')}}/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('frontend')}}/css/style.css" rel="stylesheet">
    <link href="{{url('frontend')}}/css/test.css" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">


        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{URL('/')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">GIÀY</span> NEW</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">

            </div>
            <div class="aa col-lg-3 col-6 text-right">
                <ul>
                    <li style=" margin-left: 100px">
                        <p class="btn border">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge">0</span>
                        </p>

                        <ul>
                        </ul>
                    </li>
                    <li>
                        <p class="btn border" data-toggle="dropdown">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            @if(Session::has('Cart') != null)
                            <span class="badge" id="total-quanty-show">{{Session::get('Cart')->totalQuanty}}</span>
                            @else
                            <span class="badge" id="total-quanty-show">0</span>
                            @endif
                        </p>
                        <ul>
                            <li>
                                <div class="cart-hover">
                                    <div id="change-item-cart"
                                        style="margin-left: -200px; background-color: aliceblue;  ">

                                        @if(Session::has('Cart') != null)

                                        <div class="select-items" style="margin-left: 20px;  ">
                                            <table>
                                                {{-- <thead>

                                                </thead> --}}
                                                <tbody>
                                                    @foreach(Session::get('Cart')->products as $item)
                                                    <tr class="">
                                                        <td>
                                                            <img style="height: 50px;"
                                                                src="/frontend/img/{{$item['productInfo']->image}}"
                                                                alt="" /> 
                                                        </td>
                                                        <td class="si-pic" >

                                                            <span>{{$item['productInfo']->name_product}} </span>


                                                            <span>{{(number_format($item['productInfo']->price))}}₫
                                                                x {{$item['quanty']}}
                                                            </span>

                                                            <span>{{$item['productInfo']->number_size}} </span>
                                                            <span>{{$item['productInfo']->name_color}} </span>
                                                        </td>


                                                        <td class="si-text delete ">

                                                            <button class="btn-xoa-cart btn btn-sm text-dark p-0 "
                                                                data="{{$item['productInfo']->id}}"
                                                                value="{{$item['productInfo']->id_size.$item['productInfo']->id_color}}">
                                                                <i class="fa fa-times"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="select-total" style="padding: 20px 10px">
                                            <span>total:</span>
                                            <span>{{(number_format(Session::get('Cart')->totalPrice))}}VNĐ</span>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center ">
                                            <a href="{{url('/List-Cart')}}" class="btn btn-sm text-dark p-0"><i
                                                    class="fa fa-shopping-cart mr-1"></i>Xem giỏ hàng</a>
                                            <a href="" class="btn btn-sm text-dark p-0"><i
                                                    class="fa fa-shopping-cart mr-1"></i> Mua
                                                Ngay</a>
                                        </div>

                                    </div>
                                    @else
                                    <p>khong có sản phẩm nào trong giỏ hàng </p>

                                    @endif


                                </div>
            </div>
            </li>
            </ul>
            </li>
            </ul>
        </div>
    </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Thương Hiệu</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        @foreach ($thuonghieu as $item)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">{{$item->tenthuonghieu}}<i
                                    class="fa fa-angle-down float-right mt-1"></i> </a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach ( $category as $data)
                                @if( $item->idthuonghieu == $data->id_thuonghieu )
                                <a href="/shop/{{$data->idloaigiay}}" class="dropdown-item" value=>{{
                                    $data->name_category }}</a>



                                @endif
                                @endforeach

                            </div>

                        </div>
                        @endforeach

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{URL('/')}}" class="nav-item nav-link active">Trang chủ</a>
                            {{-- <a href="{{URL('/shop')}}" class="nav-item nav-link">Shop</a> --}}
                            <a href="{{URL('/cart')}}" class="nav-item nav-link">Giỏ Hàng</a>
                            <?php
                            $data1=Session::get('data1');
                            ?>
                            <!-- Checkout Start -->
                            @if( $data1 == null)
                            <a href="{{URL::to('/login')}}" class="nav-item nav-link">Thanh Toán</a>
                            @else
                            <a href="{{URL('/checkout')}}" class="nav-item nav-link">Thanh Toán</a>
                            @endif
                            {{-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Trang</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{URL('/cart')}}" class="dropdown-item">Giỏ Hàng</a>
                                    <?php
                                    $data1=Session::get('data1');
                                    ?>
                                    <!-- Checkout Start -->
                                    @if( $data1 == null)
                                    <a href="{{URL::to('/login')}}" class="dropdown-item">Thanh Toán</a>
                                    @else
                                    <a href="{{URL('/checkout')}}" class="dropdown-item">Thanh Toán</a>
                                    @endif
                                </div>
                            </div> --}}
                            <a href="{{URL('/contact')}}" class="nav-item nav-link">Liên Hệ</a>

                            <?php
                            $data1=Session::get('data1');
                            ?>
                            @if( $data1 == null)
                            <a href="{{URL::to('/login')}}" class="nav-item nav-link">Xem Đơn Hàng</a>
                            @else
                            <a href="/donhang/{{$data1->id??""}}" class="nav-item nav-link">Lịch sử Đơn Hàng</a>
                            @endif
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php
                            $data1=Session::get('data1');
                            ?>
                            @if($data1=="")
                            <a href="{{URL::to('/login') }}" class="nav-item nav-link">Đăng nhập</a>
                            <a href="{{URL::to('/register') }}" class="nav-item nav-link">Đăng kí</a>

                        </div>
                        @else<div class="navbar-nav ml-auto py-0">
                            <a class="nav-item nav-link">Xin chào {{$data1->fullname??""}}</a>
                            <a href="{{URL::to('/logoutuser') }}" class="nav-item nav-link">Đăng Xuất</a>
                        </div>
                        @endif
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{url('frontend')}}/img/bitis.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{url('frontend')}}/img/bitis1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    @yield('user')


    <!-- Footer Start -->

    <div class="container-fluid bg-secondary text-dark custom-footer">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Cửa hàng SHOP GIÀY NEW uy tín hàng đầu. Chất lượng sản phẩm, giá thành phải chăng được nhiều người
                    tin dùng và ủng hộ.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>180 Cao Lỗ, P4, Q8, TPHCM</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>shopgiay5797@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0334653923</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">
                            Đường Dẫn Nhanh</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{URL('/')}}"><i class="fa fa-angle-right mr-2"></i>Trang
                                chủ</a>

                            <a class="text-dark mb-2" href="{{URL('/contact')}}"><i
                                    class="fa fa-angle-right mr-2"></i>Liên Hệ</a>
                            <a class="text-dark mb-2" href="{{URL('/cart')}}"><i class="fa fa-angle-right mr-2"></i>Giỏ
                                hàng</a>
                            <a class="text-dark mb-2" href="/donhang/{{$data1->id??""}}"><i
                                    class="fa fa-angle-right mr-2"></i>Lịch sử đơn hàng</a>
                            <?php
                        $data1=Session::get('data1');
                        ?>
                            <!-- Checkout Start -->
                            @if( $data1 == null)
                            <a class="text-dark" href="{{URL::to('/login')}}"><i
                                    class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            @else
                            <a class="text-dark" href="{{URL('/checkout')}}"><i class="fa fa-angle-right mr-2"></i>Thanh
                                toán</a>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- Footer End -->



</body>

</html>