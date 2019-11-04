<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Admin::class, function (Faker $faker) {
    return [
      'username' => "Admin",
        'email'  => "admin@admin.com", //E-mail: admin@admin.com
        'password' => \Illuminate\Support\Facades\Hash::make('123456') //Password: 123456
    ];
});
