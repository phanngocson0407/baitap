<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'color';
    protected $primaryKey = "id_color";
    protected $fillable = ['id_color,name_color,id_product'];
    public $timestamps = false;
}