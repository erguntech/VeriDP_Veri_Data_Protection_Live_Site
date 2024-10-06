<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSettingsSeeder extends Seeder
{
    public function run(): void
    {
        settings()->set([
            'app_name' => 'Veri.DP - KVKK Takip ve Yönetim Yazılımı',
            'app_title' => 'Veri.DP | Data Protection',
            'app_alias' => 'Veri.DP',
            'app_domain' => 'https://www.veridp.com',
            'app_email' => 'info@veridp.com',
            'app_version' => 'v1.0',
            'app_description' => 'Veri.DP - KVKK Takip ve Yönetim Yazılımı',
            'app_keywords' => 'Veri.DP - KVKK Takip ve Yönetim Yazılımı',
            'app_auto_logout_duration' => '180', // Minutes
            'app_auto_suspend_days' => '3', // Days
        ]);
    }
}
