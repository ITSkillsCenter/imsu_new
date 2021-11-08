<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ApplicationFee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'application_payments';
    protected $fillable = ['id', 'amount','application_number', 'name', 'phone',
                        'reference_id', 'status', 'pms_id', 'payment_channel'];
}
