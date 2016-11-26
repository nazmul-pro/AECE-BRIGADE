<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class StatusComments extends Model
{
    public $timestamps = true;
    protected $table = 'user_status_comments';
    protected $guarded = ['id'];

    public function status()
    {
    	return $this->hasOne(Status::class);
    }
}
