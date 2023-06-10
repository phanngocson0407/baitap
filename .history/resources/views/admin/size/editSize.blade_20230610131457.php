@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Cập nhật size</h2>
        </div>
        <div class="panel-body">
          
            <form method="post" action="/admin/size/edit/{{$data->id}}" enctype="multipart/form-data">
                @csrf
                <div  class="form-group">
                <input type="hidden" name="_method" value="put">
                 </div>
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm:</label>

                    <input required="true" name="name_product" type="text" class="form-control" id="title" name="title"
                        value="{{$data->name_product}}">
                </div>
                <div class="form-group">
                    <label for="name">Loại:</label>
                    <select name="idloaigiay" id="" class="form-control">
                        <option value=" ">Chọn thể loại</option>
                        @foreach ( $Category as $v)
                        <option value="{{ $v->idloaigiay }}">{{ $v->name_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" form-group">
                    <label for="name">Giá:</label>
                    <input name="price" type="text" class="form-control" id="title"
                    value="{{$data->price}}">

                </div>
                <div class="form-group">
                    <label for="name">Mô tả:</label>

                    <input required="true" name="description" type="text" class="form-control" id="title" name="title"
                        value="{{$data->description}}">
                </div>
                <div class="form-group">
                    <label for="name">Hình ảnh:</label>

                    <input class="form-control file" type="file" name="image" data-max-file-count=""
                        multiple="multiple" value="{{$data->image}}">
                        
                </div>
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection