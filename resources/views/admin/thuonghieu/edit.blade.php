@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Cập nhật Thương Hiệu</h2>
        </div>
        <div class="panel-body">
          
            <form method="post" action="/admin/thuonghieu/edit/{{$data->idthuonghieu}}" enctype="multipart/form-data">
                @csrf
                <div  class="form-group">
                <input type="hidden" name="_method" value="put">
                 </div>
                <div class="form-group">
                    <label for="name">Tên Thương Hiệu:</label>

                    <input required="true" name="tenthuonghieu" type="text" class="form-control" id="title" name="title"
                        value="{{$data->tenthuonghieu}}">
                </div>
                
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection