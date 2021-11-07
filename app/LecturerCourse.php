<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LecturerCourse extends Model
{
    protected $fillable = [
        'user_id',
        'lecturer_id',
        'course_id',
        'department_id',
        'faculty_id'
    ];


    public function user()
    {       
        return $this->belongsTo(User::class);
    }

    public function lecturer()
    {       
        return $this->belongsTo(Lecturer::class);
    }

    public function department()
    {       
        return $this->belongsTo(Department::class);
    }

    public function faculty()
    {       
        return $this->belongsTo(Faculty::class);
    }

    public function course()
    {       
        return $this->belongsTo(Course::class);
    }
}
