
@extends('user.dashboard')
@section('user')

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 180px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Thông Tin Khách Hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Thông Tin Khách Hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5 d-flex justify-content-center">
    <div class="justify-content-center">
        <?php
        $data1=Session::get('data1');
        ?>
        <h2 class="" style="text-align: center">Thông tin tài khoản </h2>
        <div class="row">
            <form action="/info_user/{{$data1->id??""}} " method="POST" class="row px-xl-2" >
                @csrf
                <input type="hidden" name="_method" value="put">
                <input type="text" name="id" value="{{$data1->id}}" hidden>
                <div class="col-md-6 form-group">
                    <label>Họ tên</label>
                    <input class="form-control" required name="fullname" type="text" value="{{$data1->fullname}}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Tên tài khoản</label>
                    <input class="form-control" required readonly name="username" type="text" value="{{$data1->username}}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Mật khẩu Cũ:</label>
                    <input class="form-control" required   name="password_cu" type="password" value="">
                    @if(session('error'))
                        <a style="color:red">{{ session('error') }}</a>
                     @endif
                </div>

                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input class="form-control" required name="email" type="email" value="{{$data1->email}}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Mật khẩu Mới:</label>
                    <input class="form-control" required   name="password" type="text" value=""
                    class="@error('password') form-control is-invalid @enderror">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                    @error('password') 
                    <a style="color:red">{{$message}} </a>
                @enderror
                </div>
                
                
                <div class="col-md-6 form-group">
                    <label>Phone</label>
                    <input class="form-control" required name="phone" type="number" value="{{$data1->phone}}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Address</label>
                    <input class="form-control" required name="address" type="text" value="{{$data1->address}}">
                </div>
        
                <div class=" d-flex justify-content-center   ">
                    <button style="border-radius: 10px;" class="  " type="submit">cập nhật</button>
                </div>
            </form>
        </div>
        
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