 
@if(Session::has('Cart') != null)
  
            <div class="select-items" style="margin-left: 20px;  ">
                <table>
                    <tbody>
                        @foreach(Session::get('Cart')->products as $item)
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
                            <td class="si-text delete">
                                 <p class="xoa" data-id ="{{$item['productInfo']->id}}" >xoa</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="select-total">
                <span>total:</span>
                <h5>{{(number_format(Session::get('Cart')->totalPrice))}}VNĐ</h5>
                <input type="number" name="" value="Session::get('Cart')->totalPrice" id="">
            </div>
            
            
    
       
@else 
        <p>khong có sản phẩm nào trong giỏ hàng </p>
@endif
        
 