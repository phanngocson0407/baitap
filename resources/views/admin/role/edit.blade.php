@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Cập nhật Quyền</h2>
        </div>
        <div class="panel-body">
          
            <form method="post" action="/admin/role/edit/{{$data->id}}" enctype="multipart/form-data">
                @csrf
                <div  class="form-group">
                <input type="hidden" name="_method" value="put">
                 </div>
                 <div class="form-group">
                 <label for="name">Tên Quyền:</label>

                 <input required="true" name="name_role" type="text" class="form-control" id="title" name="title"
                 value="{{$data->name_role}}" >
             </div>
             <div class="form-group">
                 <label for="name">Module:</label>

                 <input required="true" name="role_module" type="text" class="form-control" id="title" name="title"
                 value="{{$data->role_module}}"  >
             </div>
            
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection