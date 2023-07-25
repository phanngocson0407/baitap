<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    use HasFactory;
    protected $table='reply_comment';
    protected $primaryKey='id';
    public $timestamps=false;
    public $fillable =['id', 'reply','reply_date','name_admin','id_comment'];
}
