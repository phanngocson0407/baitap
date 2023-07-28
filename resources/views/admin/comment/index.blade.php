@extends('admin.dashboard')
@section('admin')
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Đánh giá</strong><br>
                                <strong style="color: red" class="card-title">{{session('mess')}}</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered"> 
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Duyệt đánh giá</th>
                                            <th>Sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Đánh giá</th>
                                            <th>Tên người đánh giá</th>
                                            <th>Ngày</th>                                       
                                         </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n=0 ?>
                                      @foreach($cm as $item)
                                       <?php $n++ ?>
                                       <td>{{$n}}</td>
                                       <td>
                                        @if($item->status==0)
                                            <a href="comment/unactive/{{$item->id}}?status=1">
                                                <div class="fa fa-thumbs-o-down" style="font-size:30px; color:red"></div>
                                            </a>
                                        @else
                                            <a href="comment/unactive/{{$item->id}}?status=0">
                                                <div class="fa fa-thumbs-o-up" style="font-size:30px; color:green"></div>
                                            </a>
                                        
                                        @endif
                                       </td>
                                       <td>{{$item->name_product}}</td>
                                       <td><img style="max-width: 90px; height 200px;" src="{{ URL::to('/frontend/img/'.$item->image)}}"
                                        alt=""></td>
                                        <td>{{$item->comment}}</td>
                                        <td>{{$item->comment_name}}</td>
                                        <td>{{$item->comment_date}}</td>

                                            <td>
                                                <form action="comment/delete/{{$item->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-outline-danger" style="margin-bottom: 15px;"><i class="ti-trash"></i> Xóa</button>
                                                </form>
                                            </td>
                                            <td>
                                                @if($item->status==1)
                                                <a href="comment/reply-comment/{{$item->id}}">
                                                    <button class="btn btn-outline-success btn-block" style="margin-bottom: 15px;"><i class="fa fa-magic"></i>Trả lời bình luận</button>
                                                </a>
                                                @endif
                                            </td>
                                    </tbody>
                                @endforeach
                                </table>
                                {{$cm->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

     

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
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
