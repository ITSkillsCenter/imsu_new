<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ManageCourseCreditUnit extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table =  'manage_course_credit_units';
    protected $fillable = [
        'department_id',
        'faculty_id',
        'program_id',
        'level',
        'semester',
        'max_credit_unit',
        'min_credit_unit'
    ];


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    
}
