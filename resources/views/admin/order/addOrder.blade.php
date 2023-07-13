@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm Đơn Hàng</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/order/create')}}" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                <label for="name">Chọn khách hàng:</label>
                <select name="id_user"  class="form-control">
                    <option value=" ">Chọn tài khoản khách hàng </option>
                    @foreach ( $user as $item)
                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                    
                  

                </select>
                </div>
                <div class="form-group">
                    <label for="name">Email :</label>
                    <input required="true" name="consingnee_email" type="text" class="form-control" id="title" name="title" >
                </div>
                <div class="form-group">
                    <label for="name">Họ tên :</label>
                    <input required="true" name="consingnee_name" type="text" class="form-control" id="title" name="title" >
                </div>
                <div class="form-group">
                    <label for="name">Địa chỉ :</label>
                    <input required="true" name="consingnee_address" type="text" class="form-control" id="title" name="title" >
                </div>
                <div class="form-group">
                    <label for="name">Số điện thoại :</label>
                    <input required="true" name="consingnee_phone" type="text" class="form-control" id="title" name="title" >
                </div>
           
              
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