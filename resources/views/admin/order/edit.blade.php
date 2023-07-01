@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Cập nhật Đơn hàng</h2>
        </div>
        <div class="panel-body">
          
            <form method="post" action="/admin/order/edit/{{$data->id}}" enctype="multipart/form-data">
                @csrf
                <div  class="form-group">
                <input type="hidden" name="_method" value="put">
                 </div>
              
             
                <div class="form-group">
                    <label for="name">Email :</label>
                    <input required="true" name="consingnee_email" value="{{$data->consingnee_email}}" type="text" class="form-control" id="title" name="title" >
                </div>
                <div class="form-group">
                    <label for="name">Họ tên :</label>
                    <input required="true" name="consingnee_name" value="{{$data->consingnee_name}}" type="text" class="form-control" id="title" name="title" >
                </div>
                <div class="form-group">
                    <label for="name">Địa chỉ :</label>
                    <input required="true" name="consingnee_address" value="{{$data->consingnee_address}}" type="text" class="form-control" id="title" name="title" >
                </div>
                <div class="form-group">
                    <label for="name">Số điện thoại :</label>
                    <input required="true" name="consingnee_phone" value="{{$data->consingnee_phone}}" type="text" class="form-control" id="title" name="title" >
                </div>
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection