<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Syllabus extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'syllabus';
    protected $fillable = ['department_id','course_id','session_id','level_term','status'];

    // getting course codes
    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }
}