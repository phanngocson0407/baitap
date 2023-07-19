<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

use App\Models\User;
use App\Models\Social; //sử dụng model Social
use Laravel\Socialite\Facades\Socialite;

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
            'password'=>'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).+$/', 
            'fullname'=>'required',
            'address'=>'required|min:20',   
            'phone'=>'required|numeric|digits:10',
        ],
        [
            'email.required'=>'Điền email',
            'email.unique'=>'Đã có người sử dụng email này rồi',
           
            'username.required'=>'Điền tài khoản',
            'username.unique'=>'tài khoản này có rồi',

            'phone.required'=>'Điền số điện thoại',
            'phone.digits'=>'Số điện thoại phải có 10 chữ số.',

            'password.required'=>'Điền mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 8 chữ số',
            'password.regex'=>'Bao gốm cả chữ và số',
            
            'fullname.required'=>'Điền họ và tên đầy đủ',

            'address.required'=>'Điền địa chỉ',
            'address.min'=>'Ít nhất 20 ký tự',
                
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
        Session::put('data1',"");
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
            'phone'=>'numeric|digits:10',
          
        ],
        [
            'email.required'=>'Điền email',
            'email.unique'=>'Đã có người sử dụng email này rồi',
           
            'username.required'=>'Điền tài khoản',
            'username.unique'=>'Tài khoản này có rồi',
            'phone.numeric'=>'Vui lòng nhập số điện thoại hợp lệ.',
            'phone.digits'=>'Số điện thoại phải gồm 10 chữ số.',
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
    public function updateUser(Request $request,$id){
        $data_khachhang =array();
        $data_khachhang['fullname']=$request->fullname;
        $data_khachhang['email']=$request->email;
        $data_khachhang['phone']=$request->phone;
        $data_khachhang['address']=$request->address;  
        $data_khachhang['password']=$request->password);
        DB::table('user')->where('id',$request->id)->update($data_khachhang);
        return Redirect('/');
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

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
        }
        
    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())
        ->first();
        if($account){
        //login in vao trang quan tri
        $account_name = User::where('id',$account->id_user)->first();

       
        Session::put('data1',$result[0]);
       
        return redirect("/")->with('message', 'Đăng nhập Admin thành công');
        }else{
        
        $son = new Social([
        'provider_user_id' => $provider->getId(),
        'provider' => 'facebook'
        ]);
        
        $orang = User::where('email',$provider->getEmail())->first();
        
        if(!$orang){
        $orang = User::create([
        
        'fullname' => $provider->getName(),
        'email' => $provider->getEmail(),
        'username' => '',
        'password' => '',
        'phone' => '',
        'address' => '',
        ]);
        }
        $son->login()->associate($orang);
        $son->save();
        
        $account_name = User::where('id',$account->id_user)->first();
        Session::put('data1',$result[0]);
       
        return redirect("/")->with('message', 'Đăng nhập Admin thành công');
        }
    }
    //đăng nhập gg
    public function login_google(){
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
        $users = Socialite::driver('google')
        ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
        ->user();
        $authUser = $this->findOrCreateUser($users,'google');
        return $authUser;
    }
    public function findOrCreateUser($user_social,$provider){
            $authUser = Social::where('provider_user_id', $user_social->id)->first();
            if($authUser){
                $account_name = User::where('id',$authUser->id_user)->first();
              
                Session::put('data1',$account_name);
                Session::put('id',$account_name->id);
                return redirect('/')->with('message', 'Đăng nhập Admin thành công');
            }
            else
            {
                $son = new Social([
                    'provider_user_id' => $user_social->id,
                    'provider' => strtoupper($provider)
                    
                    ]);
                   
                $orang = User::where('email',$user_social->email)->first();
                
                if(!$orang){
                    $orang=new User();
                    $orang->fullname=$user_social->name;
                    $orang->email=$user_social->email;
                    $orang->save();
                    $id_user=$orang->id;
                }
                else
                {
                    $id_user=$orang->id;
                }
                $son->id_user=$id_user;
                $son->save();
                $account_name = User::where('id',$son->id_user)->first();
                Session::put('data1',$account_name);
                Session::put('id',$account_name->id);
                return redirect('/')->with('message', 'Đăng nhập Admin thành công');
            }   
    }
}