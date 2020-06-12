<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];


    public function creator()
    {
    	return $this->belongsTo('App\User','creator_id','id');
    }

}
