<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DepartmentOption extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table =  'dept_options';
    protected $fillable = [
        'name', 'id','dept_id',
    ];
    
}
