<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    protected $primaryKey = "id_coupon";
    protected $fillable = ['id_coupon,coupon_name,coupon_quanti,coupon_code,coupon_condition,coupon_number'];
    public $timestamps = false;
}