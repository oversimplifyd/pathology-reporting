<?php

/*
|--------------------------------------------------------------------------
| Test Factory
|--------------------------------------------------------------------------
|
| This creates  a report factory for seeding the database.
|
*/

$factory->define(Pathology\Test::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->realText(),
        'purpose' => $faker->realText(),
        'result' => $faker->realText(),
        'received_at' => $faker->date(),
        'completed_at' => $faker->date(),
        'report_id' => function () {
            return factory(Pathology\Report::class)->create()->id;
        }
    ];
});

$factory->defineAs(Pathology\Test::class, 'static', function (Faker\Generator $faker) {
    return [
        'description' => $faker->realText(),
        'purpose' => $faker->realText(),
        'result' => $faker->realText(),
        'received_at' => $faker->date(),
        'completed_at' => $faker->date(),
        'report_id' => function () {
            return factory(Pathology\Report::class)->create()->id;
        }
    ];
});