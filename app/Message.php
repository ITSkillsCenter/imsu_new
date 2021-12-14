<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [ 
        'subject',
        'body',
        'type',
        'status',
        'receiver_type',
        'faculty_id',
        'dept_id'
    ];
    
    public function receivers()
    {
        return $this->hasMany('App\Message_Receiver','message_id');
    }

    public function getCreatedAtHumanAttribute()
    {
        return $this->created_at? $this->created_at->diffForHumans() : '';
    }

    public function getUpdatedAtHumanAttribute()
    {
        return $this->updated_at ? $this->updated_at->diffForHumans() : '';
    }
    
}