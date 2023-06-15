<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function AddCart($id){
        $product =DB::table('product')->where('id',$id)->first();
        dd($product);
    }
}