<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng kí</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/util.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/main.css')}}">
    <!-- Main css -->
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
   
    <link href="{{asset('frontend/css/register.css')}}" rel="stylesheet">
</head>
<body  style="background-image: url('frontend/img/bg-01.jpg');">

    <div class="main" >

        <section class="signup" >
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="post" action="{{URL::to('/register')}}" id="signup-form" class="signup-form">
                        @csrf
                        <h2 class="form-title">TẠO TÀI KHOẢN</h2>
                         <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                            <span class="label-input100">Họ và Tên</span>
                            <input class="input100" type="text" name="fullname" placeholder="Nhập họ và tên"
                            class="@error('fullname') form-control is-invalid @enderror">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                        @error('fullname') 
                        <div class="" style="color:red">{{$message}} </div>
                         @enderror
                        <div class="wrap-input100 validate-input" >
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email" placeholder="Nhập email"
                            class="@error('email') form-control is-invalid @enderror">
                            <span class="focus-input100" data-symbol="&#9993;"></span>
                        </div>
                        @error('email') 
                        <div class="" style="color:red">{{$message}} </div>
                         @enderror
                        <div class="wrap-input100 validate-input" >
                            <span class="label-input100">Số điện thoại</span>
                            <input class="input100" type="number" name="phone" placeholder="Nhập số điện thoại"
                            class="@error('phone') form-control is-invalid @enderror">
                            <span class="focus-input100" data-symbol="&#9742;"></span>
                        </div>
                        @error('phone') 
                        <div class="" style="color:red">{{$message}} </div>
                         @enderror
                        <div class="wrap-input100 validate-input" >
                            <span class="label-input100">Địa chỉ</span>
                            <input class="input100" type="text" name="address" placeholder="Nhập địa chỉ"
                            class="@error('address') form-control is-invalid @enderror">
                            <span class="focus-input100" data-symbol="&#9750;"></span>
                        </div>
                        @error('address') 
                        <div class="" style="color:red">{{$message}} </div>
                         @enderror
                        <div class="wrap-input100 validate-input" >
                            <span class="label-input100">Tên tài khoản</span>
                            <input class="input100" type="text" name="username" placeholder="Nhập tên tài  khoản"
                            class="@error('username') form-control is-invalid @enderror">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                            @error('username') 
                            <div class="" style="color:red">{{$message}} </div>
                            @enderror
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Mật khẩu</span>
                            <input class="input100" type="password" name="password" placeholder="Nhập mật khẩu"
                            class="@error('password') form-control is-invalid @enderror">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>
                        @error('password') 
                            <div class="" style="color:red">{{$message}} </div>
                            @enderror
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý với điều khoản <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" name="insert_User">
                                    ĐĂNG KÍ
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="loginhere">
                        Bạn đã có tài khoản ? <a href="{{URL::to('/login') }}" class="loginhere-link">Đăng nhập ngay</a>
                    </p>
                    <div class="flex-col-c p-t-20">
                         
    
                            
                        <p>
                          Quay lại <a href="{{URL::to('') }}" class="txt2"  style="text-decoration: none">
                              TRANG Chủ
                        </a>
                        </p>
                  </div>
                </div>
            </div>
        </section>

    </div>
   <!--===============================================================================================-->
   <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
   <!--===============================================================================================-->
       <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
   <!--===============================================================================================-->
       <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
       <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
   <!--===============================================================================================-->
       <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
   <!--===============================================================================================-->
       <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
       <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
   <!--===============================================================================================-->
       <script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
   <!--===============================================================================================-->
    <!-- JS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>