<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchandiseOrders extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'customer_name', 'customer_email', 'customer_phone', 'additional_information', 'notes', 'user_media'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
