<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        $data1 =array();
        $data1['idloaigiay']=$request->idloaigiay ; 
        $data1['name_category']=$request->name_category;
        $data1['id_thuonghieu']=$request->id_thuonghieu;    
           
        DB::table('category_product')->insert($data1);
  
        return redirect('/admin/category/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $Category = Category::join("thuonghieu",'thuonghieu.idthuonghieu','=','category_product.id_thuonghieu')
        ->select(
            'category_product.*',
            'thuonghieu.*'
        )
        ->get();
        
        return view('admin.category.index',['Category'=>$Category]);
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