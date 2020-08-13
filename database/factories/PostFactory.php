<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->title,
        'content' => $faker->text,
        'status' => 1,
        'picture' => $faker->imageUrl(400, 160)
    ];
});
