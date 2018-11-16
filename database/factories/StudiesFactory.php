<?php

use Faker\Generator as Faker;
use App\student;
use App\grade;

$factory->define(App\studies::class, function (Faker $faker) {
    return [
        'id_student' => \App\student::all()->random()->id,
        'id_grade' => \App\grade::all()->random()->id,
    ];
});
