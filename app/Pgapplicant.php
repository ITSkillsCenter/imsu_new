<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pgapplicant extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name', 'title', 'phone', 'email', 'password', 'faculty_id', 'dept_id', 'programme', 'specialization',
        'qualification', 'study_type', 'dob', 'gender', 'marital_status', 'country_of_origin', 'state_of_origin', 'lga_of_origin',
        'town_of_origin', 'location_of_origin', 'country_of_residence', 'state_of_residence', 'town_of_residence', 'location_of_residence',
        'disability', 'funding', 'funding_type', 'previous_education', 'olevel', 'employment', 'first_referee', 'second_referee', 
        'supporting_information', 'olevel_result', 'education_certificates', 'education_transcript', 'nysc_certificate', 'reference_1',
        'reference_2', 'idcard', 'indigene_certificate', 'passport', 'status', 'application_number', 'lga_of_residence', 'step', 'next_of_kin'
    ];
}
