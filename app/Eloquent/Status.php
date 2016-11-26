<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = true;
    protected $table = 'users_status';
    protected $guarded = ['id'];

    public function comments()
    {
    	return $this->hasMany(StatusComments::class);
    }
    public function postNotifications()
    {
    	return $this->hasMany(PostNotifications::class);
    }
     public function followers()
    {
    	return $this->hasMany(Followers::class);
    }
         
}
