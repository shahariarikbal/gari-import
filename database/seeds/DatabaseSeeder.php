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
         $this->call(UserTableSeeder::class);
         $this->call(CMSPageSeeder::class);
         $this->call(AboutUsTableSeeder::class);
         $this->call(TermsConditionSeeder::class);
         $this->call(StockTableSeeder::class);
        $this->call([
            GeneralTableSeeder::class
        ]);
    }
}
