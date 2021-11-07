<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TE_Question extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 't_e__questions';
    protected $fillable = ['question_title','question_category'];
}
