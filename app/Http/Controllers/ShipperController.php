<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
class ShipperController extends Controller
{
     public function show(Order $Order)
    {
        $order = Order::orderBy('status', 'asc')->paginate(4);
        
        return view('admin.shipper.index',['order'=>$order]);
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
