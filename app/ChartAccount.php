<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    protected $table = 'chart_accounts';
    protected $fillable=['account','name','parent_id'];
    
    public function parent()
    {
        return $this->belongsTo('App\ChartAccount', 'parent_id');
    }



    public function childs(){
        return $this->hasMany('App\ChartAccount','parent_id');
      }
}
