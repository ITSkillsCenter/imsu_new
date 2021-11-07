<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Attendance extends Model implements Auditable
{
  //use SoftDeletes;
  use \OwenIt\Auditing\Auditable;

  protected $dates = ['created_at','date'];
  protected $table = 'attendances';
  protected $fillable = [
    'Program',
    'students_id',
    'date',
    'course_id',
    'levelTerm',
    'present',
  ];
  function setDateAttribute($value)
  {
    $this->attributes['date'] = Carbon::createFromFormat('d/m/Y', $value);
  }
  public function student() {
    return $this->belongsTo('App\StudentInfo','students_id');
  }

}
