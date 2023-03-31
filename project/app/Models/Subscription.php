<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['title','price','days','allowed_products','details', 'total_price', 'payout_time'];
    public $timestamps = false;


public function subscription(){
    return $this->belongsTo(UserSubscription::class,'id','subscription_id');
}

}
