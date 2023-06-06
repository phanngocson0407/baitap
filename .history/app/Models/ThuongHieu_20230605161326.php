<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    use HasFactory;
    protected $table = 'thuonghieu';
    protected $primaryKey = "idthuonghieu";
    protected $fillable = ['tenthuonghieu'];
    public $timestamps = false;
}
