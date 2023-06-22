<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;
use Illuminate\Pagination\Paginator;
class UserController extends Controller
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
    public function insert_User(){
        return view('login');
    }
    
    public function register(Request $request){
        $v = $request->validate([
            'email'=>'required|unique:user',
            'username'=>'required|unique:user',
            'password'=>'required', 
            'fullname'=>'required',
            'address'=>'required',   
            'phone'=>'required',
        ],
        [
            'email.required'=>'Điền email',
            'email.unique'=>'Đã có người sử dụng email này rồi',
           
            'username.required'=>'Điền tài khoản',
            'username.unique'=>'tài khoản này có rồi',

            'phone.required'=>'Điền số điện thoại',

            'password.required'=>'Điền mật khẩu',
            
            'fullname.required'=>'Điền họ và tên đầy đủ',

            'address.required'=>'Điền địa chỉ',
        ]
    );
        $data =array();
        $data['fullname']=$request->fullname;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['username']=$request->username;
        $data['password']=md5($request->password);
        DB::table('user')->insert($data);
        return view('login');
    }
   

    public function dangnhap(Request $request){
        $username = $request->username;
        $password = md5($request->password);
        $result= DB::table('user')->where('username',$username)->where('password',$password)->get();
        
        if(count($result)>0){
           Session::put('data1',$result[0]);
            return redirect("/");
        }else{
           Session::put('message','Tài khoản hoặc mật khẩu sai');
           return view('login');
        }
    }
    public function logout(){
        Session::put('data',"");
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.addUser');
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
            'email'=>'required|unique:user',
            'username'=>'required|unique:user',
          
        ],
        [
            'email.required'=>'Điền email',
            'email.unique'=>'Đã có người sử dụng email này rồi',
           
            'username.required'=>'Điền tài khoản',
            'username.unique'=>'Tài khoản này có rồi',
        ]
    );
        $data1 =array();
        $data1['id']=$request->id; 
        $data1['fullname']=$request->fullname;
        $data1['email']=$request->email;
        $data1['phone']=$request->phone;
        $data1['address']=$request->address;
        $data1['username']=$request->username;
        $data1['password']=md5($request->password);
      
        DB::table('user')->insert($data1);
  
        return redirect('/admin/khachhang/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        $kw = $r->kw?$r->kw:'';
        $kw="%".$kw."%";
        $user =User::where('fullname','like',$kw)->paginate(4);
        $user->appends(['kw'=>$r->kw]);
       
        return view('admin.user.index',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachhang=User::find($id);
        return view('admin.user.edit',['data'=>$khachhang]);
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
        $data_khachhang =array();
        $data_khachhang['fullname']=$request->fullname;
      
       
        $data_khachhang['email']=$request->email;
        $data_khachhang['phone']=$request->phone;
        $data_khachhang['address']=$request->address;
        $data_khachhang['username']=$request->username;
        $data_khachhang['password']=md5($request->password);
        DB::table('user')->where('id',$request->id)->update($data_khachhang);
        return Redirect('/admin/khachhang/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
