<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Admin;
use Illuminate\Support\Str;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        //
        'account' => Str::random(10),
        'nickname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
    ];
});
