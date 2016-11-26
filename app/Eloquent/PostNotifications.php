<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class PostNotifications extends Model
{
    public $timestamps = true;
    protected $table = 'post_notifications';
    protected $guarded = ['id'];

    public function status()
    {
    	return $this->hasOne(Status::class);
    }
}
