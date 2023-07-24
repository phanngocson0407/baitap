<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $primaryKey='id';
  

    public $timestamps=false;
    public $fillable =['id','total','coupon_code', 'id_user','date_payment','consingnee_email','consingnee_name', 'consingnee_address', 'consingnee_phone','vnp_TxnRef','vnp_TransactionNo','vnp_BankCode','vnp_OrderInfo','status','status_payment'];
}