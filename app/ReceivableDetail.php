<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ReceivableDetail extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'receivable_details';
    protected $fillable = ['receivable_id', 'student_id','date','fee_id','particular','amount','account_type','section','is_semester','remarks'];
}
