<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;   
use App\Http\Controllers\ProductController;   
use App\Http\Controllers\ThuongHieuController;   
use App\Http\Controllers\CategoryController;  
use App\Http\Controllers\AdminController;  
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
    return view('checkout');
});
Route::get('/contact', function(){
    return view('contact');
});
Route::get('/detail', function(){
    return view('detail');
});
Route::get('/cart', function(){
    return view('cart');
});


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

    Route::get('/trangchu',function(){  return view('admin.trangchu');})->name('trangchu');

    Route::get('/login',[AdminController::class,'dangnhap']);

    Route::post('/login',[AdminController::class,'kiemtraDN']);
    
    Route::get('/logout', [AdminController::class, 'logout']);

});

 
