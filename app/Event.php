<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Event extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $table = 'events';
    protected $fillable = ['type_id','session_id','starts','ends','remarks'];

    // getting types
    public function type(){
        return $this->belongsTo(EventType::class, 'type_id');
    }

    // getting session
    public function session(){
        return $this->belongsTo(Current_Semester_Running::class, 'session_id');
    }
}