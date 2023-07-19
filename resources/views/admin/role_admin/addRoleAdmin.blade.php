@extends('admin.dashboard')
@section('admin')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm Quyền Admin</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/role_admin/create')}}" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="name">Tài khoản admin:</label>
                    <select name="id_admin" id="" class="form-control">


                        <option value=" ">Chọn tài khoản admin</option>
                        @foreach ( $admin as $data)
                        <option value="{{ $data->id }}">{{ $data->username }}</option>
                        @endforeach
                        
                      

                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Quyền:</label>
                    <select name="id_role" id="" class="form-control">


                        <option value=" ">Chọn Quyền</option>
                        @foreach ( $role as $data)
                        <option value="{{ $data->id }}">{{ $data->role_module }}</option>
                        @endforeach
                        
                      

                    </select>
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