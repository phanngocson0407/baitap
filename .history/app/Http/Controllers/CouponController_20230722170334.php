<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
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
       $coupon = new Coupon();
       $coupon->coupon_name = $coupon['coupon_name'];
       $coupon->coupon_name = $coupon['coupon_name'];
       $coupon->coupon_name = $coupon['coupon_name'];
       $coupon->coupon_name = $coupon['coupon_name'];
       $coupon->coupon_name = $coupon['coupon_name'];
       $coupon->coupon_name = $coupon['coupon_name'];
  
        return redirect('/admin/coupon/');
    }
    public function show(){
        return view('admin.coupon.index' );
    }
}