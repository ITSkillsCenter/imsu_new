<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeList extends Model
{
    protected $fillable = [
        'semester', 'department_id', 'faculty_id', 'is_schoolfees', 'fee_name','fee_type','amount',
        'status', 'type', 'is_applicable_to', 'invoice_creation',
        'pms_id', 'interswitch_item_code'
    ];
}
