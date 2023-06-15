<?php

namespace App\Http\Controllers;
use App\Cart\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('cart1',compact('newCart'));
    }
    public function DeleteItemCart(Request $request,$id){
        // $product =DB::table('product')->where('id',$id)->first();
        
              
                    $oldCart = Session('Cart')?Session('Cart'):null;
                    $newCart =  new Cart($oldCart);
                    $newCart->DeleteItemCart( $id);
              
                    $request ->Session()->put('Cart',$newCart);
            //    dd($newCart);
        
        return view('cart1',compact('newCart'));
    }
}