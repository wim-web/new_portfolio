<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable = [
        'skill', 'percent', 'category',
    ];

    protected $visible = [
        'id', 'skill', 'percent', 'category',
    ];
}
