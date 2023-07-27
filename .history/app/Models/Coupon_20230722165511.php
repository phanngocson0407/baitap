<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'color';
    protected $primaryKey = "id_coupon";
    protected $fillable = ['id_coupon,coupon_name,coupon_quanti,coupon_code,'];
    public $timestamps = false;
}