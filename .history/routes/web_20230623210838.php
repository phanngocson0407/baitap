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
Route::get('/blog', function(){
    return view('blog');
});
Route::get('/detail', function(){
    return view('detail');
});


Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('/shop/{id}', [CategoryController::class, 'shop'] );

Route::get('/cart', function(){
    return view('cart');
});

 
Route::get('/List-Cart', [CartController::class, 'ViewListCart'] );
Route::post('/List-Cart', [CartController::class, 'checkout'] );
Route::get('/Delete-List-Item-Cart/{id}', [CartController::class, 'DeleteListItemCart'] );
Route::get('/Save-List-Item-Cart/{id}/{quanty}', [CartController::class, 'SaveListItemCart'] );
Route::get('/thank', function(){
    return view('thank');
});
// Route::get('/', [CartController::class, 'AddCart'] );
 

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
        Route::get('/edit/{idloaigiay}',[AdminController::class,'edit']);
        Route::put('/edit/{idloaigiay}',[AdminController::class,'update']);
        Route::delete('/delete/{idloaigiay}',[AdminController::class,'destroy']);
    });
    route::prefix('khachhang')->group( function(){
        route::get('/', [UserController::class, 'show']);
        route::get('/create',  [UserController::class, 'create']);
        route::post('/create',  [UserController::class, 'store']);
        Route::get('/edit/{id}',[UserController::class,'edit']);
        Route::put('/edit/{id}',[UserController::class,'update']);
    });

    route::prefix('order')->group( function(){
        route::get('/', function(){  return view('admin.order.index');});
      
    });

    route::prefix('blog')->group( function(){
        route::get('/', function(){  return view('admin.blog.index');});
       
    });

    Route::get('/trangchu',function(){  return view('admin.trangchu');})->name('trangchu');

    Route::get('/login',[AdminController::class,'dangnhap']);
    Route::post('/push-login',[AdminController::class,'kiemtraDN']);
    


    Route::get('/logout', [AdminController::class, 'logout']);

});

 