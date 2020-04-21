<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class watermark extends Model
{
    protected $fillable = ['image_id'];
    
    public function upload()
    {
        return $this->belongsTo('App\Upload');
    }
}
