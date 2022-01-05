<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ClearanceStudent extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'clearances_student';
    protected $fillable = [
        'bursary',
        'hod',
        'records',
        'faculty',
        'library',
        'sport',
        'student_affairs',
        'security',
        'medical',
        'alumni',
        'student_id',
        'step',
        'answers',
        'rejected_reason',
        'accepted_reason'
    ];

}
