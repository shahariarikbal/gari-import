<?php

use Illuminate\Database\Seeder;

class CMSPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cms_pages')->insert([
            'name' => 'Home',
            'title' => 'support@gari-import.com',
            'meta_keyword' => 'Some meta keyword here',
            'meta_description' => 'Some meta description here',
            'status' => 1,
        ]);
    }
}
