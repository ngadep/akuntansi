<?php

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

$factory->define(Akuntansi\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Akuntansi\Models\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'address'=> $faker->address,
        'telephone'=> $faker->phoneNumber,
        'email'=> $faker->companyEmail,
        // karena tidak ada pilihan untuk Taxpayer Registration Number
        'npwp'=> $faker->creditCardNumber,
        // n Numeric representation of a month, without leading zeros
        // menggunakan date() bukan $faker->year|month karena
        // inggin mendapatkan bulan dan tahun sekarang bukan bulan dan tahun acak.
        'month_period'=> date("n"),
        'year_period'=>date("Y"),
        'information'=>"company",
        // default 0. karena, field ini digunakan untuk menggetahui siapa yang merubah data.
        'user_id'=>0,
    ];
});
