<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Comment;
use App\Models\ReplyComment;
use App\Models\Rating;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        
        
        $comment = new Comment;
  
        $comment->comment = $request->comment;
        $comment->comment_name = $request->comment_name;
        $comment->status =0;
        $comment->product_id = $request->product_id;
        
        $comment->save();

        return Redirect('/detail/'.$id);
    }

    public function insert_rating(Request $r) {
        $data=$r->all();
        
        $check_rating = Rating::where('id_user', $data['id_user'])
                      ->where('id_product', $data['id_product'])
                      ->first();
        
        $check_pay = Rating::join('order','rating.id_user','=','order.id_user')
        ->where()
        ->first();
        
        
        if($check_pay!=null){
            echo 'none';
        }
        else if($check_rating !=null){
            echo 'fail';
        }
        else{
                
                $rating=new Rating();
                $rating->id_product=$data['id_product'];
                $rating->rating=$data['index'];
                $rating->id_user=$data['id_user'];
                $rating->save();
                echo 'done';
        }
     
    }
    // public function check_rating(Request $request){
    //     $check = $request->all();
    //     $check_rating = Rating::where('rating','rating.id_user',$check['id_user'])
    //     ->where('rating','rating.id_product ',$check['id_product '])->first();
    //     if($check_rating !=null){
    //         echo 'fail';
    //     }else{
    //         $rating=new Rating();
    //         $rating->id_product=$check['id_product'];
    //         $rating->rating=$check['index'];
    //         $rating->id_user=$check['id_user'];
    //         $rating->save();
    //         echo 'done';
    //     }
    // }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cm = Comment::join('product','product.id','=','comment.product_id')
        ->select(
            'product.*',
            'comment.*'
        )->get();

        $reply = ReplyComment::all();
        return view('admin.comment.index',
        [
            'cm'=>$cm,
            'reply'=>$reply,
        ]);
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
     
    }
    public function unactive(Request $request, $id)
    {
        $data =array();
        $data['status'] = $request->status; 
      
        DB::table('comment')->where('id',$id)->update($data);
        return Redirect('/admin/comment/');
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $comment = Comment::find($id);
            $comment->delete();
            session()->flash('mess', 'Xóa Thành công!');
        return redirect('/admin/comment/');
    }
    public function reply_comment($id)
    {
        $comment = Comment:: join('product','product.id','=','comment.product_id')
        ->select('product.*','comment.*')
        ->find($id);
        
        return view ('admin.comment.reply_comment',['comment'=>$comment]);
    }
    public function create_reply_comment(Request $request) {
        $data_reply =array();
        $data_reply['id_comment']=$request->id_comment; 
        $data_reply['name_admin']=$request->name_admin;
        $data_reply['reply']=$request->reply;
        DB::table('reply_comment')->insert($data_reply);
        return redirect('/admin/comment/');
    }
}