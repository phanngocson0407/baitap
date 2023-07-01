<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
  

    protected $table = 'social';
    protected $primaryKey = "id";
    protected $fillable = ['provider_user_id', 'provider', 'id_user'];
    public $timestamps = false;

    public function login(){
        return $this->belongsTo('App\Login', 'id_user');
        }

}
