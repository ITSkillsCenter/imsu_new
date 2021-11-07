<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class WaivedCourse extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $fillable=['student_id','course_id','credit','grade_letter'];

}
 
