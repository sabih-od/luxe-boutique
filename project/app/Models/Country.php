<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','flag'];
    public $timestamps = false;


    public function states()
    {
        return $this->hasMany('App\Models\State');
    }


}
