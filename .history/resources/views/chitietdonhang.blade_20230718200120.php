
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


    <!-- Contact Start -->
    <div class="container-fluid py-5 d-flex justify-content-center">
    <div class="justify-content-center">
        <table class="table table-striped table-bordered a"> 
 
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
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Tổng giá:</th>
            <th>{{number_format($total, 0, '.', '.') . ' VNĐ'}}</th>
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