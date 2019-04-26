<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $fillable = [
        'title', 'body', 'link', 'thumbnail',
    ];

    protected $hidden = [
        'updated_at', 'created_at',
    ];

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }
}
