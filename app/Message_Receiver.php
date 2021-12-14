<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message_Receiver extends Model
{
    protected $table = 'message_receivers';
    protected $fillable = [ 
        'message_id',
        'receiver_id',
    ];
    
    public function receivers()
    {
        return $this->belongsTo('App\Message','message_id');
    }
    
}