<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Lga extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table =  'lgas';
    protected $fillable = [
        'name', 'id','state_id','head'
    ];
    
    
}
