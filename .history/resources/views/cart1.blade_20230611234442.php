<script src="{{url('frontend')}}/js/bootstrap.min.js"></script>
@if($newCart != null)
        <div class="cart-hover" style="margin: 50px">
            <div class="select-items">
                <table>
                    <tbody>
                        @foreach($newCart->products as $item)
                        <tr>
                            <td class="si-pic"><img style="height: 50px;" src="/frontend/img/{{$item['productInfo']->image}}" alt="" /></td>
                            <td class="si-text">
                                <div class="product-selected">
                                    <p>{{$item['productInfo']->name_product}}  </p>
                                     
                                </div>
                            </td>
                            <td class="si-text">
                                <div class="product-selected">
                                    <p>{{$item['productInfo']->price}} x {{$item['quanty']}}</p>
                                     
                                </div>
                            </td>
                            <td class="si-close">
                                <i class="bi bi-x"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="select-total">
                <span>total:</span>
                <h5>{{(number_format($newCart->totalPrice))}}VNĐ</h5>
            </div>
            
        </div>
        <div class="select-button">
            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Mua
                Ngay</button>
            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Mua
                Ngay</button>
        </div>
@else 
        <p>khong có sản phẩm nào trong giỏ hàng </p>
@endif
        
 