<?php

namespace Modules\Core\Providers;

use Nwidart\Modules\Module;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as ModelFactory;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->app['modules']->allEnabled() as $module) {
            $this->loadViews($module);
            $this->loadTranslations($module);
            $this->loadConfigs($module);
            $this->loadMigrations($module);
            $this->loadModelFactories($module);
        }
    }


    /**
     * Load views for the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function loadViews(Module $module)
    {
        $this->loadViewsFrom("{$module->getPath()}/Resources/views", $module->get('alias'));
    }


    /**
     * Load translations for the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function loadTranslations(Module $module)
    {
        $this->loadTranslationsFrom("{$module->getPath()}/Resources/lang", $module->get('alias'));
    }


    /**
     * Load migrations for the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function loadConfigs(Module $module)
    {
        collect([
            'config' => "{$module->getPath()}/Config/config.php",
            'permissions' => "{$module->getPath()}/Config/permissions.php",
        ])->filter(function ($path) {
            return file_exists($path);
        })->each(function ($path, $filename) use ($module) {
            $this->mergeConfigFrom($path, "niceshop.modules.{$module->get('alias')}.{$filename}");
        });
    }


    /**
     * Load migrations for the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function loadMigrations(Module $module)
    {
        $this->loadMigrationsFrom("{$module->getPath()}/Database/Migrations");
    }


    /**
     * Load model factories for the given module.
     *
     * @param Module $module
     *
     * @return void
     */
    private function loadModelFactories(Module $module)
    {
        $this->callAfterResolving(ModelFactory::class, function (ModelFactory $factory) use ($module) {
            $factory->load("{$module->getPath()}/Database/Factories");
        });
    }
}
