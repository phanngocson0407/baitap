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
                <label for="name">Tên  Sản Phẩm:</label>
                <select name="id_product"  class="form-control">
                    <option value=" ">Chọn Sản Phẩm </option>
                    @foreach ( $Product as $item)
                    <option value="{{ $item->id }}">{{ $item->name_product }}</option>
                    @endforeach
                    
                  

                </select>
            </div>
                <div class="form-group">
                    <label for="name">Size giày:</label>

                    <input required="true" name="number_size" type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                 
                <button class="btn btn-success">Lưu</button>
                
            </form>
            
        </div>
    </div>
</div>
@endsection