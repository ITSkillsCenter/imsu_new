<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class District extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'districts';
    protected $fillable = ['division_id', 'name','bn_name','lat','reg_type','lon','url'];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}
