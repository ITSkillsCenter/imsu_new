<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Upazilla extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'upazilas';
    protected $fillable = ['district_id', 'name','bn_name','url'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
