<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    protected $table = 'settings';
    protected $fillable = [
        'hod_approval'
    ];
}
