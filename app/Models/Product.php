<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = "id";
    protected $fillable = ['id,name_product,price,description,image'];
    public $timestamps = false;

    // public function getCateKytuPagination($kytu,$limit,$start){
    //     $this->db->limit($limit,$start);
    //     $query=$this->db->select('*')
    //     ->from('product')
    //     ->order_by('name_product',$kytu)
    //     ->get();
    //     return $query->result();
    // }
    // public function getCatePricePagination($gia,$limit,$start){
    //     $this->db->limit($limit,$start);
    //     $query=$this->db->select('*')
    //     ->from('product')
    //     ->order_by('price',$gia)
    //     ->get();
    //     return $query->result();
    // }
    // public function getCatePriceRangePagination($from_price,$to_price,$limit,$start){
    //     $this->db->limit($limit,$start);
    //     $query=$this->db->select('*')
    //     ->from('product')
    //     ->where('price >=',$from_price)
    //     ->where('price <=',$to_price)
    //     ->order_by('price','asc')
    //     ->get();
    //     return $query->result();
    // }
    // public function getCatePagination($limit,$start){
    //     $this->db->limit($limit,$start);
    //     $query=$this->db->select('*')
    //     ->from('product')
    //     ->get();
    //     return $query->result();
    // }

}