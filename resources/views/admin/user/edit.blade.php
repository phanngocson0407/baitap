@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Cập nhật Thương Hiệu</h2>
        </div>
        <div class="panel-body">
          
            <form method="post" action="/admin/khachhang/edit/{{$data->id}}" enctype="multipart/form-data">
                @csrf
                <div  class="form-group">
                <input type="hidden" name="_method" value="put">
                 </div>
                 <div class="form-group">
                 <label for="name">Tên khách hàng:</label>

                 <input required="true" name="fullname" type="text" class="form-control" id="title" name="title"
                 value="{{$data->fullname}}" >
             </div>
             <div class="form-group">
                 <label for="name">Email:</label>

                 <input required="true" name="email" type="text" class="form-control" id="title" name="title"
                 value="{{$data->email}}"   >
             </div>
             <div class="form-group">
                 <label for="name">Số điện thoại:</label>

                 <input required="true" name="phone" type="text" class="form-control" id="title" name="title"
                 value="{{$data->phone}}"  >
             </div>
             <div class="form-group">
                 <label for="name">Địa chỉ:</label>

                 <input required="true" name="address" type="text" class="form-control" id="title" name="title"
                 value="{{$data->address}}"  >
             </div>
             <div class="form-group">
                 <label for="name">Tên tài khoản:</label>

                 <input required="true" name="username" type="text" class="form-control" id="title" name="title"
                 value="{{$data->username}}"   >
             </div>
             <div class="form-group">
                 <label for="name">Mật khẩu:</label>

                 <input required="true" name="password" type="password" class="form-control" id="title"
                 value="{{$data->password}}"  >
                    
             </div>
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection