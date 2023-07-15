
@if(Session::has('Cart') != null)
  
<div class="select-items" style="margin-left: 20px;  ">
    <table>

        <tbody>
            @foreach(Session::get('Cart')->products as $item)
            <tr class="">
                <td>
                    <img style="height: 70px;margin-right: 20px"
                        src="/frontend/img/{{$item['productInfo']->image}}"
                        alt="" />
                </td>
                <td class="">

                    <h6 style="font-weight: 900;">
                        {{$item['productInfo']->name_product}} </h6>




                    <h6 style="font-size: 13px">Size:
                        {{$item['productInfo']->number_size}} </h6>
                    <h6 style="font-size: 13px">Màu:
                        {{$item['productInfo']->name_color}} </h6>
                    <h6 style="font-size: 13px">
                        Số lượng: {{$item['quanty']}}
                    </h6>
                    <h6 style="color:#D19C97;font-weight:700  ">
                        {{(number_format($item['productInfo']->price))}}₫</h6>
                </td>


                <td class=" delete ">

                    <button class="btn-xoa-cart btn btn-sm text-dark p-0 "
                        data="{{$item['productInfo']->id}}"
                        value="{{$item['productInfo']->id_size.$item['productInfo']->id_color}}">
                        <i style="padding: 20px"
                            class="fa fa-times"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="select-total text-right" style="padding: 20px 10px; ">
    <span style="font-size: 20px">Tổng:</span>
    <span
        style="color:#D19C97;font-weight:700;font-size: 20px">{{(number_format(Session::get('Cart')->totalPrice))}}₫</span>
</div>
<div class="card-footer d-flex justify-content-center ">
    <a href="{{url('/List-Cart')}}" class="btn btn-sm text-dark p-0"><i
            class="fa fa-shopping-cart mr-1"></i>Xem giỏ hàng</a>
    <a href="" class="btn btn-sm text-dark p-0"><i
            class="fa fa-shopping-cart mr-1"></i> Mua
        Ngay</a>
</div>

@else 
<p>khong có sản phẩm nào trong giỏ hàng </p>
@endif

