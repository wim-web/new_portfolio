<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        //
        'filename' => str_random(12) . 'jpg',
        'work_id' => rand(1, 5),
    ];
});
