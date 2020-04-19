<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\WebSetting::create([
            'site_name'=>"Spread",
            "contact_email"=>"ahmedmushtaq296@gmail.com"
        ]);
    }
}
