<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TE_Question_Category extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 't_e__question__categories';
    protected $fillable = ['category_name'];
}
