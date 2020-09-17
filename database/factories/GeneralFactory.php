<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GenarelSetting;
use Faker\Generator as Faker;

$factory->define(GenarelSetting::class, function (Faker $faker) {
    return [
        'logo' => $faker->image('public/images',192,90, null, false),
        'favicon' => $faker->image('public/images',10,10, null, false),
        'hotline_number' => $faker->phoneNumber,
        'instagram_link' => $faker->url,
        'facebook_link' => $faker->url,
        'twitter_link' => $faker->url,
        'pinterest_link' => $faker->url,
        'footer_text' => $faker->sentence,
        'contact_info' => $faker->address,
    ];
});
