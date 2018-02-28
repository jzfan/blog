<?php

use Faker\Generator as Faker;

$factory->define(App\Paragraph::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'category_id' => function () {
            return factory('App\Category')->create()->id;
        }
    ];
});
