<?php

use Faker\Generator as Faker;

$factory->define(App\Paragraph::class, function (Faker $faker) {
    return [
        'content' => join(PHP_EOL, $faker->paragraphs(rand(2, 3))),
        'category_id' => function () {
            return factory('App\Category')->create()->id;
        }
    ];
});
