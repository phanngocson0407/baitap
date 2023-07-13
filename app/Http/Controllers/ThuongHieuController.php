<?php

namespace App\Http\Controllers;

use App\Models\ThuongHieu;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class ThuongHieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.thuonghieu.addThuonghieu');
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
            'tenthuonghieu'=>'unique:thuonghieu',
        ],
        [
            'tenthuonghieu.unique'=>'Không được trùng tên thương hiệu đã có sẵn',
           
        ]
    );
        $data1 =array();
        $data1['idthuonghieu']=$request->idthuonghieu; 
        $data1['tenthuonghieu']=$request->tenthuonghieu;
          
        DB::table('thuonghieu')->insert($data1);
  
        return redirect('/admin/thuonghieu/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThuongHieu  $thuongHieu
     * @return \Illuminate\Http\Response
     */
    public function show(ThuongHieu $thuongHieu)
    {
        $ThuongHieu = ThuongHieu::all();
        return view('admin.thuonghieu.index',['ThuongHieu'=>$ThuongHieu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThuongHieu  $thuongHieu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $thuonghieu=ThuongHieu::find($id);
        return view('admin.thuonghieu.edit',['data'=>$thuonghieu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThuongHieu  $thuongHieu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $dataThuonghieu =array();
        $dataThuonghieu['tenthuonghieu']=$request->tenthuonghieu;
        DB::table('thuonghieu')->where('idthuonghieu',$request->idthuonghieu)->update($dataThuonghieu);
        return Redirect('/admin/thuonghieu/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThuongHieu  $thuongHieu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $n =Category::where('id_thuonghieu','=', $id)->first();
        if ($n ==null)
        {
            $Thuonghieu = ThuongHieu::find($id);
            $Thuonghieu->delete();
            session()->flash('mess', 'Xóa Thành công!');
        }
        else 
        {
            session()->flash('mess', 'Không thể xóa( còn loại sản phẩm trong thương hiệu này này )! ');
        }
        return redirect('/admin/thuonghieu/');
    }
}