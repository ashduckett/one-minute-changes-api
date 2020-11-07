<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Chord;
use App\ChordChange;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName(),
        'lastname' => $faker->lastname(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'verified' => $verified = $faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
        'verification_token' => $verified == User::VERIFIED_USER ? null : User::generateVerificationCode(),
        'admin' => $faker->randomElement([User::ADMIN_USER, User::REGULAR_USER])
    ];
});

$factory->define(Chord::class, function(Faker $faker, $attibutes) {
    return [
        'name' => $attibutes['name']
    ];
});

$factory->define(ChordChange::class, function(Faker $faker, $attibutes) {
    return [
        'position' => $attibutes['position'],
        'to_id' => $attibutes['to_id'],
        'from_id' => $attibutes['from_id']
    ];
});