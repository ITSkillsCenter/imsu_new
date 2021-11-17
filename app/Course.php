<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Course extends Model implements Auditable
{
    
     // use SoftDeletes;
     use \OwenIt\Auditing\Auditable;
     
    
    protected $table = 'courses';
    protected $fillable = [
        'course_code', 'course_name','unit','faculty_id', 'type', 'dept_id', 'semester', 'level','remarks','status', 'croutine_id'
    ];

    // public function mark()
    // {
    //     return $this->hasOne('App\Mark','course_id');
    // }
    // public function croutine()
    // {
    //     return $this->belongsTo('App\Croutine');
    // }

    public function department()
    {       
        return $this->belongsTo(Department::class, 'dept_id');
    }

    public function faculty()
    {       
        return $this->belongsTo(Faculty::class);
    }

    public function coursesStudents()
    {       
        return $this->hasMany(Course_Student::class, 'course_id');
    }
    
}
