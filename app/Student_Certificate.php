<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Student_Certificate extends Model
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'student_certificates';
    protected $fillable = ['student_id', 'ssc_c','ssc_m','hsc_c	','hsc_m','cc','bc','ff','tc','mfc','blc'];
}
