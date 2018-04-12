<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $words = $faker->words(2);
    return [
        'name' => studly_case(join('_', $words)),
        'pinyin' => join('-', $words),
        'abbr' => $words[0][0] . $words[1][0]
    ];
});
