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
             @endif
        </tbody>
    </table>
</div>
 