@extends('admin.dashboard')
@section('admin')
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Bảng SẢN PHẨM</strong>
                            </div>
                            <div class="col-lg-6 col-6 text-left">
                                <form action="/admin/product/" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="kw" placeholder="Search for products">
                                        <div class="input-group-append">
                                            <input type="submit" class="input-group-text bg-transparent text-primary" value="Tìm Kiếm">
                                                
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <a href="{{URL::to('/admin/product/create') }}">
                                    <button class="btn btn-outline-primary" style="margin-bottom: 15px;"><i class="fa fa-star"></i>Thêm Sản Phẩm</button>
                                </a>
                                <table class="table table-striped table-bordered"> 
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Tên loại</th>
                                            <th>Giá</th>
                                            <th>Mô tả </th>
                                            <th>Ảnh</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n=0 ?>
                                        @foreach ( $Product as $item)
                                        <?php $n++ ?>
                                        <td>{{$n}}</td>
                                        <td> {{$item->name_product}}</td>
                                        <td> {{$item->name_category}}</td>
                                        <td>{{number_format($item->price).' '.'VNĐ' }}</td>
                                        <td><img style="max-width: 200px; height 200px;" src="{{ URL::to('/frontend/img/'.$item->image)}}"
                                            alt=""></td> 
                                            <td>
                                                <a href="product/edit/{{$item->id}}">
                                                <button  class="btn btn-outline-secondary">
                                                <i class="fa fa-edit"></i>Sửa</button>
                                                </a>
                                                <form action="product/delete/{{$item->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button class="btn btn-outline-danger" style="margin-bottom: 15px;"><i class="ti-trash"></i> Xóa</button>
                                                </form>
                                             
                                            </td>
                                    </tbody>
                                    @endforeach
                                </table>
                                {{$Product->links()}}
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
