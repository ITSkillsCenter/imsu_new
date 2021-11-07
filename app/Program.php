<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Program extends Model implements Auditable
{
    
     // use SoftDeletes;
     use \OwenIt\Auditing\Auditable;
     
    
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'notice'
    ];

  
}
