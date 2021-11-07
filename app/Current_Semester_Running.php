<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Current_Semester_Running extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'current__semester__runnings';
    protected $fillable = ['title','from','to','status','previous_semester'];
}