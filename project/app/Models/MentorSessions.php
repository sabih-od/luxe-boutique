<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorSessions extends Model
{
    use HasFactory;
    protected $fillable = ['mentor_id', 'name', 'email', 'phone', 'message'];

    public function mentorId(){
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }
}
