<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function create()
    {
       
        
        return view('admin.coupon.createCoupon' );
    }
   

 
    public function store(Request $request)
    {
       $data =$request->all();
       $coupon =
  
        return redirect('/admin/coupon/');
    }
    public function show(){
        return view('admin.coupon.index' );
    }
}