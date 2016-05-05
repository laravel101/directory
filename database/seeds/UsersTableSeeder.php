<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Vedat Furkan Erkul",
            'email' => "vedat.erkul@hotmail.com",
            'password' => bcrypt('secret'),
            'username' => "furkanerkul",
            'is_admin' => 1,
        ]);
    }
}
