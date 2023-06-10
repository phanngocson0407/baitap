@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        
        <div class="panel-heading">
            <h2 class="text-center">Thêm Loại Sản Phẩm</h2>
            
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/size/create')}}" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="name">Tên Loại Sản Phẩm:</label>

                    <input required="true" name="name_category" type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                <div class="form-group">
                    <label for="name">Thương Hiệu:</label>
                    <select name="id_thuonghieu"  class="form-control">
                        <option value=" ">Chọn thương hiệu </option>
                        @foreach ( $ThuongHieu as $data_thuonghieu)
                        <option value="{{ $data_thuonghieu->idthuonghieu }}">{{ $data_thuonghieu->tenthuonghieu }}</option>
                        @endforeach
                        
                      

                    </select>
                </div>
                <button class="btn btn-success">Lưu</button>
                
            </form>
            
        </div>
    </div>
</div>
@endsection