<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function show(){
        return view('admin.size.index',['Size'=>$Size] );
    }
}