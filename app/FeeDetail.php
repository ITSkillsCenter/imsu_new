<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class FeeDetail extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'fee_details';
    protected $fillable = ['registration_id', 'student_id','feelist_id'];

    public function feelists(){
        return $this->belongsTo(FeeList::class,'feelist_id');
    }
}
