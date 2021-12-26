<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

class StudentInfo extends Model implements Auditable
{
     // use SoftDeletes;
     use \OwenIt\Auditing\Auditable;
     
     protected $table = 'student_infos';
     
     protected $fillable = [
              'registration_number',
              'first_name',
              'last_name',
              'middle_name',
              'Email_Address',
              'email_address',
              'level',
              'nationality',
              'state_of_origin',
              'lga',
              'gender',
              'student_mobile_number',
              'Student_Mobile_Number',
              'student_type',
              'date_of_Birth',
              'faculty_id', 
              'dept_id',
              'dept_option',
              'matric_number',
              'student_group',
              'password',
              'Passing_Batch',
              'temp_password',
              'blood_group', 'country_residence', 'state_of_residence', 'lga_of_residence', 'fathers_name', 'fathers_address', 'fathers_phone',
              'mothers_name', 'mothers_address', 'mothers_phone', 'guardians_name', 'guardians_address', 'guardians_phone', 'guardians_relationship',
              'sponsors_name', 'sponsors_address', 'sponsors_phone', 'sponsors_relationship', 'medical_info','batch','status','reason'

	];
    public function marks()
    {
        return $this->hasMany('App\Mark','Registration_Number','id');
    }

     public function faculty()
    {
        return $this->belongsTo('App\Faculty','faculty_id','id');
    }

      public function department()
    {
        return $this->belongsTo('App\Department','dept_id','id');
    }

    public function getFullNameAttribute() 
    {
        return ucfirst($this->first_name . ' ' . $this->last_name . ' ' . $this->middle_name);
    }

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }
    
}
