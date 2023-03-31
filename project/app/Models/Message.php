<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['conversation_id','message','sent_user','recieved_user'];
	public function conversation()
	{
	    return $this->belongsTo('App\Models\Conversation');
	}

	public function sentUser(){
	    return $this->belongsTo(User::class,'sent_user','id');
    }

    public function recievedUser(){
        return $this->belongsTo(User::class,'recieved_user','id');
    }
}
