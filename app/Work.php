<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }
}
