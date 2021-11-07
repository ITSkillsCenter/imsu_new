<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Mark extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [ 
        'Registration_Number',
        'course_id',
        'grade_letter',
        'grade_point',
        'course_credit',
        'level',
        'semester',
        'academic_year',
        'course_status'
            ];
    
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
    public function student()
    {
        return $this->belongsTo('App\StudentInfo','id','Registration_Number');
    }
}
