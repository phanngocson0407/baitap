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
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">

                    <h4 class="font-weight-semi-bold mb-4">Thông tin đơn hàng</h4>
                   
                    <div class="row">
                        <input type="text" name="id_user" value="{{$data1->id}}" hidden>
                        <div class="col-md-6 form-group">
                            <label>Họ tên</label>
                            <input class="form-control" name="consingnee_name" type="text"  value="{{$data1->fullname}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input class="form-control" name="consingnee_email" type="text"  value="{{$data1->email}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" name="consingnee_phone" type="number"  value="{{$data1->phone}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" name="consingnee_address" type="text"  value="{{$data1->address}}">
                        </div>
                        <input hidden type="number" name="status_payment" value="0" id="">

                        
                      
                    </div>
                
                </div>
               
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                        @if(Session::has('Cart') != null)
                        @foreach(Session::get('Cart')->products as $item)
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <p hidden name="id_product" >{{$item['productInfo']->id}}</p>
                            <p name="name_product"><img style="height: 70px; "
                                src="/frontend/img/{{$item['productInfo']->image}}"
                                alt="" /></p>
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
                            <p class="font-weight-bold">{{(number_format(30000)) }}</p>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-medium mb-3">Tạm tính</h5>
                            <p class="font-weight-bold">{{(number_format(Session::get('Cart')->totalPrice)) }}₫</p>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng giá</h5>
                            <h5 class="font-weight-bold">{{(number_format(Session::get('Cart')->totalPrice+ 30000)) }}₫</h5>
                        </div>
                    </div>
                </div>
                
                    <div class="card-footer border-secondary bg-transparent" style="display:flex;">
                       <input type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" value="Thanh Toán bằng tiền mặt"> 
                    
                    </div>
                     
                </div>
            </div>
        
        </div>
        </form>
        <form action="{{url('/vnpayment')}}" method="post">
            @csrf
            <input type="hidden" name="totalvnpay"  value="{{(Session::get('Cart')->totalPrice+ 30000) }}">
            <button  type="submit" name="redirect"  class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" >Thanh Toán VNPAY </button>           
        </form>
      
      
    </div>
    @else
    <div class="  d-flex justify-content-center  "  >
        <p >bạn chưa có sản phẩm nào trong trong hàng <a href="{{"/"}}">Quay lại trang Mua hàng</a></p>
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