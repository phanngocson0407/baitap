@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm Accout Admin</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/accout/create')}}" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="name">Họ Tên Admin:</label>

                    <input required="true" name="fullname" type="text" class="form-control" id="title" name="title"
                    class="@error('fullname') form-control is-invalid @enderror"   >
                </div>
                @error('fullname') 
                <div class="" style="color:red">{{$message}} </div>
                 @enderror
                <div class="form-group">
                    <label for="name">Số điện thoại:</label>
                    <input required="true" name="phone" type="text" class="form-control" id="title" name="title"
                    class="@error('phone') form-control is-invalid @enderror"    >
                </div>
                @error('phone') 
                <div class="" style="color:red">{{$message}} </div>
                @enderror
                <div class="form-group">
                    <label for="name">Tên tài khoản:</label>

                    <input required="true" name="username" type="text" class="form-control" id="title" name="title"
                    class="@error('username') form-control is-invalid @enderror"   >
                </div>
                @error('username') 
                <div class="" style="color:red">{{$message}} </div>
                @enderror
                <div class="form-group">
                    <label for="name">Mật khẩu:</label>

                    <input required="true" name="password" type="password" class="form-control" id="title" 
                    class="@error('password') form-control is-invalid @enderror">
                       
                </div>
                @error('password') 
                <div class="" style="color:red">{{$message}} </div>
                @enderror
                <button class="btn btn-success">Lưu</button>
            </form>
        </div>
    </div>
</div>
@endsection