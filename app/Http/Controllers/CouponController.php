<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CouponController extends Controller
{
    public function create()
    {
       
        
        return view('admin.coupon.createCoupon' );
    }
   

 
    public function store(Request $request)
    {
        $v = $request->validate([
            
            'coupon_name'=>'required',
            'coupon_quanti'=>'required|numeric|min:10',
            'coupon_number'=>'required',
            'coupon_code'=>'required|unique:coupon',
            
        ],
        [
            
            'coupon_name.required'=>'Không được bỏ trống',

            'coupon_quanti.numeric'=>'Là số',
            'coupon_quanti.min'=>'it nhất 5 ký tự',
            'coupon_quanti.required'=>'Không được bỏ trống',

            'coupon_number.required'=>'Không được bỏ trống',

            'coupon_code.unique'=>'Dã có mã giảm giá này rồi!',
            'coupon_code.required'=>'Không được bỏ trống',
        ]
    );
       $data =$request->all();
       $coupon = new Coupon();
       $coupon->coupon_name = $data['coupon_name'];
       $coupon->coupon_quanti = $data['coupon_quanti'];
       $coupon->coupon_code = $data['coupon_code'];
       $coupon->coupon_condition = $data['coupon_condition'];
       $coupon->coupon_number = $data['coupon_number'];
       $coupon->save();
       session()->flash('mess', 'thêm Thành công!');
        return redirect('/admin/coupon/');
    }
    public function show(){
        $coupon = Coupon::orderby('id_coupon','DESC')->paginate(5) ;
        
        return view('admin.coupon.index' )->with(compact('coupon'));
    }
    public function destroy($id)  {
        $coupon=Coupon::find($id);
        $coupon->delete();
        session()->flash('mess', 'Xóa Thành công!');
        return redirect('/admin/coupon');
    }
}