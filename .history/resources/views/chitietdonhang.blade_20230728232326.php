
@extends('user.dashboard')
@section('user')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi Tiết Đơn Hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Chi Tiết Đơn Hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

<?php
    $data1=Session::get('data1');
    ?>
    <!-- Contact Start -->
    <div class="container">
        <div class="row">
          <div class="col-md-6">
            <!-- Nội dung cột thứ nhất ở đây -->
            <h5>Thông tin khách hàng đặt </h5>
            <div class="row">
                <input type="text" name="id_user" value="{{$data1->id}}" hidden>

                <div class="col-md-12 form-group">
                    <label>Họ tên</label>
                    <input class="form-control" required readonly name=" " type="text"
                        value="{{$data1->fullname}}">
                </div>
                <div class="col-md-12 form-group">
                    <label>Email</label>
                    <input class="form-control" required readonly name=" " type="email"
                        value="{{$data1->email}}">
                </div>
                <div class="col-md-12 form-group">
                    <label>Phone</label>
                    <input class="form-control" required readonly name=" " type="number"
                        value="{{$data1->phone}}">
                </div>
                <div class="col-md-12 form-group">
                    <label>Address</label>
                    <input class="form-control" required readonly name=" " type="text"
                        value="{{$data1->address}}">
                </div>

            </div>
          </div>
          <div class="col-md-6">
            <h5>Thông tin khách hàng nhận </h5>
            @foreach($order_detail as $item)
            <div class="row">
               

                <div class="col-md-12 form-group">
                    <label>Họ tên</label>
                    <input class="form-control" readonly   name="consingnee_name" type="text"
                        value="{{$item->consingnee_name}}">
                </div>
                <div class="col-md-12 form-group">
                    <label>Email</label>
                    <input class="form-control" readonly   name="consingnee_email" type="email"
                        value="{{$item->consingnee_email}}">
                </div>
                <div class="col-md-12 form-group">
                    <label>Phone</label>
                    <input class="form-control" readonly   name="consingnee_phone" type="number"
                        value="{{$item->consingnee_phone}}">
                </div>
                <div class="col-md-12 form-group">
                    <label>Address</label>
                    <input class="form-control" readonly   name="consingnee_address" type="text"
                        value="{{$item->consingnee_address}}">
                </div>
 



            </div>
            @endforeach
          </div>
        </div>
        <div class="row">
            <div class="col-md-12"> 
                <h5>Hình Thức Thanh Toán</h5>
                @foreach($order_detail as $item)
                    @if($item->status_payment ==0)

                <input class="form-control" readonly   name=" " type="text"
                value="Thanh Toán Khi Nhận Hàng">
                @else
                <input class="form-control" readonly   name=" " type="text"
                value="Thanh Toán Bằng VNPAY">
                @endif
                @endforeach

            </div>
        </div>
      </div>
    <div class="container-fluid py-5 d-flex justify-content-center">
        
    <div class="justify-content-center">
        <table class="table table-striped table-bordered " > 
 
                <tr>
                   
                    <th>ID Đơn Hàng</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Màu</th>
                    <th>Size</th>
                  
                </tr>
           
         
                @foreach($order_detail as $item)
         <tr>
          
            <td>{{$item->id_order}}</td>
            <td><img style="max-width: 200px; height 200px;" src="{{ URL::to('/frontend/img/'.$item->image)}}"></td>
            <td>{{$item->name_product}}</td>
             <td>{{$item->quantity}}</td>
             <td>{{number_format($item->price, 0, '.', '.') . ' VNĐ'}}</td>
             <td>{{$item->color}}</td>
             <td>{{$item->size}}</td>
           
             
            </tr>
            @endforeach
            <th>Phí Vận Chuyển</th>
            <th>{{number_format(30000, 0, '.', '.') . ' VNĐ'}}</th>
            <th>Mã giảm giá</th>
            <th>
                @foreach($order_detail as $data)
                @endforeach
            </th>
            <th></th>
            <th>Tổng giá:</th>
           
            @foreach($order_detail as $data)
            <th>{{number_format($data->total, 0, '.', '.') . ' VNĐ'}}</th>
            @endforeach
        </table>
       
    </div>
</div>
    <!-- Contact End -->


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