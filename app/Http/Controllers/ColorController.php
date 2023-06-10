<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function create()
    {
        $Product= Product::all();
        
        return view('admin.color.addColor',compact('Product'));
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
        $data['id_color']=$request->id_color; 
        $data['name_color']=$request->name_color;
        $data['id_product']=$request->id_product;    
           
        DB::table('color')->insert($data);
  
        return redirect('/admin/color/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $Color = Color::join('product','product.id','=','color.id_product')
        ->select(
            'product.*',
            'color.*',
        )
        ->get();
        
        return view('admin.color.index',['Color'=>$Color]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $Product= Product::all();
        $Color=Color::find($id);
        return view('admin.color.edit',['data'=>$Color],compact('Product'));
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
        $data_color =array();
        $data_color['name_color']=$request->name_color;
        $data_color['id_product']=$request->id_product;
        DB::table('color')->where('id_color',$request->id_color)->update($data_color);
        return Redirect('/admin/color/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Color = Color::find($id);
        $Color->delete();
        return redirect('/admin/color/');
    }
}