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
use App\Models\ReplyComment;
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
        'product.id',)
        ->where('comment.product_id',$id)
        ->get();
        $reply_comment = ReplyComment::join('comment','comment.id','=','reply_comment.id_comment')
        
        ->select('reply_comment.*')
        ->first();
        // dd($reply_comment);

        // $reply_comment = Comment::join('product','product.id','=','comment.product_id')
        // ->join('reply_comment','reply_comment.id_comment','=','comment.id')
        // ->select('comment.*',
        // 'product.id',
        // 'reply_comment.*')
        // ->where('comment.product_id',$id)
        // ->get();

        $rating = Rating::join('product','product.id','=','rating.id_product')
        ->select('rating.*',
        'product.id')
        ->where('rating.id_product',$id)
        ->get()->avg('rating');
        $rating = round($rating);
        $count = DB::table('rating')->where('rating.id_product',$id)->count();
   
        $detail = Product::find($id);
        
        
        return view('detail', [ 'reply_comment' =>$reply_comment,'detail' => $detail ,'size' => $size ,'color' => $color ,'product'=>$product,'comment' =>$comment, 'rating'=>$rating,'count'=>$count]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        //dd($r->all());
        $sort = $r->sort;
        $kw = $r->kw?$r->kw:'';
        $kw="%".$kw."%";
        $price =is_numeric($r->price)?$r->price:-1;
        $price2 =is_numeric($r->price2)?$r->price2:-1;
        if ($price<0) $price=0;
        if ($price2<0) $price2=99999999;
        $product=Product::select("*")->where('name_product', 'like', "%$kw%")
        ->where('price', ">=", $price)
        ->where('price', "<=", $price2);
        
        if ($sort=='kytu_az')
        $product
        ->orderBy('name_product','ASC');
        
        if ($sort=='kytu_za')
        $product->orderBy('name_product','DESC');
        
        if ($sort=='tang_dan')
        $product->orderBy('price','ASC');
       
        if ($sort=='giam_dan')
        $product->orderBy('price','DESC');
        
      
    //    $product->get();
      
        
        $data=$product->paginate(8);
        
        $data->appends(['kw'=>$r->kw , 'price' => $r ->price, 'price2' =>$r->price2, 'sort'=>$r->sort]);
        session()->flash('kw',$r->kw);  
        session()->flash('price',$r->price);
        return view('/index',['data'=>$data ,'sort' => $sort]);
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
        $v = $request->validate([
            'name_product'=>'required',
            'price'=>'numeric',
            'idloaigiay'=>'required',
            'image'=>'required',
            'description'=>'min:100|required',
        ],
        [
            'price.numeric'=>'Điền đúng giá',
            'idloaigiay.required'=>'Phải chọn loại giày ',
            'name_product.required'=>'Không được bỏ trống',
            'image.required'=>'Không bỏ trống hình ảnh',
            'description.min'=>'Mô tả phải trên 100 ký tự',
            'description.required'=>'Không được bỏ trống',
        ]
    );
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
        session()->flash('messthem','Thêm sản phẩm thành công');
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
        //$product=Product::find($id);
        $product = Product::where('id',$id)->join('category_product', 'product.idloaigiay', '=', 'category_product.idloaigiay')
        ->select(
            'product.*', 
            'category_product.idloaigiay',
            'category_product.name_category')
        ->first();

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
        session()->flash('messsua','Sửa sản phẩm thành công');
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
        $s =Size::where('id_product','=', $id)
        ->first();
        $c =Color::where('id_product','=', $id)
        ->first();
        $m =Comment::where('product_id','=', $id)
        ->first();
        $r =Rating::where('id_product','=', $id)
        ->first();
        if ( $s==null && $c==null && $m==null && $r ==null)
        {
            $Product = Product::find($id);
            $Product->delete();
            session()->flash('mess', 'Xóa Thành công!');
        }
        else 
        {
            session()->flash('mess', 'Không thể xóa( vì sản phẩm này còn rất nhiều thuộc tính khác )! ');
        }
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

    public function show_size($id){
        $show_size = Product::join("size", 'product.id', '=', 'size.id_product')
        ->select(
            'size.number_size',
            'product.*',
        )
        ->where('size.id_product', $id)
        ->get();
        return view('admin.size.show_size',['show_size'=>$show_size]);
    }

    
    public function show_color($id){
        $show_color = Product::join("color", 'product.id', '=', 'color.id_product')
        ->select(
            'color.name_color',
            'product.*',
        )
        ->where('color.id_product', $id)
        ->get();
        return view('admin.color.show_color',['show_color'=>$show_color]);
    }
}