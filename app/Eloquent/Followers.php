<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    public $timestamps = true;
    protected $table = 'post_followers';
    protected $guarded = ['id'];

    public function status()
    {
    	return $this->hasOne(Status::class);
    }
}
