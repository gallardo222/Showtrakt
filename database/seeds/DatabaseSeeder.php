<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'manolo',
            'email' => 'algo@algo.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
