<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['name','sopName'];
    
    protected $table = 'products';

     //public function scopeSearch($query, $s){
   	//return $query->where('name', 'LIKE', '%' .$s. '%')
   	             //->orwhere('sopName', 'LIKE', '%' .$s. '%');
   //}

}
