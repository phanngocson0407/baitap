
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

                    <h6 style="font-weight: 900;white-space: nowrap; ">
                        {{$item['productInfo']->name_product}} </h6>




                    <h6 style="font-size: 13px">Kích cỡ:
                        {{$item['productInfo']->number_size}} </h6>
                    <h6 style="font-size: 13px">Màu:
                        {{$item['productInfo']->name_color}} </h6>
                    <h6 style="font-size: 13px">
                        Số lượng: {{$item['quanty']}}
                    </h6>
                    <h6 style="color:#D19C97;font-weight:700  ">
                        {{ number_format($item['productInfo']->price, 0, '.', '.') . ' VNĐ' }}</h6>
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
        style="color:#D19C97;font-weight:700;font-size: 20px">{{ number_format(Session::get('Cart')->totalPrice, 0, '.', '.') . ' VNĐ' }}</span>
        <input hidden type="number" name="" value="{{Session::get('Cart')->totalQuanty}}" id="total-quanty-cart">
</div>
<div class="d-flex justify-content-center py-2">
    <a href="{{url('/List-Cart')}}">
        <button class="btn btn-primary px-2 rounded mx-2">
            Xem Giỏ Hàng
        </button>
    </a>
    
    <?php
    $data1 = Session::get('data1');
    ?>
    @if ($data1 == null)
        <a href="{{URL::to('/login')}}">
            <button class="btn btn-primary px-2 rounded mx-2">
                Thanh Toán
            </button>
        </a>
    @else
        <a href="{{URL('/checkout')}}">
            <button class="btn btn-primary px-2 rounded mx-2">
                Thanh Toán
            </button>
        </a>
    @endif
</div>




</div>
@else
<p style="padding: 10px; border-radius: 10px;font-weight: 700" class="text-center">Không có sản phẩm nào trong giỏ hàng</p>


@endif

