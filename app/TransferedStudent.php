<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TransferedStudent extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $fillable=['student_id','university_name','start_semester','end_semester'];
}
