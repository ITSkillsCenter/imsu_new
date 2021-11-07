<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Croutine extends Model
{
    protected $fillable = [
        'course_code', 'faculty','time','class_room','day_of_week',
    ];

    public function course()
    {
        return $this->hasOne('App\Course');
    }
}
