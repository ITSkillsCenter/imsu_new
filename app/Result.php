<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Result extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'results';
    protected $fillable = ['student_id', 'name','department','enroll_semester','passing_semester','cgpa','credit'];

    public function student()
    {
        return $this->belongsTo(StudentInfo::class, 'Registration_Number', 'student_id');
    }
}
