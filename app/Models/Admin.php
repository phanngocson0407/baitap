<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table='admin';//default loais
    protected $primaryKey ='username';//default id
    protected $keyType='string';//default int
    public $incrementing=false;//default true
    public $timestamps = false;
}
