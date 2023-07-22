<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;   
use App\Http\Controllers\ProductController;   
use App\Http\Controllers\ThuongHieuController;   
use App\Http\Controllers\CategoryController;  
use App\Http\Controllers\AdminController;  
use App\Http\Controllers\SizeController;  
use App\Http\Controllers\ColorController;  
use App\Http\Controllers\CartController;  
use App\Http\Controllers\RoleController;  
use App\Http\Controllers\RoleAdminController; 
use App\Http\Controllers\CommentController;  
use App\Http\Controllers\OrderController;  
use App\Http\Controllers\OrderDetailController;  
use App\Http\Controllers\MapController;  
use App\Http\Controllers\CheckoutController;  
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
// Route::get('/', [ProductController::class, 'product'])->name('index');
// Route::get('/', [ThuongHieuController::class, 'index'])->name('dashboard');
//---- URL user

Route::get('/', [ProductController::class, 'index']);
// Route::get('/', [ThuongHieuController::class, 'index']);
 //dang nhap dang ki
 Route::get('/login', function () {
    return view('login');
});
 Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);

Route::get('/insert-User', [UserController::class, 'insert_User']);

Route::post('/', [UserController::class, 'dangnhap']);

Route::get('/logoutuser', [UserController::class, 'logout']);
 


 Route::get('/shop', function(){
         return view('shop');
 });
 Route::get('/checkout', function(){
    //Session::put('Cart',null);
    return view('checkout');
});
Route::get('/contact', function(){
    return view('contact');
});
// Route::get('/donhang', function(){
//     return view('donhang');
// });
Route::get('/blog', function(){
    return view('blog');
});
Route::get('/detail', function(){
    return view('detail');
});
//Lịch sử đơn hàng
Route::get('/donhang/{id}', [OrderController::class, 'donhang']);
Route::get('/chitietdonhang/{id}', [OrderController::class, 'chitiet']);
Route::get('/huy-trangthai/{id}', [OrderController::class, 'huy_trangthai']);

//

Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('/shop/{id}', [CategoryController::class, 'shop'] );
Route::get('/Add-Cart/{id}', [ProductController::class, 'AddCart'] );
Route::get('/MuaNgay/{id}', [ProductController::class, 'MuaNgay'] );
Route::get('/Delete-Item-Cart/{id}', [ProductController::class, 'DeleteItemCart'] );
Route::get('/cart', function(){
    return view('cart');
});
//đánh giá sản phẩm
Route::post('/detail/{id}', [CommentController::class, 'store'] );
Route::post('/insert-rating', [CommentController::class, 'insert_rating'] );
//cong thanh toan
Route::post('/vnpayment', [CheckoutController::class, 'vnpayment'] );
Route::post('/momopayment', [CheckoutController::class, 'momo_payment'] );
 
 
Route::get('/xacnhanvnpay', function(){
    return view('xacnhanvnpay');
});
Route::get('/xacnhanmomo', function(){
    return view('xacnhanmomo');
});
//user

Route::get('/info_user/{id}', function(){
    return view('info_user');
});
Route::put('/info_user/{id}', [UserController::class, 'updateUser'] );
//cart
Route::get('/List-Cart', [CartController::class, 'ViewListCart'] );
Route::post('/List-Cart', [CartController::class, 'checkout'] );
Route::post('/checkoutVnpay', [CartController::class, 'checkoutVnpay'] );
Route::post('/checkoutmomo', [CartController::class, 'checkoutmomo'] );
 
Route::get('/Delete-List-Item-Cart/{id}', [CartController::class, 'DeleteListItemCart'] );
Route::get('/Save-List-Item-Cart/{id}/{quanty}', [CartController::class, 'SaveListItemCart'] );
Route::get('/thank', function(){
    return view('thank');
});
// Route::get('/', [CartController::class, 'AddCart'] );
//đăng nhập fb
Route::get('/login-facebook',[UserController::class,'login_facebook']);
Route::get('/admin/callback',[UserController::class,'callback_facebook']);
//đăng nhập google
Route::get('/login/login-google',[UserController::class,'login_google']);
Route::get('/login/google/callback',[UserController::class,'callback_google']);

//check_coupon
Route::post('/check_coupon')
//route for admin
route::prefix('admin')->group( function()
{

    route::prefix('product')->group( function(){
        route::get('/', [ProductController::class, 'show']);
        route::get('/create',  [ProductController::class, 'create']);
        route::post('/create',  [ProductController::class, 'store']);
        Route::get('/edit/{id}',[ProductController::class,'edit']);
        Route::put('/edit/{id}',[ProductController::class,'update']);
        Route::delete('/delete/{id}',[ProductController::class,'destroy']);
        route::get('/show_size/{id}', [ProductController::class, 'show_size']);
        route::get('/show_color/{id}', [ProductController::class, 'show_color']);
    });
    route::prefix('thuonghieu')->group( function(){
        route::get('/', [ThuongHieuController::class, 'show']);
        route::get('/create',  [ThuongHieuController::class, 'create']);
        route::post('/create',  [ThuongHieuController::class, 'store']);
        Route::get('/edit/{idthuonghieu}',[ThuongHieuController::class,'edit']);
        Route::put('/edit/{idthuonghieu}',[ThuongHieuController::class,'update']);
        Route::delete('/delete/{idthuonghieu}',[ThuongHieuController::class,'destroy']);
    });

    route::prefix('category')->group( function(){
        route::get('/', [CategoryController::class, 'show']);
        route::get('/create',  [CategoryController::class, 'create']);
        route::post('/create',  [CategoryController::class, 'store']);
        Route::get('/edit/{idloaigiay}',[CategoryController::class,'edit']);
        Route::put('/edit/{idloaigiay}',[CategoryController::class,'update']);
        Route::delete('/delete/{idloaigiay}',[CategoryController::class,'destroy']);
    });
    route::prefix('size')->group( function(){
        route::get('/', [SizeController::class, 'show']);
        route::get('/create',  [SizeController::class, 'create']);
        route::post('/create',  [SizeController::class, 'store']);
        Route::get('/edit/{id_size}',[SizeController::class,'edit']);
        Route::put('/edit/{id_size}',[SizeController::class,'update']);
        Route::delete('/delete/{id_size}',[SizeController::class,'destroy']);
    });
    route::prefix('color')->group( function(){
        route::get('/', [ColorController::class, 'show']);
        route::get('/create',  [ColorController::class, 'create']);
        route::post('/create',  [ColorController::class, 'store']);
        Route::get('/edit/{id_color}',[ColorController::class,'edit']);
        Route::put('/edit/{id_color}',[ColorController::class,'update']);
        Route::delete('/delete/{id_color}',[ColorController::class,'destroy']);
    });

    route::prefix('accout')->group( function(){
        route::get('/', [AdminController::class, 'show']);
        route::get('/create',  [AdminController::class, 'create']);
        route::post('/create',  [AdminController::class, 'store']);
        Route::get('/edit/{id}',[AdminController::class,'edit']);
        Route::put('/edit/{id}',[AdminController::class,'update']);
        Route::delete('/delete/{id}',[AdminController::class,'destroy']);
        Route::get('/show-role/{id}',[AdminController::class,'show_role']);
        route::get('/create-role/{id}',  [AdminController::class,'create_role']);
        route::post('/create-role',  [AdminController::class,'store_role']);
    });
    route::prefix('khachhang')->group( function(){
        route::get('/', [UserController::class, 'show']);
        route::get('/create',  [UserController::class, 'create']);
        route::post('/create',  [UserController::class, 'store']);
        Route::get('/edit/{id}',[UserController::class,'edit']);
        Route::put('/edit/{id}',[UserController::class,'update']);
    });

    route::prefix('role')->group( function(){
        route::get('/', [RoleController::class, 'show']);
        route::get('/create',  [RoleController::class, 'create']);
        route::post('/create',  [RoleController::class, 'store']);
        Route::get('/edit/{id}',[RoleController::class,'edit']);
        Route::put('/edit/{id}',[RoleController::class,'update']);
        Route::delete('/delete/{id}',[RoleController::class,'destroy']);
    });

    route::prefix('role_admin')->group( function(){
        route::get('/', [RoleAdminController::class, 'show']);
        route::get('/create',  [RoleAdminController::class, 'create']);
        route::post('/create',  [RoleAdminController::class, 'store']);
        Route::get('/edit/{id}',[RoleAdminController::class,'edit']);
        Route::put('/edit/{id}',[RoleAdminController::class,'update']);
        Route::delete('/delete/{id}',[RoleAdminController::class,'destroy']);
    });


    route::prefix('order')->group( function(){
        route::get('/', [OrderController::class, 'show']);
        route::get('/create',  [OrderController::class, 'create']);
        route::post('/create',  [OrderController::class, 'store']);
        Route::get('/edit/{id}',[OrderController::class,'edit']);
        Route::put('/edit/{id}',[OrderController::class,'update']);
        Route::delete('/delete/{id}',[OrderController::class,'destroy']);
        route::get('/order-detail/{id}', [OrderController::class, 'show_detail']);
        route::post('/update-status', [OrderController::class, 'update_status']);
        //Route::get('/order-detail/{id}',[OrderController::class,'show_detail_id']);
      
    });
    route::prefix('comment')->group( function(){
        Route::get('/', [CommentController::class, 'show']);
        Route::get('/unactive/{id}', [CommentController::class, 'unactive']);
        Route::get('/active/{id}', [CommentController::class, 'active']);
        Route::delete('/delete/{id}',[CommentController::class,'destroy']);
    });

  

    Route::get('/trangchu',[AdminController::class,'index']);

    Route::get('/login',[AdminController::class,'dangnhap']);
    Route::post('/push-login',[AdminController::class,'kiemtraDN']);
    

    Route::get('/edit-acc-admin/{id}', [AdminController::class, 'page_acc_admin']);
    Route::put('/edit-acc-admin/{id}', [AdminController::class, 'edit_acc_admin']);
    Route::get('/logout', [AdminController::class, 'logout']);

});
Route::get('/map', [MapController::class,'showMap'])->name('map');
 

Route::get('/hihi', function(){
    return view('mails.checkout');
});