<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'color';
    protected $primaryKey = "id_coupon";
    protected $fillable = ['id_coupon,name_color,id_product'];
    public $timestamps = false;
}