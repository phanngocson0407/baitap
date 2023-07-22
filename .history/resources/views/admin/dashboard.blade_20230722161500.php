<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{url('backend')}}/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{url('backend')}}/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
</head>
<?php
   
    $role=Session::get('role');
?>
<body>
    <!-- Left Panel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{URL('/admin/trangchu')}}"><i class="menu-icon fa fa-laptop"></i>Danh mục </a>
                    </li>
                    <li class="menu-title">Quản trị viên</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" > <i class="menu-icon fa fa-users"></i>Quản lí</a>
                        <ul class="sub-menu children dropdown-menu">
                            @foreach ($role as $k=>$v)
                               
                                @if($v->role_module=="role_product")
                                    <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/product')}}">Quản lí Sản phẩm</a></li>
                                @endif

                                @if($v->role_module=="role_thuonghieu")
                                    <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/thuonghieu')}}">Quản lí Thương Hiệu</a></li>     
                                @endif

                                @if($v->role_module=="role_category")
                                    <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/category')}}">Quản lí Loại sản phẩm</a></li>
                                @endif

                                @if($v->role_module=="role_donhang")
                                <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/order')}}">Quản lí Đơn hàng</a></li>
                                @endif

                                @if($v->role_module=="role_size")
                                <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/size')}}">Quản lí Size</a></li>
                                @endif
                                @if($v->role_module=="role_color")
                                <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/color')}}">Quản lí Màu</a></li>
                                @endif
                                @if($v->role_module=="role_user")
                                <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/khachhang')}}">Quản lí Khách hàng</a></li>
                                @endif
                                @if($v->role_module=="role_user")
                                <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/khachhang')}}">Quản lí Khách hàng</a></li>
                                @endif
                            @endforeach
                            <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/comment')}}">Quản lí Đánh giá</a></li>
                            
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" > <i class="menu-icon fa fa-users"></i>Quyền</a>
                        <ul class="sub-menu children dropdown-menu">
                            @foreach ($role as $k=>$v)
                               
                               

                                @if($v->role_module=="role_accout")
                                <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/accout')}}">Quản lí Tài khoản Admin</a></li>
                                @endif

                                

                                @if($v->role_module=="role_role")
                                <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/role')}}">Quản lí Quyền</a></li>
                                @endif

                                {{-- @if($v->role_module=="role_role-admin")
                                <li><i class="menu-icon fa fa-paperclip"></i><a href="{{URL('/admin/role_admin')}}">Quản lí Quyền Admin</a></li>
                                @endif --}}
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
 
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{url('backend')}}/img/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="{{url('backend')}}/img/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            
                            
                        </div>

                        
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{url('backend')}}/img//admin.jpg" alt="User Avatar">
                        </a>
                        <?php
                        $data=Session::get('data');
                        ?>
                        
                        <div class="user-menu dropdown-menu">
                           
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>{{$data->fullname??""}}</a>
                            <a class="nav-link" href="/admin/edit-acc-admin/{{$data->id}}"><i class="fa fa- user"></i>Cài đặt</a>
                            <a class="nav-link" href="{{URL::to('/admin/logout') }}"><i class="fa fa-power -off"></i>Đăng xuất</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        @yield('admin')
    </body>
    </html>