@extends('admin.dashboard')
@section('admin')
<?php 
    $data_admin=Session::get('data');
?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Trả lời bình luận</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{URL::to('/admin/comment/reply-comment')}}" enctype="multipart/form-data">
               @csrf
               <div class="row form-group">
                <div class="col col-md-12">
                    <div class="input-group">
                        <input type="text" id="input1-group1" name="input1-group1" readonly value="{{$comment['comment_name']}} - {{$comment['comment_date']}} " class="form-control">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12">
                    <div class="input-group">
                        <input type="" id="input2-group1" name="input2-group1" readonly value="{{$comment['comment']}}" class="form-control">
                        
                    </div>
                    <div>
                        Tên Sản phẩm:
                        <input type="text" readonly value="{{$comment['name_product']}}">
                        <img style="max-width: 100px; height 100px;" src="{{ URL::to('/frontend/img/'.$comment['image'])}}" alt="">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12">
                    <div class="input-group">
                        <input type="text" name="id_comment" hidden value="{{$comment['id']}}" id="">
                        
                        <input type="" id="input2-group1" name="name_admin" readonly value="Tên người trả lời: {{$data_admin->username??""}}" class="form-control">
                     
                        
                    </div>
                    <div class="input-group">
                        <input type="text" id="input1-group1" name="reply"  value="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Trả lời
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
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