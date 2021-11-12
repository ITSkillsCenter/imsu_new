<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Applicant extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'applicants';
    protected $fillable = [
        'id', 'application_number', 'type', 'first_name', 'middle_name', 'last_name',
        'full_name', 'email', 'phone_number', 'jamb_score', 'jamb_subject1',
        'jamb_subject2', 'jamb_subject2', 'jamb_subject4', 'score1', 'score2',
        'score3', 'score4',
        'middle_name', 'sex', 'state', 'lga', 'course', 'year',
        'date_of_birth', 'phone_number_alt', 'email_alt', 'next_of_kin', 'next_of_kin_phone',
        'address', 'exam_1', 'olevel_1', 'exam_2', 'olevel_2', 'status', 'password',
        'higher_institution_attended', 'programme_studied', 'certificate_obtained', 'grade_achieved', 'attached_certificate_path', 'jamb_year', 'mode_of_admission',
        'otp'
    ];
    
}
