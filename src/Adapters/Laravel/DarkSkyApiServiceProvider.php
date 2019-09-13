<?php

namespace DmitryIvanov\DarkSkyApi\Adapters\Laravel;

use DmitryIvanov\DarkSkyApi\Service;
use DmitryIvanov\DarkSkyApi\Parameters;
use Illuminate\Support\ServiceProvider;

class DarkSkyApiServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/dark-sky-api.php', 'dark-sky-api');

        $this->registerApiService();
    }

    /**
     * Register the API service in the container.
     *
     * @return void
     */
    protected function registerApiService()
    {
        $this->app->instance(
            Service::class,
            new Service(config('dark-sky-api.key'), $this->apiServiceParameters())
        );
    }

    /**
     * Compose the API service parameters.
     *
     * @return \DmitryIvanov\DarkSkyApi\Parameters
     */
    protected function apiServiceParameters()
    {
        $parameters = new Parameters;

        $parameters->setUnits(config('dark-sky-api.units'));
        $parameters->setLanguage(config('dark-sky-api.language'));
        $parameters->setExtendedBlocks(config('dark-sky-api.extend'));

        return $parameters;
    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/dark-sky-api.php' => config_path('dark-sky-api.php')]);
    }
}
