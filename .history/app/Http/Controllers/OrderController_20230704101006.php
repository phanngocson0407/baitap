<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Order_Detail;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= User::all();
        return view('admin.order.addOrder',compact('user'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data1 =array();
        $data1['id_user']=$request->id_user;    
        $data1['consingnee_email']=$request->consingnee_email ; 
        $data1['consingnee_name']=$request->consingnee_name;
        $data1['consingnee_address']=$request->consingnee_address;
        $data1['consingnee_phone']=$request->consingnee_phone;
           
        DB::table('order')->insert($data1);
  
        return redirect('/admin/order/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status(Request $request)
    {
        $id=$request->id;
        $status = $request->status??""; 
        $order = Order::find($id);
        if ($order) {
            $order->status = $status;
            $order->save();
            $data = [
              
                'status' => $order->status
            ];
    
        return response()->json([
            'success' => true,
            "message"=>"Cap nhat thanh cong",
            'data' => $data
        ]);
    }
}
    public function show(Order $Order)
    {
        $order = Order::all();
        
        return view('admin.order.index',['order'=>$order]);
    }
    public function show_detail($id)
    {
        $Order = Order::join("order_detail", 'order.id', '=', 'order_detail.id_order')
        ->join("user", 'user.id', '=', 'order.id_user')
        ->select(
            'user.*',
            'order_detail.*',
            'order.id'
        )
        ->where('order_detail.id_order', $id)
        ->get();
        
       
        $Order_detail = Order::find($id);
        return view('admin.order.show_detail',['order_detail'=>$Order_detail,'order'=>$Order]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::all();
        $Order=Order::find($id);
        return view('admin.order.edit',['data'=>$Order],compact('user'));
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
        $data_order =array();
        $data_order['consingnee_email']=$request->consingnee_email;
        $data_order['consingnee_name']=$request->consingnee_name;
        $data_order['consingnee_address']=$request->consingnee_address;
        $data_order['consingnee_phone']=$request->consingnee_phone;
        DB::table('order')->where('id',$request->id)->update($data_order);
        return Redirect('/admin/order/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('/admin/order/');
    }
    public function donhang($id){
        $order = Order::join('user','user.id','=','order','order.id_user')
        ->select('order.*','user.id')
        // ->where('order.id_user',$id)
        ->get();
        $user= User::find($id);
        return view('donhang',['order'=>$order,'user'=>$user]);
    }
}