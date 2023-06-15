<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
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
    
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{URL('/')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="/" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="kw" placeholder="Search for products">
                        <div class="input-group-append">
                            <input type="submit" class="input-group-text bg-transparent text-primary" value="Tìm Kiếm">

                            </span>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="col-lg-3 col-6 text-right">
                <p  class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </p>

                <p   class="btn border" data-toggle="dropdown">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                    <div class="dropdown-menu rounded-0 m-0">
                        <div class="cart-hover" style="margin: 10px">
                            <div id="change-item-cart">
                                
                                
                                 
                            </div>
                          
                        </div>
                    </div>
                </p>
            </div> --}}
            <div class="col-lg-1 text-right col-md-1">
                <ul class="  ">
                    <li class="btn border"><a href="#">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge">1</span>
                        </a>
                    </li>
                    <li class="btn border"><a href="#">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge">3</span>
                        </a>
                        {{-- <div class="cart-hover">
                            <div class="select-items">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>₫60.00 x 1</p>
                                                    <h6>Kabino Bedside Table</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i class="ti-close"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>₫60.00 x 1</p>
                                                    <h6>Kabino Bedside Table</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i class="ti-close"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="select-total">
                                <span>total:</span>
                                <h5>₫120.00</h5>
                            </div>
                            <div class="select-button">
                                <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                            </div>
                        </div> --}}
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
                            <a href="{{URL('/')}}" class="nav-item nav-link active">Home</a>
                            {{-- <a href="{{URL('/shop')}}" class="nav-item nav-link">Shop</a> --}}

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{URL('/cart')}}" class="dropdown-item">Shopping Cart</a>
                                    <a href="{{URL('/checkout')}}" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="{{URL('/contact')}}" class="nav-item nav-link">Contact</a>
                            <a href="{{URL('/blog')}}" class="nav-item nav-link">Blog</a>
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
                            <img class="img-fluid" src="{{url('frontend')}}/img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First
                                        Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{url('frontend')}}/img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First
                                        Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
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
  
</body>

</html>