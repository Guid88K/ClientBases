<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientTableSeeder extends Seeder
{
    /**
     *  $table->string('name');
    $table->string('surname');
    $table->string('address');
    $table->string('telephone');
    $table->integer('user_id');
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'address' => Str::random(10),
            'telephone' => Str::random(10),
            'user_id' => '2',
        ]);
    }
}
