<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'id_role' => 3,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Buku::class,function (Faker $faker){
    $jenis = ['Fiksi', 'Sejarah', 'Novel', 'Cerita'];
    $random = array_rand($jenis, 1);
    return [
        'isbn' => $faker->unique()->isbn13,
        'judul' => $faker->catchPhrase,
        'jenis' => $jenis[$random],
        'pengarang' => $faker->name,
        'penerbit' => $faker->company,
        'tahun' => $faker->year($max = 'now'), 
        'stok' => 20,
        'image' => 'cover.png'
    ];
});
