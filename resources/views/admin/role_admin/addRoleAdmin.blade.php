@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm Sản Phẩm</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/role_admin/create')}}" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="name">Tài khoản admin:</label>
                    <select name="id_admin" id="" class="form-control">


                        <option value=" ">Chọn tài khoản admin</option>
                        @foreach ( $admin as $data)
                        <option value="{{ $data->id }}">{{ $data->username }}</option>
                        @endforeach
                        
                      

                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Quyền:</label>
                    <select name="id_role" id="" class="form-control">


                        <option value=" ">Chọn Quyền</option>
                        @foreach ( $role as $data)
                        <option value="{{ $data->id }}">{{ $data->role_module }}</option>
                        @endforeach
                        
                      

                    </select>
                </div>
                <button class="btn btn-success">Lưu</button>
            </form>
        </div>
    </div>
</div>
@endsection