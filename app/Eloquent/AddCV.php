<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class AddCV extends Model
{
    public $timestamps = true;
    protected $table = 'users_cv';
    protected $guarded = ['id'];

    // public function uploadDoc()
    // {
    // 	return $this->hasMany(UploadDoc::class);
    // }
}
