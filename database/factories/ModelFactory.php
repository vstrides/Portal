<?php

use App\Tag;
use App\User;
use App\Answer;
use App\Comment;
use App\Category;
use App\Question;
use App\Question_Tag;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Question::class, function (Faker\Generator $faker) {
    return [
        'user_id' => User::orderBy(DB::raw('RAND()'))->first()->id,
        'category_id' => Category::orderBy(DB::raw('RAND()'))->first()->id,
        'title' => $faker->sentence . "?",
        'body' => $faker->paragraph(40, true),
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word
    ];
});

$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word
    ];
});

$factory->define(Question_Tag::class, function (Faker\Generator $faker) {
    return [
        'question_id' => Question::orderBy(DB::raw('RAND()'))->first()->id,
        'tag_id' => Tag::orderBy(DB::raw('RAND()'))->first()->id,
    ];
});

$factory->define(Answer::class, function (Faker\Generator $faker) {
    return [
        'user_id' => User::orderBy(DB::raw('RAND()'))->first()->id,
        'question_id' => Question::orderBy(DB::raw('RAND()'))->first()->id,
        'body' => $faker->paragraph(40, true)
    ];
});

$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => User::orderBy(DB::raw('RAND()'))->first()->id,
        'answer_id' => Answer::orderBy(DB::raw('RAND()'))->first()->id,
        'body' => $faker->sentence(20, true)
    ];
});