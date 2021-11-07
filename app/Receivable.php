<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Receivable extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'receivables';
    protected $fillable = ['registration_id', 'student_id','total','less','paid','due','previous_due','remarks','status'];

    public function registration(){
        return $this->belongsTo(Registration::class);
    }
}
