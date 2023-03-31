<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['product_id','photo'];
    public $timestamps = false;

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
