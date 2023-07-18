
@extends('user.dashboard')
@section('user')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thông Tin Đơn Hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thông Tin Đơn Hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5 d-flex justify-content-center">
    <div class="justify-content-center">
         <table class="table table-striped table-bordered">
            <tr>
                <th>ID Đơn Hàng</th>
                <th>Họ Tên Khách Hàng</th>
                <th>Số điện Thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ngày đặt hàng</th>
                <th>Hình Thức Thanh Toán</th>
                <th>Trạng thái</th>
                <th>Hủy đơn hàng</th>
                <th>Xem chi tiết</th>
            </tr>
           @foreach ($order as $item)
            {{-- @if($item->id_user == $item->id) --}}
            @if($item->status_huy==0)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->consingnee_name}}</td>
                <td>{{$item->consingnee_phone}}</td>
                <td>{{$item->consingnee_email}}</td>
                <td>{{$item->consingnee_address}}</td>
                <td>     <?php
                    if($item->status_payment==0){
                        echo 'Thanh Toán Bằng Tiền Mặt';
                    }elseif($item->status==1){
                        echo 'Thanh Toán Qua VNPAY';
           
                    }
                ?></td>
                <td>{{$item->date_payment}}</td>    
                <td>     <?php
                    if($item->status==0){
                        echo 'Đang chờ duyệt';
                    }elseif($item->status==1){
                        echo 'Duyệt đơn hàng';
                    }elseif($item->status==2){
                        echo 'Đang vận chuyển';
                    }elseif($item->status==3){
                        echo 'Giao Hàng';
                    }
                ?></td>
                @if($item->status==0)
                <td>
                    @if($item->status_huy==0)
                    <a href="/huy-trangthai/{{$item->id}}?status_huy=1">
                    <button 
                    onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')"
                    style=" border: 0px solid #b1154a; color:rgb(209,156,151)">
                    Hủy đơn</button>
                    </a>
                    <td><a href="/chitietdonhang/{{$item->id}}">Xem chi tiết</a></td>
                    @else
                    @endif
                </td>
                @else
                    <td><button style="display: none">Hủy đơn</button></td>
                    <td><a href="/chitietdonhang/{{$item->id}}">Xem chi tiết</a></td>
                @endif
            </tr>
            @else
                <tr style="display: none">
                </tr>
        @endif
            {{-- @else
            <tr>
                <td>Bạn chưa đặt đơn hàng nào</td>
            </tr> --}}
            
            {{-- @endif --}}
   
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