<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Work;

$factory->define(Work::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->word,
        'body' => $faker->sentence(),
        'link' => $faker->url,
        'thumbnail' => $faker->imageUrl(),
    ];
});
