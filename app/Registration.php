<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Registration extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'registrations';
    protected $fillable = ['semester', 'levelTerm','student_id','reg_type','department','dept_clearance','hostel_clearance','account_clearance','dept_approved','hostel_approved','account_approved','tb_remarks','transport','library'];

    public function author()
    {
        return $this->belongsTo(StudentInfo::class, 'Registration_Number');
    }
}
