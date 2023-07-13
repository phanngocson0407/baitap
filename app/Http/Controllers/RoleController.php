<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleAdmin;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
class RoleController extends Controller
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
        return view('admin.role.addRole');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = $request->validate([
            'name_role'=>'required|unique:role',

            'role_module'=>'required|unique:role',
        ],
        [
         
            'name_role.required'=>'Điền Tên Quyền',
            'name_role.unique'=>'Không được trùng tên quyền',

            'role_module.required'=>'Điền tên module',
            'role_module.unique'=>'Không được trùng tên module',
        ]
    );
        $data1 =array();
        $data1['id']=$request->id; 
        $data1['name_role']=$request->name_role;
        $data1['role_module']=$request->role_module;
       
        DB::table('role')->insert($data1);
        return redirect('/admin/role/');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        $kw = $r->kw?$r->kw:'';
        $kw="%".$kw."%";

        $ks = $r->ks?$r->ks:'';
        $ks="%".$ks."%";
        
        $role = Role::where('name_role','like',$kw)->where('role_module','like',$ks)->paginate(6);
        $role->appends(['kw'=>$r->kw],['ks'=>$r->ks]);
        return view ('admin.role.index',['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role=Role::find($id);
        return view('admin.role.edit',['data'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =array();
        $data['name_role']=$request->name_role;
        $data['role_module']=$request->role_module;
       
        DB::table('role')->where('id',$request->id)->update($data);
        return Redirect('/admin/role/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $n =RoleAdmin::where('id_role','=', $id)->first();
        if ($n ==null)
        {
            $role = Role::find($id);
             $role->delete();
            session()->flash('mess', 'Xóa Thành công!');
        }
        else 
        {
            session()->flash('mess', 'Không thể xóa! ');
        }
        return Redirect('/admin/role/');
    }
}
