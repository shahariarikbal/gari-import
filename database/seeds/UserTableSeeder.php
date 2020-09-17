<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Gari import',
            'email' => 'support@gari-import.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
