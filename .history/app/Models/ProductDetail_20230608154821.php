<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = "id";
    protected $fillable = ['id,quantity,id_product'];
    public $timestamps = false;
}