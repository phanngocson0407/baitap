<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAdmin extends Model
{
    use HasFactory;
    protected $table = 'role_admin';
    protected $primaryKey = "id";
    protected $fillable = ['id,id_admin,id_role'];
    public $timestamps = false;
}
