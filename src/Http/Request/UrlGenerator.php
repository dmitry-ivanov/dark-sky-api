<?php

namespace DmitryIvanov\DarkSkyApi\Http\Request;

use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;
use DmitryIvanov\DarkSkyApi\Contracts\Parameters;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Request\UrlGenerator as UrlGeneratorContract;

class UrlGenerator implements UrlGeneratorContract
{
    /**
     * Generate the request URL(s) by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Url|array
     */
    public function generate(Parameters $parameters)
    {
        $dates = $parameters->getDates();

        if (is_null($dates)) {
            return $this->forecastUrl($parameters);
        }

        if (is_string($dates)) {
            return $this->timeMachineUrl($parameters, $dates);
        }

        if (count($dates) == 1) {
            return $this->timeMachineUrl($parameters, array_shift($dates));
        }

        return array_map(function ($date) use ($parameters) {
            return $this->timeMachineUrl($parameters, $date);
        }, $dates);
    }

    /**
     * Compose the forecast URL by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Url
     */
    protected function forecastUrl(Parameters $parameters)
    {
        $key = $parameters->getApiKey();

        $latitude = round($parameters->getLatitude(), 3);
        $longitude = round($parameters->getLongitude(), 3);

        return new Url("https://api.darksky.net/forecast/{$key}/{$latitude},{$longitude}");
    }

    /**
     * Compose the "time machine" URL by the given parameters and date.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @param  string  $date
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Http\Url
     */
    protected function timeMachineUrl(Parameters $parameters, $date)
    {
        $forecastUrl = $this->forecastUrl($parameters)->value();

        $urlDate = date('Y-m-d\TH:i:s', strtotime($date));

        return new Url("{$forecastUrl},{$urlDate}", new UrlMetadata($date));
    }
}
