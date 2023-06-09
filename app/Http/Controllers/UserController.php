<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
