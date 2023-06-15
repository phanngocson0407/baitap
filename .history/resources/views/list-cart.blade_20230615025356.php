<div class="col-lg-8 table-responsive mb-5" id="list-cart" >
    <table class="table table-bordered text-center mb-0">
        <thead class="bg-secondary text-dark">
            <tr>
                <th>Products</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @if(Session::has('Cart') != null)
            @foreach(Session::get('Cart')->products as $item)
            <tr>
                <td class="align-middle"><img src="/frontend/img/{{$item['productInfo']->image}}" alt="" style="width: 50px;">{{$item['productInfo']->name_product}}</td>
                <td class="align-middle">{{(number_format($item['productInfo']->price))}} VNĐ</td>
                <td class="align-middle">
                    <div class="input-group quantity mx-auto" style="width: 100px;">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{$item['quanty']}}">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="align-middle">{{(number_format($item['price']))}} VNĐ</td>
                <td class="align-middle"><button class="btn btn-sm btn-primary"><i onclick="DeleteListItemCart({{$item['productInfo']->id}});"  class="fa fa-times"></i></button></td>
            </tr>
            @endforeach
            @else
                <h1>Quay lại trang chủ <a href="{{url('/')}}"></a></h1>
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
        @if(Session::has('Cart') != null)
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Total Quanty</h6>
            
                <h6 class="font-weight-medium" id="total-list-item">{{Session::get('Cart')->totalQuanty}} Product</h6>
     
           
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
        </div>
        @else 
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Total Quanty</h6>
            
                <h6 class="font-weight-medium" id="total-list-item"> 0 Product</h6>
     
           
            </div>
            <div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">Subtotal</h6>
                <h6 class="font-weight-medium"> 0 VNĐ</h6>
            </div>
            <div class="d-flex justify-content-between">
                <h6 class="font-weight-medium">Shipping</h6>
                <h6 class="font-weight-medium"> </h6>
            </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
            <div class="d-flex justify-content-between mt-2">
                <h5 class="font-weight-bold">Total</h5>
                <h5 class="font-weight-bold"> 0 VNĐ</h5>
            </div>
        </div>
        @endif
        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
    </div>
</div>