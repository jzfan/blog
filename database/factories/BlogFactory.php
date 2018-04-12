<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return factory('App\Category')->create()->id;
        },
        'content' => join(PHP_EOL, $faker->paragraphs(rand(2, 5)))
    ];
});
