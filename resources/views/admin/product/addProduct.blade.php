@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm Sản Phẩm</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/product/create')}}" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm:</label>

                    <input required="true" name="name_product" type="text" class="form-control" id="title" name="title"
                        value=" " class="@error('name_product') form-control is-invalid @enderror">
                        @error('name_product') 
                        <div class="" style="color:red">{{$message}} </div>
                         @enderror
                </div>
                <div class="form-group">
                    <label for="name">Loại:</label>
                    <select name="idloaigiay" id="" class="form-control">
                        <option value=" ">Chọn thể loại</option>
                        @foreach ( $Category as $data)
                        <option value="{{ $data->idloaigiay }}" >{{ $data->name_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" form-group">
                    <label for="name">Giá:</label>

                    <input required="true" name="price" type="text" class="form-control" id="title" name="title"
                        value=" " class="@error('price') form-control is-invalid @enderror">
                        @error('price') 
                        <div class="" style="color:red">{{$message}} </div>
                         @enderror
                </div>
                <div class="form-group">
                    <label for="name">Mô tả:</label>

                    <input required="true" name="description" type="text" class="form-control" id="title" name="title"
                        value=" " class="@error('description') form-control is-invalid @enderror">
                        @error('description') 
                        <div class="" style="color:red">{{$message}} </div>
                         @enderror
                </div>
                <div class="form-group">
                    <label for="name">Hình ảnh:</label>

                    <input class="form-control file" type="file" name="image" data-max-file-count=""
                        multiple="multiple"  class="@error('image') form-control is-invalid @enderror">
                </div>
                @error('image') 
                <div class="" style="color:red">{{$message}} </div>
                 @enderror
                <button class="btn btn-success">Lưu</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{url('backend')}}/js/main.js"></script>


<script src="{{url('backend')}}/js/lib/data-table/datatables.min.js"></script>
<script src="{{url('backend')}}/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="{{url('backend')}}/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="{{url('backend')}}/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="{{url('backend')}}/js/lib/data-table/jszip.min.js"></script>
<script src="{{url('backend')}}/js/lib/data-table/vfs_fonts.js"></script>
<script src="{{url('backend')}}/js/lib/data-table/buttons.html5.min.js"></script>
<script src="{{url('backend')}}/js/lib/data-table/buttons.print.min.js"></script>
<script src="{{url('backend')}}/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="{{url('backend')}}/js/init/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
  } );
</script>
@endsection