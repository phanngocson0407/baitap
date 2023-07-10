
@extends('user.dashboard')
@section('user')
<head>
    <!-- ... -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9Yr2Au2WEhR7dRyUfMUQdp4jCx3d2ORo" height="450" width="600"></script>
</head>
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Liên hệ chúng tôi</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{URL('/')}}">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Liên hệ</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5" id="map" style="width: 100%; height: 400px;"> </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Địa chỉ</h5>
                <p>Cửa hàng SHOP GIÀY NEW uy tín hàng đầu. Chất lượng sản phẩm, giá thành phải chăng được nhiều người tin dùng và ủng hộ.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Cửa hàng SHOP GIÀY NEW</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>180 Cao Lỗ, P4, Q8, TPHCM</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>shopgiay5797@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>0334653923</p>
                </div>
               
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
    <script>
        function initMap() {
            // Tạo đối tượng bản đồ và định vị tại một vị trí cụ thể
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 10.738120, lng: 106.678073}, // Tọa độ San Francisco
                zoom: 12
            });

            // Thêm đánh dấu (marker) vào bản đồ
            var marker = new google.maps.Marker({
                position: {lat: 10.738120, lng: 106.678073}, // Tọa độ San Francisco
                map: map,
                title: 'Hello World!'
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9Yr2Au2WEhR7dRyUfMUQdp4jCx3d2ORo&callback=initMap" async defer></script>
@endsection