<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class IctFee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'ict_payments';
    protected $fillable = ['id', 'amount','student_id',
                        'session_id','semester', 'receipt', 'paid_via', 'date',
                        'reference_id', 'status', 'reason','payment_channel'];
}
