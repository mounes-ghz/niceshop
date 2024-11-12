<?php

namespace NiceShop\Install;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class Database
{
    public function setup($request): void
    {
        $this->setupDatabaseConnection($request);
        $this->setEnvVariables($request);
        $this->migrateDatabase();
        $this->copyMedia();
        $this->seedDatabase();
    }


    private function setupDatabaseConnection($request): void
    {
        DB::purge('mysql');
        $this->setupDatabaseConnectionConfig($request);
        DB::connection('mysql')->reconnect();
        DB::connection('mysql')->getPdo();
    }


    private function setupDatabaseConnectionConfig($request): void
    {
        config([
            'database.default' => 'mysql',
            'database.connections.mysql.host' => $request['db_host'],
            'database.connections.mysql.port' => $request['db_port'],
            'database.connections.mysql.database' => $request['db_database'],
            'database.connections.mysql.username' => $request['db_username'],
            'database.connections.mysql.password' => $request['db_password'],
        ]);
    }


    private function setEnvVariables($request): void
    {
        $env = DotenvEditor::load();

        $env->setKey('DB_HOST', $request['db_host']);
        $env->setKey('DB_PORT', $request['db_port']);
        $env->setKey('DB_DATABASE', $request['db_database']);
        $env->setKey('DB_USERNAME', $request['db_username']);
        $env->setKey('DB_PASSWORD', $request['db_password']);

        $env->save();
    }


    private function migrateDatabase(): void
    {
        Artisan::call('migrate', ['--force' => true]);
    }

    private function seedDatabase(): void
    {
        Artisan::call('module:seed', [
            'module' => 'Media',
            '--force' => true,
        ]);
        Artisan::call('module:seed', [
            'module' => 'Page',
            '--force' => true,
        ]);
        Artisan::call('module:seed', [
            'module' => 'Brand',
            '--force' => true,
        ]);
        Artisan::call('module:seed', [
            'module' => 'Category',
            '--force' => true,
        ]);
        Artisan::call('module:seed', [
            'module' => 'Product',
            '--force' => true,
        ]);
        Artisan::call('module:seed', [
            'module' => 'Menu',
            '--force' => true,
        ]);
        Artisan::call('module:seed', [
            'module' => 'FlashSale',
            '--force' => true,
        ]);
        Artisan::call('module:seed', [
            'module' => 'Slider',
            '--force' => true,
        ]);
        Artisan::call('module:seed', [
            'module' => 'Setting',
            '--force' => true,
        ]);
    }

    private function copyMedia(): void
    {
        // Define the source and destination paths
        $source = base_path('modules/Storefront/Resources/assets/public/media');
        $destination = public_path('storage/media');

        // Ensure destination directory exists, or create it
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        // Copy all files from source to destination
        File::copyDirectory($source, $destination);
    }
}
