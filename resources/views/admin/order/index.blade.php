@extends('admin.dashboard')
@section('admin')
<?php
     $data=Session::get('data');
    $role=Session::get('role');
?>
        
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Bảng Blogu</strong>
                            </div>
                            <div class="card-body" id="change-list-status">
                                <table class="table table-striped table-bordered"> 
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ID Đơn Hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Email</th>
                                            <th>Họ Tên</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện Thoại</th>
                                            <th>Trạng thái</th>
                                            <th>Trạng thái hủy đơn</th>
                                            <th>Chọn trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody id="content-order">
                                        <?php $n=0 ?>
                                      @foreach($order as $item)
                                       <?php $n++ ?>
                                       <tr>
                                       <td>{{$n}}</td>
                                        <td data-id="{{$item->id}}"> <a href="{{URL::to('/admin/order/order-detail/' .$item->id)}}"
                                            style="color:blue">
                                             {{$item->id}}</a>
                                        </td>
                                        <td>{{$item->date_payment}}</td>    
                                        <td>{{$item->consingnee_email}}</td>
                                        <td>{{$item->consingnee_name}}</td>
                                        <td>{{$item->consingnee_address}}</td>
                                        <td>{{$item->consingnee_phone}}</td>
                                        <td>
                                            <?php
                                                if($item->status==0){
                                                    echo 'Đang chờ duyệt';
                                                }elseif($item->status==1){
                                                    echo 'Duyệt đơn hàng';
                                                }elseif($item->status==2){
                                                    echo 'Đang vận chuyển';
                                                }elseif($item->status==3){
                                                    echo 'Giao Hàng';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($item->status_huy==0){
                                                    echo 'Đơn hàng chưa được hủy';
                                                }elseif($item->status_huy==1){
                                                    echo 'Khách hàng đã hủy';
                                                }
                                            ?>

                                        </td>
                                        <td>
                                            <input type="hidden" value="{{$item->id}}" name="id_order">
                                            <select name="" id="status" class="update_status">
                                                <option value="">---Chọn trạng thái---</option>
                                                <option value="0">Đặt hàng(chờ duyệt)</option>
                                                <option value="1">Duyệt đơn hàng</option>
                                                <option value="2">Đang vận chuyển</option>
                                                <option value="3">Giao hàng</option>
                                            </select>
                                        </td>
                                        @foreach ($role as $k=>$v)
                                            @if($v->role_module=="role_edit_order")
                                            <td>
                                                <a href="order/edit/{{$item->id}}">
                                                <button  class="btn btn-outline-secondary">
                                                <i class="fa fa-edit"></i>Sửa</button>
                                                </a>
                                            </td>
                                            @endif

                                     
                                            @endforeach
                                        </tr>
                                    </tbody>
                                @endforeach
                                </table>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );

      $(document).ready(function() {
        $('.update_status').change(function() {
           
            var selectedValue = $(this).val();
            var id_order=$(this).parent().find("input[name=id_order]").val();
            // Gửi yêu cầu AJAX để cập nhật trạng thái
            $.ajax({
                url: "/admin/order/update-status", // Đường dẫn xử lý yêu cầu AJAX
                type: 'POST', // Phương thức gửi yêu cầu
                data: {
                    id:id_order,
                    status:selectedValue
                },
                dataType: 'json', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.success)
                    {
                        alert(response.message);
                        location.reload();
                    }else{
                        alert(response.message);
                    }
                    // console.log(response);
                }
               
            });
        });
    });
  </script>
  
@endsection
