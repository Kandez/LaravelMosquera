<?php

use Faker\Generator as Faker;
use App\petition;


$factory->define(App\petition::class, function (Faker $faker) {
    return [
        'type'=> 'contrato',
        'n_students' =>$faker->randomNumber(1)
    ];
});
