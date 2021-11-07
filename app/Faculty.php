<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Faculty extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table =  'faculties';
    protected $fillable = [
        'name', 'faculty_id','short_name','email','status','slug','phone_number','benefit','about','image','alumni','why_study_here'
    ];
    
}
