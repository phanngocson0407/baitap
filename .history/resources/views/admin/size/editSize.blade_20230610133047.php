@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Cập nhật size</h2>
        </div>
        <div class="panel-body">
          
            <form method="post" action="/admin/size/edit/{{$data->id_size}}" enctype="multipart/form-data">
                @csrf
                <div  class="form-group">
                <input type="hidden" name="_method" value="put">
                 </div>
                 <div class="form-group">
                    <label for="name">Tên Sản Phẩm:</label>
                    <select name="idloaigiay" id="" class="form-control">
                        <option value="id_product">Chọn  Sản Phẩm</option>
                        @foreach ( $Product as $item)
                        <option value="{{ $item->id}}">{{ $item->name_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Size giày:</label>

                    <input required="true" name="name_product" type="text" class="form-control" id="title" name="title"
                        value="{{$Size->number_size}}">
                </div>
                 
                 
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection