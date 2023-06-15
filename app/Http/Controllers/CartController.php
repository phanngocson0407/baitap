<?php

namespace App\Http\Controllers;
use App\Cart\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Detail;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class CartController extends Controller
{
    public function AddCart(Request $request,$id){
        $product =DB::table('product')->where('id',$id)->first();
        if($product!= null){
              
                    $oldCart = Session('Cart')?Session('Cart'):null;
                    $newCart =  new Cart($oldCart);
                    $newCart->AddCart($product,$id);
                    $request ->Session()->put('Cart',$newCart);
            //    dd($newCart);
        }
        return view('cart1' );
    }
    public function DeleteItemCart(Request $request,$id){
        // $product =DB::table('product')->where('id',$id)->first();
        
              
                    $oldCart = Session('Cart')?Session('Cart'):null;
                    $newCart =  new Cart($oldCart);
                    $newCart->DeleteItemCart( $id);

                     if(Count($newCart->products)>0){
                        $request ->Session()->put('Cart',$newCart);
                     }else{
                        $request ->Session()->forget('Cart');
                     }
            //    dd($newCart);
        
        return view('cart1' );
    }
    public function ViewListCart(){
        return view('cart');
    }
    public function checkout(Request $r)
    {
        $data = $r->all();
        // $data['order_id']= (String)Str::uuid();
        $data['id']= time();
        if (Order::create($data))
        {
            
            foreach (Session::get('Cart')->products as $item) {
                // dd(Session::get('Cart')->products);
                $data['id_product']= $item['productInfo']->id;
                
                //'quantity' => $data['quantity'][$index],
                $data['price']= $item['productInfo']->price;
                Order_Detail::create($data);
            }
           
        //     Mail::to($data['email'])->send(new CheckoutMail(['nguoigui'=>'Giam doc Ng VAn A'] ));
        //     Cart::clear();
        //     session()->flash('message', 'Cam on ban da dat hang. Checkmail de biet chi tiet');
            return redirect('/thank');
        }
    }
    public function DeleteListItemCart(Request $request,$id){
        // $product =DB::table('product')->where('id',$id)->first();
        
              
                    $oldCart = Session('Cart')?Session('Cart'):null;
                    $newCart =  new Cart($oldCart);
                    $newCart->DeleteItemCart( $id);

                     if(Count($newCart->products)>0){
                        $request ->Session()->put('Cart',$newCart);
                     }else{
                        $request ->Session()->forget('Cart');
                     }
            //    dd($newCart);
        
        return view('list-cart' );
    }
    public function SaveListItemCart(Request $request,$id,$quanty){
        // $product =DB::table('product')->where('id',$id)->first();
        
               $oldCart = Session('Cart')?Session('Cart'):null;
                    $newCart =  new Cart($oldCart);
                    $newCart->UpdateItemCart( $id,$quanty);

                  
                    $request ->Session()->put('Cart',$newCart);
                
                    return view('list-cart' );
    }
}