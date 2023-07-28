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
                                <strong class="card-title">Bảng Đơn hàng</strong>
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
                                            <th>Hình Thức Thanh Toán</th>
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
                                     
                                        <td data-id="{{$item->id}}">
                                            @if($item->status_huy!=1)<a href="{{URL::to('/admin/order/order-detail/' .$item->id)}}" style="color:blue">
                                            
                                            @endif
                                             {{$item->id}}</a>
                                        </td>
                                        
                                        <td>{{$item->date_payment}}</td>    
                                        <td>{{$item->consingnee_email}}</td>
                                        <td>{{$item->consingnee_name}}</td>
                                        <td>{{$item->consingnee_address}}</td>
                                        <td>{{$item->consingnee_phone}}</td>
                                        <td>     <?php
                                            if($item->status_payment==0){
                                                echo '<b style="color:blue">Thanh Toán Bằng Tiền Mặt</b>';
                                            }elseif($item->status_payment==1){
                                                echo '<b style="color:rgb(248, 12, 177)">Thanh Toán Qua VNPAY </b>';
                                   
                                            }
                                        ?></td>
                                        <td>
                                            <?php
                                                if($item->status==0){
                                                    echo '<b style="color:rgb(216, 12, 238)">Đang chờ duyệt</b>';
                                                }elseif($item->status==1){
                                                    echo '<b style="color:rgb(12, 170, 238)">Đã duyệt đơn hàng</b>';
                                                }elseif($item->status==2){
                                                    echo '<b style="color:rgb(10, 236, 221)">Đang vận chuyển</b>';
                                                }elseif($item->status==3){
                                                    echo '<b style="color:rgb(236, 221, 10)">Giao hàng thành công</b>';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($item->status_huy==0){
                                                    echo '<b style="color: green;"> Đơn hàng chưa được hủy </b>';
                                                }elseif($item->status_huy==1){
                                                    echo '<b style="color: red;"> Khách hàng đã hủy </b>';
                                                }
                                            ?>

                                        </td>
                                        <td>
                                            @if($item->status==0)
                                                @if($item->status_huy!=1)
                                            <input type="hidden" value="{{$item->id}}" name="id_order">
                                            <select name="status" id="status" class="update_status">
                                                <option value="">---Chọn trạng thái---</option>
                                                
                                                <option value="0">Đặt hàng(chờ duyệt)</option>
                                                <option value="1">Duyệt đơn hàng</option>
                                            </select>
                                            @endif
                                            @endif
                                        </td>
                                        @foreach ($role as $k=>$v)
                                            @if($v->role_module=="role_edit_order")
                                            <td>
                                                @if($item->status==0)
                                                     @if($item->status_huy!=1)
                                                <a href="order/edit/{{$item->id}}">
                                                <button  class="btn btn-outline-secondary">
                                                <i class="fa fa-edit"></i>Sửa</button>
                                                </a>
                                                @endif
                                                @endif
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
                    {{$order->links()}}

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
