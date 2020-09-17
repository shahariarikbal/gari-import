<?php

use Illuminate\Database\Seeder;

class CmsPageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['id' => '1', 'cms_page_id' => '1', 'settings_key' => 'service_box_icon_1', 'value' => 'service_box_icon_1.png', 'status' => 1,]
        ];
        foreach($services as $service){
            \App\CmsPageSetting::create($service);
        }
    }
}
