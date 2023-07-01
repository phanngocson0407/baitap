<?php

namespace App\Http\Controllers;
use App\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Rating;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;

 
use Illuminate\Support\Facades\DB as FacadesDB;

class ProductController extends Controller
{


    public function detail($id)
    {
        $product = DB::table('product')
        ->leftjoin('size','size.id_product','=','product.id')
        ->select(
                    'size.*',
                    'product.*'
                )
        ->leftjoin('color','color.id_product','=','product.id')
        // ->select('color.*',
        // 'product.*')

        ->where('size.id_product', $id)
        ->where('color.id_product',$id)
        ->get();
        // dd($product);
        $size = Size::join("product", 'product.id', '=', 'size.id_product')
            ->select(
                'size.*',
                'product.id'
            )
            ->where('size.id_product', $id)
            ->get();
        $color = Color::join('product','product.id','=','color.id_product')
        ->select('color.*',
        'product.id')
        ->where('color.id_product',$id)
        ->get();
        $comment = Comment::join('product','product.id','=','comment.product_id')
        ->select('comment.*',
        'product.id')
        ->where('comment.product_id',$id)
        ->get();

        $rating = Rating::join('product','product.id','=','rating.id_product')
        ->select('rating.*',
        'product.id')
        ->where('rating.id_product',$id)
        ->get()->avg('rating');
        $rating = round($rating);
        $count = DB::table('rating')->where('rating.id_product',$id)->count();
   
        $detail = Product::find($id);
        
        return view('detail', ['detail' => $detail ,'size' => $size ,'color' => $color ,'product'=>$product,'comment' =>$comment, 'rating'=>$rating,'count'=>$count]);
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
        $price =is_numeric($r->price)?$r->price:-1;
        if($price>0)
            $data = Product::where([ 
                ['name_product','like',$kw], ['price','=',$r->price]
                ])
                ->paginate(8);
        else{
            $data =Product::where('name_product','like',$kw)->paginate(8);
            $param =['kw'=>$r->kw,'price'=>$price];
        }
      
       //filter
        if(isset($_GET['sort_by'])){
            $sort_by =$_GET['sort_by'];
            if($sort_by=='giam_dan'){
                $data = Product::orderBy('price','DESC')->paginate(8)->appends(request()->query());
            } elseif($sort_by=='tang_dan'){
                $data = Product::orderBy('price','ASC')->paginate(8)->appends(request()->query());
            }   
            elseif($sort_by=='kytu_za'){
                $data = Product::orderBy('name_product','DESC')->paginate(8)->appends(request()->query());
            }  
            elseif($sort_by=='kytu_az'){
                $data = Product::orderBy('name_product','ASC')->paginate(8)->appends(request()->query());
            }  
        }else{
            $data = Product::orderBy('id','DESC')->paginate(8);
        }

        $data->appends(['param']);
        session()->flash('kw',$r->kw);  
        session()->flash('price',$r->price);
        return view('/index',['data'=>$data]);
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


    
    public function AddCart(Request $request, $id){
        // $request ->Session()->put('Cart',null);
        $id_color=$request->id_color??"";
        $id_size=$request->id_size??"";
        $product = DB::table('product')
        ->join('size','size.id_product','=','product.id')
        ->join('color','color.id_product','=','product.id')
        ->where('size.id_size',$id_size)
        ->where('color.id_color',$id_color)
        ->where('product.id',$id)
        ->first();
        if($product!= null){

                    $oldCart = Session('Cart')?Session('Cart'):null;
                    $newCart =  new Cart($oldCart);
                    $newCart->AddCart($product,$id.$id_size.$id_color);
                    $request ->Session()->put('Cart',$newCart);
            //    dd($newCart);
        }
        return view('cart1' );
    }
    public function DeleteItemCart(Request $request,$id){
        
        $id_color_size=$request->id_color_size??"";
                    $oldCart = Session('Cart')?Session('Cart'):null;
                    $newCart =  new Cart($oldCart);
                    $newCart->DeleteItemCart($id.$id_color_size);
                     if(Count($newCart->products)>0){
                        $request ->Session()->put('Cart',$newCart);
                     }else{
                        $request ->Session()->forget('Cart');
                     }
               // dd($newCart);
        return view('cart1' );
    }
}