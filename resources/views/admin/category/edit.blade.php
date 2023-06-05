@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Cập nhật Loại Sản Phẩm</h2>
        </div>
        <div class="panel-body">
          
            <form method="post" action="/admin/category/edit/{{$data->idloaigiay}}" enctype="multipart/form-data">
                @csrf
                <div  class="form-group">
                <input type="hidden" name="_method" value="put">
                 </div>
                <div class="form-group">
                    <label for="name">Tên Loại Sản Phẩm:</label>

                    <input required="true" name="name_category" type="text" class="form-control" id="title" name="title"
                        value="{{$data->name_category}}">
                </div>
                <div class="form-group">
                    <label for="name">Loại:</label>
                    <select name="id_thuonghieu" id="" class="form-control">
                        <option value=" ">Chọn thể loại</option>
                        @foreach ( $ThuongHieu as $v)
                        <option value="{{ $v->idthuonghieu }}">{{ $v->tenthuonghieu }}</option>
                        @endforeach
                    </select>
                </div>
               
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection