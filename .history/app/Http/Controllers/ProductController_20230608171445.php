<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Pagination\Paginator;

use DB;
class ProductController extends Controller
{


 
    public function detail($id )
    {
        $size = Size::join("product",'product.id','=','size.id_product')
        ->select(
            'size.*',
            'product.id'
        )
        ->get();
        $detail = Product::find($id);
            return view('detail', [ 'detail' => $detail ],['size'=>$size]);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        $kw = $r->kw?$r->kw:'';
        $kw="%".$kw."%";
        $data =Product::where('name_product','like',$kw)->paginate(6);
        $data->appends(['kw'=>$r->kw]);
        // $data=DB::table('product')->get();
        return view('/index',['data'=>$data]);
        //kh có tìm kiếm
        // return view('/index',['data'=>Product::paginate(6)]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category= Category::all();
        
        return view('admin.product.addProduct',compact('Category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request ->has('image')){
            $file =$request->image;
            $file_name=$file->getClientOriginalName();
            $file->move(base_path('/public/frontend/img'),$file_name);
        }
 
        $data1 =array();
        $data1['id']=$request->id ; 
        $data1['name_product']=$request->name_product;
        $data1['price']=$request->price;
        $data1['description']=$request->description;
        $data1['idloaigiay']=$request->	idloaigiay;    
        $data1['image']= $file_name;      
        DB::table('product')->insert($data1);
  
        return redirect('/admin/product/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        $kw = $r->kw?$r->kw:'';
        $kw="%".$kw."%";
        // $data=DB::table('product')->get();
        //return view('/index',['data'=>$data]);
        //kh có tìm kiếm
        //return view('/index',['data'=>Product::paginate(4)]);    
        $Product = Product::join("category_product",'category_product.idloaigiay','=','product.idloaigiay')
        ->select(
            'product.*',
            'category_product.name_category'
        )
        ->where('name_product','like',$kw)->paginate(4);
       
        $Product->appends(['kw'=>$r->kw]);
        
        return view('admin.product.index',['Product'=>$Product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category= Category::all();
        $product=Product::find($id);
        return view('admin.product.edit',['data'=>$product],compact('Category'));
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
        if($request ->has('image')){
            $file =$request->image;
            $file_name=$file->getClientOriginalName();
            $file->move(base_path('/public/frontend/img'),$file_name);
        }
        $dataProduct =array();
        $dataProduct['name_product']=$request->name_product;
        $dataProduct['idloaigiay']=$request->idloaigiay;
        $dataProduct['price']=$request->price;
        $dataProduct['description']=$request->description;
        $dataProduct['image']=$file_name;
        DB::table('product')->where('id',$request->id)->update($dataProduct);
        return Redirect('/admin/product/');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete();
        return redirect('/admin/product/');
    }
}