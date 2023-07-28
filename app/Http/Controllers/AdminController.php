<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\RoleAdmin;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;
use App\Models\Role;
use App\Models\Order;
use Illuminate\Pagination\Paginator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = 3;
        $status_huy = 0;
        $count = DB::table('order')
        ->join('order_detail','order.id','=','order_detail.id_order')
        ->where('order.status', $status)
        ->selectRaw('SUM(order_detail.price * order_detail.quantity) as total')
        ->value('total');
        
    //Lọc ngày
        $ngay1 = $request->input('ngay1') . ' 00:00:00';
        $ngay2 = $request->input('ngay2') . ' 23:59:59';
    //Lọc theo Quý
    $thongke_loai = $request->input('thongke_loai');
    if ($thongke_loai !== 'none') {
        if ($thongke_loai === 'quy1') {
            $ngay1 = date('Y') . '-01-01 00:00:00';
            $ngay2 = date('Y') . '-03-31 23:59:59';
        } elseif ($thongke_loai === 'quy2') {
            $ngay1 = date('Y') . '-04-01 00:00:00';
            $ngay2 = date('Y') . '-06-30 23:59:59';
        } elseif ($thongke_loai === 'quy3') {
            $ngay1 = date('Y') . '-07-01 00:00:00';
            $ngay2 = date('Y') . '-09-30 23:59:59';
        } elseif ($thongke_loai === 'quy4') {
            $ngay1 = date('Y') . '-10-01 00:00:00';
            $ngay2 = date('Y') . '-12-31 23:59:59';
        }
    }
        $thongke = Order::join('order_detail', 'order.id', '=', 'order_detail.id_order')
            ->where('order.status', $status)
            ->whereDate('order.date_payment', '>=', $ngay1)
            ->whereDate('order.date_payment', '<=', $ngay2)
            ->selectRaw('order.date_payment as date_payment, SUM(order_detail.price * order_detail.quantity) as total')
            ->groupBy('date_payment')
            ->get();
        
        

        $userCount = User::count();
        $OrderCount = Order::where('order.status_huy', $status_huy)->count();
        return view('admin/trangchu',[
            'count'=>$count,
            'status' => $status,
            'userCount'=>$userCount,
            'OrderCount'=>$OrderCount,
            'thongke'=>$thongke,
            'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accout_admin.addAccout');
    }
    public function create_role($id)
    {
        $role_all=Role::all();
        $role_admin = Admin::join("role_admin", 'admin.id', '=', 'role_admin.id_admin')
        ->join("role", 'role.id', '=', 'role_admin.id_role')
        ->select(
            'admin.*',
            'role.*',
            'role_admin.*',
        )
        ->where('role_admin.id_admin', $id)
        ->get();
       
        return view('admin.accout_admin.create_role',
        [
            'role_admin'=>$role_admin,
            'role_all'=>$role_all,
            'id_admin_duocchon'=>$id
        ]
        );
    }
    public function store_role(Request $request)
    {
        
        $id_admin=$request->id_admin;
        $deleteRole = $request->has('array_role_dachon');
        if ($deleteRole) {
            foreach($request->array_role_dachon as $k=>$v)
            {
                    $role_admin=new RoleAdmin;
                    $role_admin->id_admin=$id_admin;
                    $role_admin->id_role=$v;
                    $role_admin->save();
                    session()->flash('messthem','Thêm quyền thành công vào admin');
            }
       
        }else {
            RoleAdmin::where('id_admin',$id_admin)->delete();
            session()->flash('messxoa', 'Xóa quyền thành công khỏi admin');
    }
        return redirect('admin/accout/show-role/'.$id_admin);
    }

    public function dangnhap()
    {

        return view('admin.login');
    }

    public function kiemtraDN(Request $request)
{
    $username = $request->username;
    $password = md5($request->password);
    $result = DB::table('admin')->where('username', $username)->where('password', $password)->get();

    if ($result->count() > 0) {
        $data_admin = $result->first();

        $role = DB::table('role_admin')
            ->join('role', 'role.id', '=', 'role_admin.id_role')
            ->where('role_admin.id_admin', $data_admin->id)
            ->get();

        Session::put('data', $data_admin);
        Session::put('role', $role);

        return redirect('admin/trangchu');
    } else {
        session()->flash('message', 'Tài khoản hoặc mật khẩu sai');
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
   
    public function show_role(Request $r, $id)
    {
        $show_role = Admin::join("role_admin", 'admin.id', '=', 'role_admin.id_admin')
        ->join("role", 'role.id', '=', 'role_admin.id_role')
        ->select(
            'admin.*',
            'role.*',
            'role_admin.*',
        )
        ->where('role_admin.id_admin', $id)
        ->get();
        return view('admin.accout_admin.show_role',
        [
            'show_role'=>$show_role,
            'id_admin_duocchon'=>$id
        ]
        );
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

    public function page_acc_admin($id)
    {
        return view('admin.edit_accout_admin');
    }

    public function edit_acc_admin(Request $request, $id)
    {
        $v = $request->validate([
            'phone'=>'required|numeric|digits:10',
        ],
        [
            'phone.required'=>'Điền số điện thoại',
            'phone.digits'=>'Số điện thoại phải có 10 chữ số.',
        ]
    );
    $data_admin = array();
    $data_admin['fullname'] = $request->fullname;
    $data_admin['phone'] = $request->phone;
    $request->validate([
        'password_cu' => 'required',
    ]);
    $admin = DB::table('admin')->where('id', $request->id)->first();
    if ($admin && md5($request->password_cu) === $admin->password) {
        $data_admin['password'] = md5($request->password);
        DB::table('admin')->where('id', $request->id)->update($data_admin);
        return redirect('/admin/trangchu');
    } else {
        $request->session()->flash('error', 'Mật khẩu cũ không đúng.');
        return back();
    }
}

}