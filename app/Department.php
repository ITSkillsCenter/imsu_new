<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Department extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table='departments';
    protected $fillable=['name','type','faculty_id','short_name', 'years'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

}


