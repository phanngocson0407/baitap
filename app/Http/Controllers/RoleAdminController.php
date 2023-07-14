<?php

namespace App\Http\Controllers;

use App\Models\RoleAdmin;
use App\Models\Admin;
use App\Models\Role;
use DB;
use Illuminate\Http\Request;

class RoleAdminController extends Controller
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
        $admin= Admin::all();
        $role= Role::all();
        return view('admin.role_admin.addRoleAdmin',compact('admin','role'));
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
        $data1['id']=$request->id ; 
        $data1['id_admin']=$request->id_admin;    
        $data1['id_role']= $request->id_role;      
        DB::table('role_admin')->insert($data1);

        return redirect('/admin/role_admin/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoleAdmin  $roleAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        $kw = $r->kw?$r->kw:'';
        $kw="%".$kw."%";
        $role_admin = RoleAdmin::join("admin",'admin.id','=','role_admin.id_admin')
        ->join("role",'role.id','=','role_admin.id_role')
        ->select(
            'role_admin.*',
            'admin.username',
            'role.role_module',
            'role.name_role',
        )
        ->where('username','like',$kw)->paginate(9);
        $role_admin->appends(['kw'=>$r->kw]);
        
        return view('admin.role_admin.index',['role_admin'=>$role_admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoleAdmin  $roleAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Admin= Admin::all();
        $Role= Role::all();
        // $role_admin=RoleAdmin::find($id);
        $role_admin = RoleAdmin::where('role_admin.id',$id)
        ->join('admin', 'role_admin.id_admin', '=', 'admin.id')
        ->join('role', 'role_admin.id_role', '=', 'role.id')
        ->select(
            'admin.username', 
            'role_admin.*',
            'role.role_module',
            'role.name_role'
        )
        ->first();
        return view('admin.role_admin.edit',['data'=>$role_admin,'Admin'=>$Admin,'Role'=>$Role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoleAdmin  $roleAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_role =array();
        
        $data_role['id_admin']=$request->id_admin;
        $data_role['id_role']=$request->id_role;
        DB::table('role_admin')->where('id',$request->id)->update($data_role);
        return Redirect('/admin/role_admin/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleAdmin  $roleAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_admin = RoleAdmin::find($id);
        $role_admin->delete();
        session()->flash('mess', 'Xóa Thành công!');
        return redirect('/admin/role_admin/');
    }
}
