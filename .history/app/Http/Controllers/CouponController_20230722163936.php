<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function create()
    {
        $Product= Product::all();
        
        return view('admin.size.addSize',compact('Product'));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =array();
        $data['id_size']=$request->id_size; 
        $data['number_size']=$request->number_size;
        $data['id_product']=$request->id_product;    
           
        DB::table('size')->insert($data);
  
        return redirect('/admin/size/');
    }
    public function show(){
        return view('admin.coupon.index' );
    }
}