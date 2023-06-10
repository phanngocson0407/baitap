<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    public function create()
    {
        $Product= Product::all();
        
        return view('admin.category.addSize',compact('Product'));
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
        $data['id_size ']=$request->id_size ; 
        $data['number_size']=$request->number_size;
        $data['id_product ']=$request->id_product;    
           
        DB::table('category_product')->insert($data);
  
        return redirect('/admin/size/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $Size = Size::join("product",'product.id','=','size.id_product ')
        ->select(
            'product.*',
            'size.*'
        )
        ->get();
        
        return view('admin.size.index',['size'=>$Size]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $ThuongHieu= ThuongHieu::all();
        $Category=Category::find($id);
        return view('admin.category.edit',['data'=>$Category],compact('ThuongHieu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_Category_Product =array();
        $data_Category_Product['name_category']=$request->name_category;
        $data_Category_Product['id_thuonghieu']=$request->id_thuonghieu;
        DB::table('category_product')->where('idloaigiay',$request->idloaigiay)->update($data_Category_Product);
        return Redirect('/admin/category/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::find($id);
        $Category->delete();
        return redirect('/admin/category/');
    }
}