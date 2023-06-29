@extends('user.dashboard')
@section('user')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5" id="list-cart">
            <div class="col-lg-8 table-responsive mb-5"  >
                <table class="table table-bordered text-center mb-0" id="change-list-cart">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle"  >
                        @if(Session::has('Cart') != null)
                        @foreach(Session::get('Cart')->products as $item)
                        <tr>
                            <td class="align-middle"><img src="/frontend/img/{{$item['productInfo']->image}}" alt="" style="width: 50px;">{{$item['productInfo']->name_product}}</td>
                            <td class="align-middle">{{(number_format($item['productInfo']->price))}} VNĐ</td>
                        
                            <td class="align-middle" value="{{$item['productInfo']->id_size}}">
                              
                                    {{$item['productInfo']->number_size}}  
                                     
                              
                            </td>
                            <td class="align-middle"value="{{$item['productInfo']->id_color}}" >
                            
                                    {{$item['productInfo']->name_color}}  
                                     
                                
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantityy mx-auto" style="width: 100px;">
                                    <div class="input-group quantityy mr-3" style="width: 130px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-minus" onclick="decreaseQuantity({{$item['productInfo']->id}})">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control bg-secondary text-center quantityInput" id="quantityInput_{{$item['productInfo']->id}}" value="{{$item['quanty']}}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-plus" onclick="increaseQuantity({{$item['productInfo']->id}})">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{(number_format($item['price']))}} VNĐ</td>
                            <td class="align-middle"><button data="{{$item['productInfo']->id}}"  class="btn btn-sm btn-primary btn_delete_list" value="{{$item['productInfo']->id_size.$item['productInfo']->id_color}}">
                                <i  
                     
                                     class="fa fa-times"
                  
                                     ></i></button></td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary" onclick="SaveListItemCart({{$item['productInfo']->id}});"  id="save-cart-item-{{$item['productInfo']->id}}" ><i  class="">Cập nhật</i></button></td>
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
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Total Quanty</h6>
                            <h6 class="font-weight-medium">{{Session::get('Cart')->totalQuanty}} Product</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{(number_format(Session::get('Cart')->totalPrice))}}VNĐ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"> </h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{(number_format(Session::get('Cart')->totalPrice))}} VNĐ</h5>
                        </div>
                        <?php
                        $data1=Session::get('data1');
                        ?>
                        @if( $data1 == null)
                            <a href="{{URL::to('/login') }}" class="nav-item nav-link"><button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button></a>
                        
                        @else
                        <a href="{{URL('/checkout')}}"><button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button></a>
                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="{{url('frontend')}}/img/payments.png" alt="">
            </div>
        </div>
    </div>
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
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- Template Javascript -->
    <script src="{{url('frontend')}}/js/main.js"></script>
    <script>
        function decreaseQuantity(productId) {
            var quantityInput = document.getElementById('quantityInput_' + productId);
            var currentValue = parseInt(quantityInput.value);
    
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
    
        function increaseQuantity(productId) {
            var quantityInput = document.getElementById('quantityInput_' + productId);
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        }
    
        function updateQuantity(productId) {
            var quantityInput = document.getElementById('quantityInput_' + productId);
            var newQuantity = parseInt(quantityInput.value);
            
            // Perform an AJAX request or any necessary update operation to update the quantity on the server-side
            // Example: You can use fetch() or jQuery.ajax() to send the updated quantity to the server
            
            // For demonstration purposes, let's log the new quantity in the console
            console.log('Updated quantity for product ID ' + productId + ': ' + newQuantity);
        }
    </script>
    <script>
        // function DeleteListItemCart(id){
        //     // console.log(id);
        //     $.ajax({
        //         type: "GET",
        //         data:{
        //             id_color_size:$(this).val()
        //         },
        //         url: "/Delete-List-Item-Cart/" +attr('data'),
        //     }).done(function(response){
                 
        //         RenderListCart(response);
        //         alertify.success('Xóa sản phẩm trong  giỏ hàng thành công');
                
        //     });
        // }
        $('#change-list-cart').on('click', '.btn_delete_list', function(){
            //console.log($(this).data('id'));
            $.ajax({
                type: "GET",
                data:{
                    id_color_size:$(this).val()
                },
                url: "/Delete-List-Item-Cart/"+$(this).attr('data'),
            }).done(function(response){
               
                 
                RenderListCart(response);
                alertify.success('Xóa sản phẩm trong  giỏ hàng thành công');
                
            });
        });
        function SaveListItemCart(id){
            // console.log(id);    
             console.log($('#quantityInput_'+id).val());
            $.ajax({
                type: "GET",
                url: "/Save-List-Item-Cart/" +id+'/'+$('#quantityInput_'+id).val(),
            }).done(function(response){
                 
                RenderListCart(response);
                alertify.success('Cập nhật  giỏ hàng thành công');
                
            });
        }
        function RenderListCart(response){
            $('#list-cart').empty();
            $('#list-cart').html(response);
         
            
                // console.log( $('#total-quanty-cart').val());
        }
    </script>
@endsection