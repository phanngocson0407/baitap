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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $arraySize = Size::all();
        $Size = Size::join('product','product.id','=','size.id_product')
        ->select(
            'product.*',
            'size.*',
            )
            ->get();
            
          
        return view('admin.size.index',['Size'=>$Size],compact($arraySize));
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
        $Size=Size::find($id);
        return view('admin.size.edit',['data'=>$Size],compact('Product'));
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
        $data_size =array();
        $data_size['number_size']=$request->number_size;
        $data_size['id_product']=$request->id_product;
        DB::table('size')->where('id_size',$request->id_size)->update($data_size);
        return Redirect('/admin/size/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Size = Size::find($id);
        $Size->delete();
        return redirect('/admin/size/');
    }
}