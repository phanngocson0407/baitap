<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use DB;
use Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $Admin = Admin::all();
        return view ('admin.accout_admin.index',['Admin'=>$Admin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
