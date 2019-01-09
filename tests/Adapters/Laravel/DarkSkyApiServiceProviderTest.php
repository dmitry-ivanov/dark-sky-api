<?php

namespace Tests\Adapters\Laravel;

use Mockery;
use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use DmitryIvanov\DarkSkyApi\Adapters\Laravel\DarkSkyApiServiceProvider;

class DarkSkyApiServiceProviderTest extends TestCase
{
    /** @test */
    public function it_extends_the_base_service_provider_class()
    {
        $this->assertSubclassOf(DarkSkyApiServiceProvider::class, ServiceProvider::class);
    }

    /** @test */
    public function it_is_deferred()
    {
        $app = spy(Application::class);

        $serviceProvider = new DarkSkyApiServiceProvider($app);

        $this->assertTrue($serviceProvider->isDeferred());
    }

    /** @test */
    public function it_provides_binding_for_the_api_service_class()
    {
        $app = spy(Application::class);

        $serviceProvider = new DarkSkyApiServiceProvider($app);

        $this->assertEquals([Service::class], $serviceProvider->provides());
    }

    /** @test */
    public function it_merges_the_configuration_while_the_registering()
    {
        $serviceProvider = mock(DarkSkyApiServiceProvider::class);

        $serviceProvider->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $serviceProvider->shouldReceive('registerApiService')
            ->withNoArgs();

        $serviceProvider->shouldReceive('mergeConfigFrom')->once()
            ->with(Mockery::on([$this, 'matchesPackageConfigPath']), 'dark-sky-api');

        $serviceProvider->register();
    }

    /** @test */
    public function it_registers_and_setups_the_api_service_in_the_container()
    {
        $app = mock(Application::class);
        $serviceProvider = mock(DarkSkyApiServiceProvider::class, [$app]);

        $serviceProvider->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $serviceProvider->shouldReceive('mergeConfigFrom')
            ->withAnyArgs();

        $app->shouldReceive('instance')
            ->with(Service::class, Mockery::on(function (Service $service) {
                $parameters = $service->getParameters();

                return ($parameters->getApiKey() == config('dark-sky-api.key'))
                    && ($parameters->getUnits() == config('dark-sky-api.units'))
                    && ($parameters->getLanguage() == config('dark-sky-api.language'))
                    && ($parameters->getExtendedBlocks() == config('dark-sky-api.extend'));
            }));

        $serviceProvider->register();
    }

    /** @test */
    public function it_publishes_the_configuration_while_the_booting()
    {
        $serviceProvider = mock(DarkSkyApiServiceProvider::class);

        $serviceProvider->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $serviceProvider->shouldReceive('publishes')->once()
            ->with(Mockery::on(function (array $paths) {
                if (count($paths) != 1) {
                    return false;
                }

                $from = array_keys($paths)[0];
                $to = array_values($paths)[0];

                return $this->matchesPackageConfigPath($from)
                    && ($to === config_path('dark-sky-api.php'));
            }));

        $serviceProvider->boot();
    }

    /**
     * Check if a given path matches the package config path.
     *
     * @param  string  $path
     * @return bool
     */
    public function matchesPackageConfigPath($path)
    {
        return (bool) preg_match($this->packageConfigPathPattern(), $path);
    }

    /**
     * Compose the package config path pattern.
     *
     * @return string
     */
    protected function packageConfigPathPattern()
    {
        $pattern = preg_quote('/config/dark-sky-api.php', '/');

        return "/{$pattern}$/";
    }
}
