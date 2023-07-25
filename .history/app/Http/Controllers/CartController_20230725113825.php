<?php

namespace App\Http\Controllers;
use App\Cart\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\indexmodel;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
use Mail;
use App\Mail\CheckoutMail;
use App\Models\Coupon;

session_start();
class CartController extends Controller
{

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
                Session::forget('coupon');        
        }
         
        Mail::to($data['consingnee_email'])->send(new CheckoutMail(['nguoigui'=>'Shop giay new'] ));
            Session::put('Cart',null);
            // Session::forget('coupon');
        session()->flash('message', 'Cam on ban da dat hang. Checkmail de biet chi tiet');
            return redirect('/thank');
        }
    }
    public function checkoutVnpay(Request $r)
    {
        $data1 = $r->all();
         
    // dd($data1);
        // $data['order_id']= (String)Str::uuid();
        
        $order=Order::create($data1);
        if ($order)
        {
            
            foreach (Session::get('Cart')->products as $item) {
               // dd(Session::get('Cart'));
                $data1['id_order']=$order->id;
                $data1['id_product']= $item['productInfo']->id;
                //dd( $data1['id_product']);
                $data1['name_product']=$item['productInfo']->name_product;
                $data1['quantity']=$item['quanty'];
                $data1['size']=$item['productInfo']->number_size;
                $data1['color']=$item['productInfo']->name_color;
                $data1['price']= $item['productInfo']->price;
                Order_Detail::create($data1);
                Session::forget('coupon');     
            }
           
        Mail::to($data1['consingnee_email'])->send(new CheckoutMail(['nguoigui'=>'Shop giay new'] ));
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

    public function SaveListItemCart(Request $request, $id, $quanty)
    {
        $id_color_size = $request->id_color_size ?? '';
    
        $oldCart = $request->session()->get('Cart');
        $newCart = new Cart($oldCart);
        $newCart->updateItemCart($id.$id_color_size, $quanty);

        $request->session()->put('Cart', $newCart);

        return view('list-cart');
    }
 
    public function check_coupon(Request $request){
        $data = $request->all();
        // dd($data);
 
        $check_coupon = Order::where('coupon_code',$data['coupon'])
        ->where('id_user',$data['id_user'])
        ->first();
        dd($check_coupon);
    
        foreach($check)
        if($check_coupon==null){
            $coupon = Coupon::where('coupon_code',$data['coupon'])->first();   
            //  dd($coupon);     
             if($coupon){
                $count_coupon = $coupon->count();
          
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon');
                       
                    // dd($coupon_session);
                    if($coupon_session==true){
                        $is_avaiable = 0;
                        if($is_avaiable==0){
                            $cou[]=array(
                                'id_coupon '=>$coupon->id_coupon ,
                                'coupon_code'=>$coupon->coupon_code,
                            'coupon_condition'=>$coupon->coupon_condition,
                            'coupon_number'=>$coupon->coupon_number,
                        
                          
                        );        
                       
                        session::put('coupon',$cou);
                        }
                        }else{
                        $cou[]=array(
                            'id_coupon '=>$coupon->id_coupon ,
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_condition'=>$coupon->coupon_condition,
                            'coupon_number'=>$coupon->coupon_number,
                      
                     
                        );
                 
                        
                        session::put('coupon',$cou);
                    }
                    session::save();
                    return redirect()->back()->with('message','thêm mã giảm giá thành công');
                }
             }else{
                Session::forget('coupon'); 
                return redirect()->back()->with('error','Mã giảm giá không tồn tại hoặc đã hết');
             }
        }else{   
            Session::forget('coupon'); 
            return redirect()->back()->with('error','Bạn đã sử dụng mã này rồi');
        }
  
    }
 
}