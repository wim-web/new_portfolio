<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Skill;
use Faker\Generator as Faker;

$factory->define(Skill::class, function (Faker $faker) {
    return [
        //
        'skill' => $faker->word,
        'percent' => rand(10,100),
        'category' => function () {
            $data = ['front', 'back', 'others'];
            return $data[rand(0, 2)];
        },
    ];
});
