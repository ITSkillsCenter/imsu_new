<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TE_Main extends Model
{
    protected $table='t_e__mains';
    protected $fillable=['student_id','department','semester_id','course_id','faculty_id','remarks'];
}
