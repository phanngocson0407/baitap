@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm Quyền</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/role/create')}}" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="name">Tên Quyền:</label>

                    <input required="true" name="name_role" type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                
                <div class=" form-group">
                    <label for="name">Module:</label>

                    <input required="true" name="role_module" type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                
                <button class="btn btn-success">Lưu</button>
            </form>
        </div>
    </div>
</div>
@endsection