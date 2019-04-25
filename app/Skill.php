<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable = [
        'skill', 'category',
    ];

    protected $visible = [
        'id', 'skill', 'category',
    ];
}
