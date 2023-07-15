@extends('user.dashboard')
@section('user')

<!-- Featured Start -->
<h1>phu</h1>
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Chất Lượng Sản Phẩm</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Miễn Phí Giao Hàng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Trả hàng trong 14 ngày</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ Trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">SẢN PHẨM</span></h2>
    </div>
    <div class="row">
        <div class="col-md-3" style=" display: flex;justify-content: space-between;">
            <div class="form-group">
                <form>
                    @csrf
                    <select class="form-control select-filter" name="sort" id="sort" style="width: 170px;">
                        <option value="{{Request::url()}}?sort_by=none">---Lọc theo---</option>
                        <option value="{{Request::url()}}?sort_by=kytu_az">Từ A-Z</option>
                        <option value="{{Request::url()}}?sort_by=kytu_za">Từ Z-A</option>
                        <option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
                        <option value="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần</option>
                    </select>
                </form>
            </div>
            <div>
                <form action="/" method="get" style="width: 500px;">
                    <div class="input-group">
                        <input type="text" class="form-control" name="kw" placeholder="Tìm kiếm sản phẩm"
                            value="<?php echo isset($_GET['kw']) ? $_GET['kw'] : ''; ?>">
                        <input type="text" class="form-control" name="price" placeholder="Tìm kiếm theo giá"
                            value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''; ?>">
            
                        <div class="input-group-append">
                            <input type="submit" class="input-group-text bg-transparent text-primary" value="Tìm Kiếm">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($data as $item)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="frontend/img/{{ $item->image }}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $item->name_product }}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{ number_format($item->price, 0, '.', '.') . ' VNĐ' }}</h6>
                        <h6 class="text-muted ml-2"><del>{{number_format($item->price).' '.'VNĐ' }}</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center ">
                    <a href="/detail/{{$item->id}}" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-eye text-primary mr-1"></i>Mua Ngay</a>

                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="m-4">
    {{$data->links()}}
    </div>


</div>
<!-- Products End -->


<!-- Subscribe Start -->
<div class="container-fluid bg-secondary my-5">
    <div class="row justify-content-md-center py-5 px-xl-5">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center mb-2 pb-2">
                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo
                    labore labore.</p>
            </div>
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                    <div class="input-group-append">
                        <button class="btn btn-primary px-4">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Subscribe End -->







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
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />


<!-- Template Javascript -->
<script src="{{url('frontend')}}/js/main.js"></script>

<script>
    $("#sort").change(function () {
        var selectedValue = $(this).val();
        sessionStorage.setItem("selectedSort", selectedValue);
    });

    // Khôi phục giá trị đã chọn khi tải lại trang
    $(document).ready(function () {
        var selectedSort = sessionStorage.getItem("selectedSort");
        if (selectedSort) {
            $("#sort").val(selectedSort);
        }
    });
</script>
<script>
    // Lấy giá trị của input khi trang được tải
    var inputElement = document.querySelector('input[name="kw"]');
    var inputValue = inputElement.value;

    // Lưu giá trị vào localStorage
    localStorage.setItem('searchKeyword', inputValue);

    // Đọc giá trị từ localStorage khi cần
    var savedKeyword = localStorage.getItem('searchKeyword');
    console.log(savedKeyword); // In giá trị đã lưu ra console (có thể thay đổi theo nhu cầu)
</script>
<script>
    $(document).ready(function () {
        $('#sort').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
    });
</script>
<script>!function (s, u, b, i, z) { var o, t, r, y; s[i] || (s._sbzaccid = z, s[i] = function () { s[i].q.push(arguments) }, s[i].q = [], s[i]("setAccount", z), r = ["widget.subiz.net", "storage.googleapis" + (t = ".com"), "app.sbz.workers.dev", i + "a" + (o = function (k, t) { var n = t <= 6 ? 5 : o(k, t - 1) + o(k, t - 3); return k !== t ? n : n.toString(32) })(20, 20) + t, i + "b" + o(30, 30) + t, i + "c" + o(40, 40) + t], (y = function (k) { var t, n; s._subiz_init_2094850928430 || r[k] && (t = u.createElement(b), n = u.getElementsByTagName(b)[0], t.async = 1, t.src = "https://" + r[k] + "/sbz/app.js?accid=" + z, n.parentNode.insertBefore(t, n), setTimeout(y, 2e3, k + 1)) })(0)) }(window, document, "script", "subiz", "acrscdmlmydqufcypdup")</script>
@endsection