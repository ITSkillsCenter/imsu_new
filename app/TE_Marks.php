<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TE_Marks extends Model
{
    protected $table='t_e__marks';
    protected $fillable=['evaluation_id','qs_category_id','qs_id','scale'];
}
