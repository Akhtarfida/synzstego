<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Steganography extends Model
{
    protected $fillable = ['img_id', 'enckey'];
    
    public function upload()
    {
        return $this->belongsTo('App\Upload');
    }
}
