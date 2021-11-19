<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PgApplicationFee extends Model
{
    //
    protected $fillable = ['amount', 'application_number', 'name', 'phone', 'email', 'reference_id', 'payment_channel', 'status'];
}
