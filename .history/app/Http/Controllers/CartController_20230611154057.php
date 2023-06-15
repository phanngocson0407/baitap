<?php

namespace App\Http\Controllers;
use App\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function AddCart($id){
        $product =DB::table('product')->where('id',$id)->first();
        if($product!= null){
               
        }
        dd($product);
    }
}