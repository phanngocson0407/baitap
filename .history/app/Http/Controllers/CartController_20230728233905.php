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
        //lay du lieu ben form
        $data = $request->all();
        // dd($data);
        
        //check 1 user chi duoc su dung 1 coupon chi dc su 1  lan
        $check_coupon = Order::where('coupon_code',$data['coupon'])
        ->where('id_user',$data['id_user'])
        ->first();
       
        //lay so luong cua coupon 
        $check_quanti_coupon = Coupon::where('coupon_code',$data['coupon'])->first();   
         
        //tinh tong so luong mã đã sử dụng trong order 
        $check_quanti_order = Order::join('coupon','coupon.coupon_code','=','order.coupon_code')
        ->where('order.coupon_code',$data['coupon'])
        ->whereNotNull('order.coupon_code')
        ->select('order.coupon_code',DB::raw('count(*) as total'))
        ->groupBy('order.coupon_code')
        ->first();
        dd($check_quanti_order)
        $check_quanti = Order::join('coupon', 'coupon.coupon_code', '=', 'order.coupon_code')
        ->whereNotNull('order.coupon_code')
    ->count('order.coupon_code');
        // dd($check_quanti);
        // if(){
            
        // } 
        if($check_quanti_coupon !=null){
            if($data['coupon']!=null){
               
           if($check_quanti_order->total < $check_quanti_coupon->coupon_quanti){
                    if($check_coupon==null){
                        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();        
                         if($coupon){
                            $count_coupon = $coupon->count();             
                            if($count_coupon>0){
                                $coupon_session = Session::get('coupon');            
                                if($coupon_session==true){
                                    $is_avaiable = 0;
                                    if($is_avaiable==0){
                                        $cou[]=array(
                                            'id_coupon '=>$coupon->id_coupon ,
                                            'coupon_code'=>$coupon->coupon_code,
                                        'coupon_condition'=>$coupon->coupon_condition,
                                        'coupon_number'=>$coupon->coupon_number,
                                        'coupon_quanti'=>$coupon->coupon_quanti,                              
                                    );                                  
                                    session::put('coupon',$cou);
                                    }
                                    }else{
                                    $cou[]=array(
                                        'id_coupon '=>$coupon->id_coupon ,
                                        'coupon_code'=>$coupon->coupon_code,
                                        'coupon_condition'=>$coupon->coupon_condition,
                                        'coupon_number'=>$coupon->coupon_number,
                                        'coupon_quanti'=>$coupon->coupon_quanti,                        
                                    );
                             
                                    // dd($cou);
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
                }else{
                    Session::forget('coupon'); 
                    return redirect()->back()->with('error','Đã hết mã giảm giá');
                }
            }else{
                Session::forget('coupon'); 
                return redirect()->back()->with('error','Bạn chưa nhập mã giảm giá');
            }
        }else{
            Session::forget('coupon'); 
            return redirect()->back()->with('error','Bạn nhập mã giảm giá chưa đúng');
        }
     
        
    }
}