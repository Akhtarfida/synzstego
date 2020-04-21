<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\database\Eloquent\SoftDeletes;

class Upload extends Model
{

    use SoftDeletes;

    protected $date = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function watermark()
    {
        return $this->hasOne('App\Watermark');
    }

    public function steganography()
    {
        return $this->hasOne('App\Steganography');
    }
}
