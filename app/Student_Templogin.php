<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

class Student_Templogin extends Model implements Auditable
{
     // use SoftDeletes;
     use \OwenIt\Auditing\Auditable;
     
     protected $table = 'student_templogin';
     
     protected $fillable = [
              'matric_number',
              'password'

	];
}
