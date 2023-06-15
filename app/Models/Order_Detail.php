<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table='order_detail';
    protected $primaryKey='id';
    public $timestamps=false;
    public $fillable =['id', 'id_product','quantity','price','id_order'];
}
