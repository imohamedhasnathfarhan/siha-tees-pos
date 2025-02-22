<?php

namespace Database\Seeders;


use Dipokhalder\EnvEditor\EnvEditor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Smartisan\Settings\Facades\Settings;

class LicenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $envService = new EnvEditor();
        Settings::group('license')->set([
            'license_key' => $envService->getValue('MIX_API_KEY')
        ]);
        if ($envService->getValue('DEMO')) {
            Settings::group('license')->set([
                'license_key' => 'k8r05ti8-c7b2-41p3-1956-k516m31017k123'
            ]);
            $envService->addData(['MIX_API_KEY' => 'k8r05ti8-c7b2-41p3-1956-k516m31017k123']);
            Artisan::call('optimize:clear');
        }
    }
}