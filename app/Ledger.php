<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Ledger extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $fillable=['chart_account_id','student_id','date','particular','amount','account_type','receivable_id','fee_list_id','fee_id','remarks','rd_id'];
 
}
