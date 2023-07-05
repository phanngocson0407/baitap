<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table='comment';
    protected $primaryKey='id';
    public $timestamps=false;
    public $fillable =['id', 'comment','comment_name','comment_data','status','product_id'];
}
