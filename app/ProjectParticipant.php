<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectParticipant extends Model
{
    protected $guarded = ['id'];

    public function users()
    {
    	return $this->belongsToMany(\App\User::class,\App\ProjectParticipant::class,'id');
    }
}
