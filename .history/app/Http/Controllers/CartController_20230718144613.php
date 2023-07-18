<?php

namespace App\Http\Controllers;
use App\Cart\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Detail;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
use Mail;
use App\Mail\CheckoutMail;
session_start();
class CartController extends Controller
{
    // public function AddCart(Request $request,$id){
    //     $product =DB::table('product')->where('id',$id)->first();
    //     if($product!= null){
              
    //                 $oldCart = Session('Cart')?Session('Cart'):null;
    //                 $newCart =  new Cart($oldCart);
    //                 $newCart->AddCart($product,$id);
    //                 $request ->Session()->put('Cart',$newCart);
    //            dd($newCart);
    //     }
    //     return view('cart1' );
    // }
    // public function DeleteItemCart(Request $request,$id){
    //     // $product =DB::table('product')->where('id',$id)->first();
        
              
    //                 $oldCart = Session('Cart')?Session('Cart'):null;
    //                 $newCart =  new Cart($oldCart);
    //                 $newCart->DeleteItemCart( $id);

    //                  if(Count($newCart->products)>0){
    //                     $request ->Session()->put('Cart',$newCart);
    //                  }else{
    //                     $request ->Session()->forget('Cart');
    //                  }
    //         //    dd($newCart);
        
    //     return view('cart1' );
    // }
    public function ViewListCart(){
        return view('cart');
    }
 
    public function checkout(Request $r)
    {
        $data = $r->all();
        // $data['order_id']= (String)Str::uuid();
        $order=Order::create($data);
        if ($order)
        {
            
            foreach (Session::get('Cart')->products as $item) {
               // dd(Session::get('Cart'));
                $data['id_order']=$order->id;
                $data['id_product']= $item['productInfo']->id;
                //dd( $data['id_product']);
                $data['name_product']=$item['productInfo']->name_product;
                $data['quantity']=$item['quanty'];
                $data['size']=$item['productInfo']->number_size;
                $data['color']=$item['productInfo']->name_color;
                $data['price']= $item['productInfo']->price;
                Order_Detail::create($data);
            }
           
        Mail::to($data['consingnee_email'])->send(new CheckoutMail(['nguoigui'=>'Shop giay new'] ));
            Session::put('Cart',null);
        session()->flash('message', 'Cam on ban da dat hang. Checkmail de biet chi tiet');
            return redirect('/thank');
        }
    }
    public function DeleteListItemCart(Request $request,$id){
        // $product =DB::table('product')->where('id',$id)->first();
        $id_color_size=$request->id_color_size??"";
              
                    $oldCart = Session('Cart')?Session('Cart'):null;
                    $newCart =  new Cart($oldCart);
                    $newCart->DeleteItemCart( $id.$id_color_size);

                     if(Count($newCart->products)>0){
                        $request ->Session()->put('Cart',$newCart);
                     }else{
                        $request ->Session()->forget('Cart');
                     }
            //    dd($newCart);
        
        return view('list-cart' );
    }
    // public function SaveListItemCart(Request $request,$id,$quanty){
    //     // $product =DB::table('product')->where('id',$id)->first();
    //     $id_color_size=$request->id_color_size??"";
    //            $oldCart = Session('Cart')?Session('Cart'):null;
    //                 $newCart =  new Cart($oldCart);
    //                 $newCart->UpdateItemCart($id.$id_color_size  ,$quanty );

                  
    //                 $request ->Session()->put('Cart',$newCart);
                
    //                 return view('list-cart' );
    // }
    public function SaveListItemCart(Request $request, $id, $quanty)
    {
        $id_color_size = $request->id_color_size ?? '';
    
        $oldCart = $request->session()->get('Cart');
        $newCart = new Cart($oldCart);
        $newCart->updateItemCart($id.$id_color_size, $quanty);

        $request->session()->put('Cart', $newCart);

        return view('list-cart');
    }
    public function thankVNpay(){
        if(isset($_GET['vnp_Amount'])){
            $data_VNPAY =[
                'vnp_Amount' =>$_GET['vnp_Amount'],
                'vnp_BankCode' =>$_GET['vnp_BankCode'],
                'vnp_BankTranNo' =>$_GET['vnp_BankTranNo'],
                'vnp_CardType' =>$_GET['vnp_CardType'],
                'vnp_PayDate' =>$_GET['vnp_PayDate'],
                'vnp_ResponseCode' =>$_GET['vnp_ResponseCode'],
                'vnp_TmnCode' =>$_GET['vnp_TmnCode'],
                'vnp_TxnRef' =>$_GET['vnp_TxnRef'],
                'vnp_TransactionNo' =>$_GET['vnp_TransactionNo'],
                'vnp_TransactionStatus' =>$_GET['vnp_TransactionStatus'],
            ];
            $res
        }
    }
}