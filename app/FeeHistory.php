<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FeeHistory extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'fee_histories';
    protected $fillable = ['fee_id', 'amount','student_id',
                        'session_id','status','semester', 'is_applicable_discount', 'receipt',
                        'due_date', 'payment_type', 'department_id', 'discount','reason','payment_channel'];
}
