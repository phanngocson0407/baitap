@extends('admin.dashboard')
@section('admin')
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            @if($status == 3)
                                            <div class="stat-text"><span class="count">{{$count}}</span> VND</div>
                                            <div class="stat-heading">Doanh thu</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$OrderCount}}</span></div>
                                            <div class="stat-heading">Số Lượng Đơn hàng</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">349</span></div>
                                            <div class="stat-heading">Kho sản phẩm</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$userCount}}</span></div>
                                            <div class="stat-heading">Tài khoản </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <style>
                    .form-group {
                        display: inline-block;
                        margin-right: 10px;
                    }
                </style>
                <div class="container">
                    <h2 class="form-heading"><b>Thống kê doanh thu</b></h2>
                    <form action="/admin/trangchu" method="get">
                        
                        <div class="form-group">
                            <label for="from_date">Từ ngày:</label>
                            <input type="date" id="from_date" name="ngay1" value="{{ old('ngay2', $request->input('ngay1')) }}">
                        </div>
                        <div class="form-group">
                            <label for="to_date">Đến ngày:</label>
                            <input type="date" id="to_date" name="ngay2" value="{{ old('ngay2', $request->input('ngay2')) }}">
                        </div>
                        <div class="form-group">
                            <select name="thongke_loai" id="thongke_loai">
                                <option value="none">Lọc theo</option>
                                <option value="quy">Theo Quý</option>
                                <option value="nam">Theo Năm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-submit">Thống kê</button>
                        </div>
                        <div class="">
                            <table class="table table-striped table-bordered"> 
                                <thead>
                                    <tr>
                                        <th>Ngày</th>
                                        <th>Doanh thu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($thongke as $item)
                                    <tr>
                                        <td>{{ $item->date_payment}}</td>
                                        <td>{{number_format($item->total,0,'.','.') }} VNĐ</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                
                               
                            </table>

                        </div>
                       
                    </form>
                </div>
                

                  
              
               
                
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{url('backend')}}/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="{{url('backend')}}/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{url('backend')}}/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
    
@endsection
