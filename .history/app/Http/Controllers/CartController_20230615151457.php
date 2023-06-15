<?php

namespace App\Http\Controllers;
use App\Cart\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
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
}