<?php

use Faker\Generator as Faker;

$factory->define(App\Paragraph::class, function (Faker $faker) {
    return [
        'content' => join(PHP_EOL, $faker->paragraphs(rand(2, 3))),
        'category' => array_random(['character', 'scene', 'polt', 'others'])
    ];
});
