<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Portfolio::class, function (Faker $faker) {
    return [
        'title' => [
            'ru' => $faker->text(30) . 'RU',
            'en' => $faker->text(30) . 'EN',
        ],
        'description' => [
            'ru' => 'RU' . $faker->realText(400),
            'en' => 'EN' . $faker->text(400),
        ],
        'link' => $faker->url,
        'dir_path' => 'template',
        'user_id' => (\App\Models\User::first(['id']))->id,
        'published_at' => now()
    ];
});