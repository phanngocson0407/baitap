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
       $coupon->coupon_condition = $data['coupon_condition'];
       $coupon->coupon_number = $data['coupon_number'];
       $coupon->save();
  
        return redirect('/admin/coupon/');
    }
    public function show(){
        $coupon = Coupon::orderby('id_coupon','DESC')->paginate(1) ;
        
        return view('admin.coupon.index' )->with(compact('coupon'));
    }
}