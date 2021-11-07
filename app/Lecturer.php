<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {       
        return $this->belongsTo(User::class);
    }

    public function lecturerCourses()
    {
        return $this->hasMany(LecturerCourse::class);
    }
}
