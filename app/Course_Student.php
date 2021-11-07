<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Course_Student extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'courses_student';
    protected $fillable = ['session_id','semester', 'level','student_id','course_id','reg_type','course_status','department'];

    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }

    public function studentInfo()
    {
        return $this->belongsTo(StudentInfo::class, 'student_id', 'matric_number');
    }
}
