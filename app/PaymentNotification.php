<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PaymentNotification extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'payment_notifications';
    protected $fillable = ['id', 'invoice_no','tranx_ref', 'amount', 'client_ref',
                        'status', 'statusCode'];
}
