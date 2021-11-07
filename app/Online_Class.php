<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Online_Class extends Model
{
    protected $table = 'online__classes';
    protected $fillable = ['faculty_id','course_id','level_term','dept_id','session','date_time','link','meeting_id','meeting_password','remarks','class_for','duration','section'];
    
    public function faculty()
    {
        return $this->belongsTo('App\Faculty','faculty_id','id');
    }
    
    public function course()
    {
        return $this->belongsTo('App\Course','course_id','id');
    }
}
