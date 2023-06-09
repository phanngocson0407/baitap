<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\RoleAdmin;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Pagination\Paginator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = 3;
        $count = DB::table('order')
        ->join('order_detail','order.id','=','order_detail.id_order')
        ->where('order.status', $status)
        ->select(
            'order_detail.price',
            'order.*'
        )->sum('price');
        return view('admin/trangchu',['count'=>$count, 'status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accout_admin.addAccout');
    }
    public function dangnhap()
    {

        return view('admin.login');
    }

    public function kiemtraDN(Request $request)
    {
        $username = $request->username;
        $password = md5($request->password);
        $result= DB::table('admin')->where('username',$username)->where('password',$password)->get();
        $data_admin=$result[0];

        $role=
        DB::table('role_admin')
        ->join('role','role.id','=','role_admin.id_role')
        ->where('role_admin.id_admin',$data_admin->id)->get();
        if(count($result)>0){
           Session::put('data',$data_admin);
           Session::put('role',$role);
            return redirect('admin/trangchu');
        }else{
           Session::put('message','Tài khoản hoặc mật khẩu sai');
           return view('admin.login');
        }
        
    }

    public function logout(){
        Session::put('data',"");
        Session::put('role',"");
        return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v = $request->validate([
            
            'phone'=>'numeric|digits:10',
            'username'=>'required|unique:user',
            
        ],
        [
            
            'username.required'=>'Điền tài khoản',
            'username.unique'=>'Tài khoản này có rồi',
            'phone.numeric'=>'Vui lòng nhập số điện thoại hợp lệ.',
            'phone.digits'=>'Số điện thoại phải gồm 10 chữ số.',
        ]
    );
        $data1 =array();
        $data1['id']=$request->id; 
        $data1['fullname']=$request->fullname;
        $data1['phone']=$request->phone;
        $data1['username']=$request->username;
        $data1['password']=md5($request->password);
        DB::table('admin')->insert($data1);
        return redirect('/admin/accout/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $r)
    {
       
        $Admin = Admin::all();
     
        return view ('admin.accout_admin.index',['Admin'=>$Admin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin=Admin::find($id);
        return view('admin.accout_admin.edit',['data'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data =array();
        $data['fullname']=$request->fullname;
        $data['phone']=$request->phone;
        $data['username']=$request->username;
        $data['password']=md5($request->password);
        DB::table('admin')->where('id',$request->id)->update($data);
        return Redirect('/admin/accout/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $n =RoleAdmin::where('id_admin','=', $id)->first();
        if ($n ==null)
        {
            $admin = Admin::find($id);
            $admin->delete();
            session()->flash('mess', 'Xóa Thành công!');
        }
        else 
        {
            session()->flash('mess', 'Không thể xóa( vì tài khoản này đang quản lý quyền)! ');
        }
        return Redirect('/admin/accout/');
    }
}