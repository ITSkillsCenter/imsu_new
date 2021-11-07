<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Division extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'divisions';
    protected $fillable = ['name', 'bn_name','url'];
}
