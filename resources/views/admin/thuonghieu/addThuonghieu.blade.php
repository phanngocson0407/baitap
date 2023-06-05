@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm Thương Hiệu</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/thuonghieu/create')}}" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="name">Tên thương hiệu :</label>

                    <input required="true" name="tenthuonghieu" type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                <button class="btn btn-success">Lưu</button>
            </form>
        </div>
    </div>
</div>
@endsection