<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class UploadDoc extends Model
{
    public $timestamps = true;
    protected $table = 'upload_doc';
    protected $guarded = ['id'];

    // public function uploadDoc()
    // {
    // 	return $this->hasMany(UploadDoc::class);
    // }
}
