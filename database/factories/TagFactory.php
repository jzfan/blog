<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    $word = $faker->words(2);
    return [
        'name' => join(' ', $word),
        'pinyin' => join('-', $word),
        'abbr' => $word[0][0] . $word[1][0]
    ];
});
