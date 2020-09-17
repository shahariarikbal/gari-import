<?php

use Illuminate\Database\Seeder;

class GeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('genarel_settings')->insert([
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'hotline_number' => '123456789',
            'instagram_link' => 'wwww.instagram.com',
            'facebook_link' => 'wwww.facebook.com',
            'twitter_link' => 'wwww.twitter.com',
            'pinterest_link' => 'wwww.pinterest.com',
            'footer_text' => 'lorem ipsum dorem, lorem ipsum dorem, lorem ipsum dorem',
            'contact_info' => 'Tel :+0123 456 789 4321, Address :148 - Mirpur, Dhaka, Bangladesh, Working Hour :Mon - Sat 09 am - 10 pm'
        ]);
    }
}
