<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class AssignFee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'assign_fee';
    protected $fillable = [
        'year1',
        'year2',
        'year3',
        'year4',
        'year5',
    ];

}
