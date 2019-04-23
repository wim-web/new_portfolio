<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $hidden = [
        'updated_at', 'created_at'
    ];

    public function works()
    {
        return $this->belongsTo('App\Work');
    }
}
