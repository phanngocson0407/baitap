<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'color';
    protected $primaryKey = "id_";
    protected $fillable = ['id_color,name_color,id_product'];
    public $timestamps = false;
}