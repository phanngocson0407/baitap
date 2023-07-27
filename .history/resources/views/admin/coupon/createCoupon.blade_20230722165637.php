@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        
        <div class="panel-heading">
            <h2 class="text-center">Thêm Coupon</h2>
            
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/coupon/create')}}" enctype="multipart/form-data">
               @csrf
           
       
                <div class="form-group">
                    <label for="name">Tên mã giảm giá:</label>

                    <input required="true" name="coupon_name" type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                <div class="form-group">
                    <label for="name">Số lượng mã:</label>

                    <input required="true" name="coupon_quanti" type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                <div class="form-group">
                    <label for="name">Mã giảm giá:</label>

                    <input required="true" name="coupon_code" type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                <div class="form-group">
                    <label for="name">Tính năng mã:</label>
                    <select name="coupon_condition" class="form-control"  id="">
                        <option value="0">Chọn tính năng</option>
                        <option value="1">Giảm giá theo phần trăm</option>
                        <option value="2">Giảm giá theo tiền</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nhập số % hoặc tiền giảm:</label>

                    <input required="true" name="   " type="text" class="form-control" id="title" name="title"
                        value=" ">
                </div>
                <button class="btn btn-success">Thêm</button>
                
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