<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Union extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'unions';
    protected $fillable = ['upazilla_id', 'name','bn_name','url'];

    public function upazilla()
    {
        return $this->belongsTo(Upazilla::class, 'upazilla_id');
    }
}
