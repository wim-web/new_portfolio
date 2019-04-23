<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Work;

$factory->define(Work::class, function (Faker $faker) {
    return [
        //
        'title' => 'titletitletitletitle',
        'body' => '本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文　本文',
        'link' => $faker->url,
        'thumbnail' => $faker->imageUrl(),
    ];
});
