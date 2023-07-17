@extends('user.dashboard')
@section('user')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{URL('/')}}">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Giỏ hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

@if(Session::has('Cart') != null)
<!-- Cart Start -->
<div class="container-fluid pt-5" id="change-list-cart">
    <div class="row px-xl-5" id="list-cart">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Size</th>
                        <th>Màu</th>
                        <th>Số Lượng</th>
                        <th>Tổng giá</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if(Session::has('Cart') != null)
                    @foreach(Session::get('Cart')->products as $item)
                    <tr>
                        <td class="align-middle"><img src="/frontend/img/{{$item['productInfo']->image}}" alt=""
                                style="width: 50px;">{{$item['productInfo']->name_product}}</td>
                        <td class="align-middle">{{(number_format($item['productInfo']->price))}} VNĐ</td>

                        <td class="align-middle" value="{{$item['productInfo']->id_size}}">

                            {{$item['productInfo']->number_size}}


                        </td>
                        <td class="align-middle" value="{{$item['productInfo']->id_color}}">

                            {{$item['productInfo']->name_color}}


                        </td>
                        <td class="align-middle">
                            <div class="  d-flex justify-content-between align-items-center quantityy  " style="width: 100px;">
                                <div class=" input-group quantityy mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-minus"
                                            onclick="decreaseQuantity({{$item['productInfo']->id_size}}, {{$item['productInfo']->id_color}})">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control bg-secondary text-center quantityInput"
                                        id="quantityInput_{{$item['productInfo']->id_size}}_{{$item['productInfo']->id_color}}"
                                        value="{{$item['quanty']}}" name="quantity_cart">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-plus"
                                            onclick="increaseQuantity({{$item['productInfo']->id_size}}, {{$item['productInfo']->id_color}})">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">{{(number_format($item['price']))}} VNĐ</td>
                        <td class="align-middle">
                            <button data="{{$item['productInfo']->id}}" class="btn btn-sm btn-primary btn_delete_list"
                                value="{{$item['productInfo']->id_size.$item['productInfo']->id_color}}">
                                <i class="fa fa-times"></i></button>
                        </td>
                        <td class="align-middle">
                            <button data="{{$item['productInfo']->id}}"
                                class="btn btn-sm btn-primary btn_update_list"
                                value="{{$item['productInfo']->id_size.$item['productInfo']->id_color}}">

                                <i class="">Cập nhật</i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Mã giảm giá</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0"> Giỏ hàng</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Số lượng sản phẩm</h6>
                        <h6 class="font-weight-medium">{{Session::get('Cart')->totalQuanty}} Sản phẩm</h6>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tạm Tính</h6>
                        <h6 class="font-weight-medium">{{(number_format(Session::get('Cart')->totalPrice))}}VNĐ</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí Giao Hàng</h6>
                        <h6 class="font-weight-medium">{{(number_format(30000)) }}₫ </h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng giá</h5>
                    <h5 class="font-weight-bold">{{(number_format(Session::get('Cart')->totalPrice+30000))}} VNĐ</h5>
                    </div>
                    <?php
                        $data1=Session::get('data1');
                        ?>
                    @if( $data1 == null)
                    <a href="{{URL::to('/login') }}" class="nav-item nav-link"><button
                            class="btn btn-block btn-primary my-3 py-3">Thanh toán</button></a>

                    @else
                    <a href="{{URL('/checkout')}}"><button class="btn btn-block btn-primary my-3 py-3">Thanh
                            toán</button></a>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid py-5 d-flex justify-content-center">
    <p>bạn chưa có sản phẩm nào trong trong hàng <a href="{{" /"}}">Quay lại trang Mua hàng</a></p>
</div>
@endif
<!-- Cart End -->


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
    function increaseQuantity(id_size, id_color) {
        var quantityInput = $('#quantityInput_' + id_size + '_' + id_color);
        var quantity = parseInt(quantityInput.val()) || 0;
        quantity++;
        quantityInput.val(quantity);
    }

    // Decrease quantity
    function decreaseQuantity(id_size, id_color) {
        var quantityInput = $('#quantityInput_' + id_size + '_' + id_color);
        var quantity = parseInt(quantityInput.val()) || 0;
        if (quantity > 1) {
            quantity--;
            quantityInput.val(quantity);
        }
    }



</script>
<script>

    $('#change-list-cart').on('click', '.btn_delete_list', function () {
        //console.log($(this).data('id'));
        $.ajax({
            type: "GET",
            data: {
                id_color_size: $(this).val()
            },
            url: "/Delete-List-Item-Cart/" + $(this).attr('data'),
        }).done(function (response) {


            RenderListCart(response);
            alertify.success('Xóa sản phẩm trong  giỏ hàng thành công');

        });
    });
     

    $('#change-list-cart').on('click', '.btn_update_list', function () {
        var id_color_size = $(this).val();
        // tim den thang cha chua nguyen cai cart do, tuc la t tr
        let parent=$(this).closest('tr');

        // trong t cha tr, tim den t input co name = cai j do tui m dat
        let input_quantity=parent.find('input[name=quantity_cart]');
        $.ajax({
            type: "GET",
            data: {
                id_color_size: id_color_size
            },
            url: "/Save-List-Item-Cart/" + $(this).attr('data') + '/' + input_quantity.val(),
        }).done(function (response) {
            RenderListCart(response);
            alertify.success('Cập nhật giỏ hàng thành công');
        }).fail(function (xhr, status, error) {
            alertify.error('Có lỗi xảy ra. Vui lòng thử lại sau.');
            // console.log(xhr.responseText);
        });
    });
    function RenderListCart(response) {
        $('#list-cart').empty();
        $('#list-cart').html(response);


        // console.log( $('#total-quanty-cart').val());
    }
</script>
@endsection