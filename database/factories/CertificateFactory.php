<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Certificate;
use Faker\Generator as Faker;

$factory->define(Certificate::class, function (Faker $faker) {
    return [
        'course_name'=> $faker->randomElement(['HTML','JAVA','PHP']), // array('c')
        'course_code'=> $faker->randomElement(['HTML01','JAVA02','PHP03']), // array('c')
        'student_name'=> $faker->name(), // array('c')
        'student_age'=> $faker->numberBetween(10,60),
        'skill'=> $faker->randomElement(['html','css','javascript']),

    ];
});
