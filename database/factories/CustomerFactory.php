<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory
$table->string('name');
$table->string('surname');
$table->string('address');
$table->string('telephone');

 */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname' => $faker->surname,
        'address' => $faker->address,
        'telephone' => $faker->phoneNumber,

    ];
});
