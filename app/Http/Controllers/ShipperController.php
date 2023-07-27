<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
     public function show(Order $Order)
    {
        $order = Order::all();
        
        return view('admin.shipper.index',['order'=>Order::paginate(4)]);
    }
    public function update_status_vanchuyen(Request $request)
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
}
