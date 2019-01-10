<?php

namespace DmitryIvanov\DarkSkyApi\Adapters\Laravel\Facades;

use DmitryIvanov\DarkSkyApi\Service;
use Illuminate\Support\Facades\Facade;
use DmitryIvanov\DarkSkyApi\Weather\Forecast;
use DmitryIvanov\DarkSkyApi\Weather\TimeMachine;

/**
 * @method static Service location(float $latitude, float $longitude)
 * @method static Service units(string $units)
 * @method static Service language(string $language)
 * @method static Service extend(string $blocks = 'hourly')
 * @method static Forecast forecast(array|string|null $blocks = null)
 * @method static TimeMachine|TimeMachine[] timeMachine(array|string $dates, array|string|null $blocks = null)
 *
 * @see \DmitryIvanov\DarkSkyApi\Service
 */
class DarkSkyApi extends Facade
{
    /**
     * Get the facade accessor.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return Service::class;
    }
}
