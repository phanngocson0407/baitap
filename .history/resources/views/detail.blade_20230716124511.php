@extends('user.dashboard')
@section('user')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    h1 {
        text-align: center;
    }

    #comment-form {
        margin-bottom: 20px;
    }

    #comment-form input,
    #comment-form textarea,
    #comment-form select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    #comment-form button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    #comments {
        border-top: 1px solid #ccc;
        padding-top: 20px;
    }

    .comment {
        margin-bottom: 10px;
    }

    .comment .username {
        font-weight: bold;
    }

    .comment .rating {
        font-weight: bold;
        color: #FFD700;
    }

    .comment .content {
        margin-top: 5px;
    }
</style>
<!-- Page Header Start -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 180px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a style="text-decoration: none" href="{{url('/')}}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0"> <a style="text-decoration: none" href="">Shop Detail</a></p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">

    <div class="row px-xl-5">

        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="/frontend/img/{{$detail['image']}}" alt="Image">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a> 
            </div>


          
            

        </div>

        <div class="col-lg-7 pb-5">
            <h2 class="font-weight-semi-bold">{{ $detail['name_product'] }}</h2>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2" style="with:20%;position:relative">
                    <span class="fa fa-star"
                        style="font-size: 30px;color:rgb(209,156,151); margin:0 auto; text:align: center;"></span>


                </div>
                <small class="pt-1" style="font-size: 20px"> {{$rating}} sao ({{$count}} lượt đánh giá)</small>
            </div>
            <div class="d-flex ">
                <p style="font-size:
                    23px;
                    font-weight:
                    700;
                    line-height:
                    22.4px" class="text-dark font-weight-medium mb-0 mr-3">Giá:</p>
                <p style="font-size:
                    23px;
                    font-weight:
                    700;
                    line-height:
                    22.4px" class="  mb-4">{{number_format($detail->price).''.'₫' }}</p>
            </div>

            <div class="  mb-3">
                <p style="font-size:
                    23px;
                    font-weight:
                    700;
                    line-height:
                    22.4px; white-space: nowrap; " class="text-dark font-weight-medium mb-0 mr-3">Mô tả:</p>
                <p class=" ">{{ $detail['description'] }} </p>
            </div>
            <div class="d-flex mb-3">
                <p style="font-size:
                    20px;
                    font-weight:
                    700;
                    line-height:
                    22.4px" class="text-dark font-weight-medium mb-0 mr-3">Kích cỡ:</p>



                @foreach($size->sortBy('number_size') as $key => $item)
                <div class="custom-control custom-radio custom-control-inline">
                    @if($key === 0)
                    <input type="radio" class="custom-control-input" id="size-{{$item->id_size}}"
                        value="{{$item->id_size}}" name="size">
                    @else
                    <input type="radio" class="custom-control-input" id="size-{{$item->id_size}}"
                        value="{{$item->id_size}}" name="size">
                    @endif
                    <label class="custom-control-label" for="size-{{$item->id_size}}">{{$item->number_size}}</label>

                </div>
                @endforeach



            </div>
            <div class="d-flex mb-4">
                <p style="font-size:
                    20px;
                    font-weight:
                    700;
                    line-height:
                    22.4px" class="text-dark font-weight-medium mb-0 mr-3">Màu sắc :</p>
                <form>
                    @foreach($color as $data)
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-{{$data->id_color}}"
                            value="{{$data->id_color}}" name="color">

                        <label class="custom-control-label"
                            for="color-{{$data->id_color}}">{{$data->name_color}}</label>
                    </div>
                    @endforeach
                </form>
            </div>
            {{-- <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <script>
                    // Lấy tham chiếu đến phần tử input và các nút
                    var inputElement = document.querySelector('.quantity input');
                    var plusButton = document.querySelector('.quantity .btn-plus');
                    var minusButton = document.querySelector('.quantity .btn-minus');

                    // Thêm sự kiện click cho nút tăng số lượng
                    plusButton.addEventListener('click', function () {
                        var currentValue = parseInt(inputElement.value);
                        inputElement.value = currentValue + 1;
                    });

                    // Thêm sự kiện click cho nút giảm số lượng
                    minusButton.addEventListener('click', function () {
                        var currentValue = parseInt(inputElement.value);
                        if (currentValue > 1) {
                            inputElement.value = currentValue - 1;
                        }
                    });
                </script>



            </div> --}}

            <div class="d-flex   py-2">
                <a onclick="AddCart({{ $detail['id'] }})" href="javascript:">
                    <button class="btn btn-primary px-2 rounded mx-2">
                        Thêm Vào Giỏ Hàng
                    </button>
                </a>

                <?php
                $data1 = Session::get('data1');
                ?>
                @if ($data1 == null)
                <a href="{{URL::to('/login')}}">
                    <button class="btn btn-primary px-2 rounded mx-2">
                        Mua Ngay
                    </button>
                </a>
                @else
                <a onclick="MuaNgay({{ $detail['id'] }})" href="{{URL('/checkout')}}">
                    <button class="btn btn-primary px-2 rounded mx-2">
                        Mua Ngay
                    </button>
                </a>
                @endif
            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-primary px-2" href="">
                        <i class="fab fa-facebook-f" style="color: #3b5998;"></i>
                    </a>
                    <a class="text-danger px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-info px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>

                    <a class="text-danger px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>

        </div>

    </div>
    <style>
        .style_comment {
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #ccc;
        }

        .rating {
            display: inline-block;
            vertical-align: middle;
            font-size: 30px;

            cursor: pointer;
        }
        #scrollableDiv::-webkit-scrollbar {
    width: 6px; /* Chiều rộng của thanh cuộn */
  }

  #scrollableDiv::-webkit-scrollbar-thumb {
    background-color: #c0c0c0; /* Màu sắc của thanh cuộn */
    border-radius: 3px; /* Đường viền cong của thanh cuộn */
  }

  #scrollableDiv::-webkit-scrollbar-thumb:hover {
    background-color: #a0a0a0; /* Màu sắc của thanh cuộn khi di chuột */
  }

  #scrollableDiv::-webkit-scrollbar-track {
    background-color: #f1f1f1; /* Màu sắc nền của thanh cuộn */
    border-radius: 3px; /* Đường viền cong của thanh cuộn */
  }
    </style>
    <div class="container">
        <h2 style="padding: 20px 0;"><b>Đánh giá & nhận xét về sản phẩm {{ $detail['name_product'] }} </b></h2>
        <div class="row">
            <div class="col-md-6">
                <div>
                   
                    <p><b>CÁC BÌNH LUẬN CỦA KHÁCH HÀNG</b> </p>
                    @if(isset($comment) && count($comment) > 0)
                  <div class="style_comment" id="scrollableDiv" style="max-height: 550px; overflow: auto; background-color: white; padding: 20px">
                    @foreach($comment as $item)
                      @if($item->status==1)
                        
                        <div>
                          <p style="font-size: 23px; font-weight: 700; line-height: 22.4px;color: #c5837c" class="  font-weight-medium mb-0 mr-3"> <span class="text-dark" style="font-size: 15px">Khách Hàng:</span> {{$item->comment_name}}</p>
                          <p class="  font-weight-medium mb-0 mr-3"><span class="text-dark" style="font-size: 15px; font-weight: 700; line-height: 22.4px;">Ngày:</span> <?php echo date('d/m/Y', strtotime($item->comment_date)); ?></p>
                          <p ><span class="text-dark" style="font-size: 15px; font-weight: 700; line-height: 22.4px;">Bình luận:</span> {{$item->comment}}</p>

                        </div>
                     
                      @endif
                    @endforeach
                    @else
                     <p>Không có bình luận nào.</p>
                    @endif
                  </div>
              
                </div>
              </div>
              
              
          <div class="col-md-6">
            <div>
                <div>
                    <p><b>Đánh giá sao</b></p>
                    <ul class="list-inline" title="Averge Rating">
                        @for($count=1;$count<=5;$count++) @php if($count<=$rating){ $color='color:rgb(209,156,151)' ; } else{
                            $color='color:#ccc' ; } @endphp <li title="star_rating" id="{{$detail['id']}}-{{$count}}"
                            data-index="{{$count}}" data-id_product="{{$detail['id']}}" data-rating="{{$rating}}" class="rating"
                            style="{{$color}}">
                            &#9733;
                        </li>
                        @endfor
                    </ul>
                </div>
                <p><b>Viết đánh giá của bạn</b></p>
                <form id="comment-form" method="post" action="{{URL::to('/detail/'.$detail['id'])}}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $detail['id'] }}">
                    <input type="text" name="comment_name" id="username" placeholder="Tên người dùng" required>
                    <textarea id="content" name="comment" placeholder="Nội dung bình luận" required></textarea>
                    <button type="submit">Gửi bình luận</button>
                </form>
            </div>
          </div>
        </div>
      </div>
 

   

    


    <!-- Products Start -->



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

    {{-- Code phần đánh giá --}}

    <script src="{{url('frontend')}}/js/main.js"></script>
    <script>
        function AddCart(id) {
            // console.log(id);
            let id_color = $("input[name=color]:checked");
            let id_size = $("input[name=size]:checked");
            if (id_color.length > 0 && id_size.length > 0) {
                $.ajax({
                    type: "GET",
                    data: {
                        id_color: id_color.val(),
                        id_size: id_size.val()
                    },
                    url: "/Add-Cart/" + id,
                }).done(function (response) {

                    RenderCart(response);
                    alertify.success('Thêm sản phẩm vào giỏ hàng thành công');


                });
            } else if (id_color.length == 0 && id_size.length > 0) {
                alertify.error('Vui lòng chọn màu');
            } else if (id_color.length > 0 && id_size.length == 0) {
                alertify.error('Vui lòng chọn size');
            } else {
                alertify.error('Vui lòng chọn màu và size');
            }
        }
        function MuaNgay(id) {
            // console.log(id);
            let id_color = $("input[name=color]:checked");
            let id_size = $("input[name=size]:checked");
            if (id_color.length > 0 && id_size.length > 0) {

            $.ajax({
                type: "GET",
                data:{
                    id_color:id_color.val(),
                    id_size:id_size.val()
                },
                url:"/Add-Cart/"+id,
            }).done(function(response){
     
                    RenderCart(response);   

               
                             
            }).fail(function (xhr, status, error) {
            alertify.error('Có lỗi xảy ra. Vui lòng thử lại sau.');
            // console.log(xhr.responseText);
        });
    }
    }
        $('#change-item-cart').on('click', '.btn-xoa-cart', function () {
            //console.log($(this).data('id'));
            $.ajax({
                type: "GET",
                data: {
                    id_color_size: $(this).val()
                },
                url: "/Delete-Item-Cart/" + $(this).attr('data'),

            }).done(function (response) {

                RenderCart(response);
                alertify.success('Xóa sản phẩm trong giỏ hàng thành công');

            });
        });
        function RenderCart(response) {


            $('#change-item-cart').empty();
            $('#change-item-cart').html(response);
            if ($('#total-quanty-cart').val() != undefined) {

                $('#total-quanty-show').text($('#total-quanty-cart').val());
            }
            else {
                $('#total-quanty-show').text('0');
            }
            console.log( $('#total-quanty-cart').val());
        }
        //đánh giá sao
        function remove_background(id_product) {
            for (var count = 1; count <= 5; count++) {
                $('#' + id_product + '-' + count).css('color', '#ccc');
            }
        }
        //hower chuột đánh giá sao 
        $(document).on('mouseenter', '.rating', function () {
            var index = $(this).data("index");
            var id_product = $(this).data("id_product");
            remove_background(id_product);
            for (var count = 1; count <= index; count++) {
                $('#' + id_product + '-' + count).css('color', 'rgb(209,156,151)');
            }
        });
        //nhả chuột đánh giá sao
        $(document).on('mouseleave', '.rating', function () {
            var index = $(this).data("index");
            var id_product = $(this).data("id_product");
            var rating = $(this).data("rating");
            remove_background(id_product);
            for (var count = 1; count <= rating; count++) {
                $('#' + id_product + '-' + count).css('color', 'rgb(209,156,151)');
            }
        });
        //click đánh giá sao 
        $(document).on('click', '.rating', function () {
            var index = $(this).data("index");
            var id_product = $(this).data("id_product");
            console.log($(this))
            // var _token=$('input[name="_token"]').val();
            $.ajax({
                url: "{{url('insert-rating')}}",
                method: "POST",
                data: {
                    index: index,
                    id_product: id_product
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {

                    if (data == 'done') {
                        alert("Bạn đã đánh giá " + index + "trên 5");
                    }
                    else {
                        ("Lỗi đánh giá");
                    }
                }
            })
        });
    </script>
    @endsection