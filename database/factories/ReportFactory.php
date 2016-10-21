<?php

/*
|--------------------------------------------------------------------------
| Report Factory
|--------------------------------------------------------------------------
|
| This creates  a report factory for seeding the database.
|
*/

$factory->define(Pathology\Report::class, function (Faker\Generator $faker) {
    return [
        'summary' => $faker->realText(),
        'user_id' =>  function () {
            return factory(Pathology\User::class)->create()->id;
        }
    ];
});

