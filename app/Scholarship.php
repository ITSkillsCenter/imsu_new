<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $table = 'scholarships';
	protected $fillable = [
        'matric_number','fathers_name','fathers_place_of_work','fathers_role_at_work', 'fathers_monthly_income',
        'mothers_name', 'mothers_place_of_work', 'mothers_role_at_work', 'mothers_monthly_income', 'sponsor',
        'sponsors_name', 'sponsors_place_of_work', 'sponsors_role_at_work', 'sponsors_monthly_income',
        'sponsors_relationship', 'application_letter'
    ];
}
