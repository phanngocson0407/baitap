
<h1>From: {{$data['nguoigui']}} </h1>
<?php
$data1=Session::get('data1');
?>
Cam ơn khách hàng {{Session::get('data1')->fullname}} đã mua hàng. 
<div>
Thông tin đơn hàng của quý khách 
<table boder=1>
    <tr>
        <td>Tên sản phẩm</td>
        <td>Màu</td>
        <td>Size</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Thành Tiền</td>
       
    </tr>

@foreach(Session::get('Cart')->products as $item)
<tr>
    <td>{{$item['productInfo']->name_product}}</td>
    <td>{{$item['productInfo']->name_color}}</td>
    <td>{{$item['productInfo']->number_size}}</td>
    <td>{{$item['productInfo']->price}}</td>
    <td>{{$item['quanty']}}</td>
    <td>{{ number_format( $item['productInfo']->price * $item['quanty'] ) }}</td>
   
</tr>
<tr>
    
    <td>Tổng tiền</td>
    <td>
    {{(Session::get('Cart')->totalPrice+ 30000) }}</td></tr>
@endforeach
</table>
<div>Liên hệ phone 033 4653 923 Bộ phận chăm sóc khách hàng {{url('/')}}</div>
</div>