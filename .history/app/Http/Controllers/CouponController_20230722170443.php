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
       $coupon->coupon_name = $data['coupon_name'];
       $coupon->coupon_quanti = $data['coupon_quanti'];
       $coupon->coupon_code = $data['coupon_code'];
       $coupon->coupon_condition = $coupon['coupon_condition'];
       $coupon->coupon_number = $coupon['coupon_number'];
       
  
        return redirect('/admin/coupon/');
    }
    public function show(){
        return view('admin.coupon.index' );
    }
}