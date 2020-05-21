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
            'name' => 'Zalo',
            'email' => 'user1@user1.com',
            'password' => Hash::make('123456'),
            'custom_title' => 'Wizard of Oz',
            'admin' => true
        ]);
        DB::table('users')->insert([
            'name' => 'Manolo',
            'email' => 'user2@user2.com',
            'password' => Hash::make('123456'),
            'custom_title' => 'Wizard of Oz',
            'admin' => false
        ]);
        DB::table('users')->insert([
            'name' => 'Benito',
            'email' => 'user3@user3.com',
            'password' => Hash::make('123456'),
            'custom_title' => 'Wizard of Oz',
            'admin' => false
        ]);
    }
}
