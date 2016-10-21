<?php

/*
|--------------------------------------------------------------------------
| Report Factory
|--------------------------------------------------------------------------
|
| This creates  a report factory for seeding the database.
|
*/

$factory->define(Pathology\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'gender' => $faker->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'dob' => $faker->date(),
        'patient_id' => $faker->randomNumber(6),
        'pass_code' => $faker->randomNumber(6)
    ];
});

$factory->defineAs(Pathology\User::class, 'operator', function (Faker\Generator $faker) {
    return [
        'name' => "admin",
        'gender' => "male",
        'role' => 1,
        'phone_number' => "+2348104945994",
        'dob' => "1992-10-02",
        'patient_id' => 123456,
        'pass_code' => 456092
    ];
});
