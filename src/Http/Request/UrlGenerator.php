<?php

namespace DmitryIvanov\DarkSkyApi\Http\Request;

use DmitryIvanov\DarkSkyApi\Http\Url;
use DmitryIvanov\DarkSkyApi\Parameters;
use DmitryIvanov\DarkSkyApi\Http\UrlMetadata;

class UrlGenerator
{
    /**
     * Generate the request URL(s) by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Http\Url|\DmitryIvanov\DarkSkyApi\Http\Url[]
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
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
     * @return \DmitryIvanov\DarkSkyApi\Http\Url
     */
    protected function forecastUrl(Parameters $parameters)
    {
        $key = $parameters->getApiKey();

        $latitude = round($parameters->getLatitude(), 3);
        $longitude = round($parameters->getLongitude(), 3);

        $latitude = number_format($latitude, 3);
        $longitude = number_format($longitude, 3);

        return new Url("https://api.darksky.net/forecast/{$key}/{$latitude},{$longitude}");
    }

    /**
     * Compose the "time machine" URL by the given parameters and date.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
     * @param  string  $date
     * @return \DmitryIvanov\DarkSkyApi\Http\Url
     */
    protected function timeMachineUrl(Parameters $parameters, $date)
    {
        $forecastUrl = $this->forecastUrl($parameters)->value();

        $urlDate = date('Y-m-d\TH:i:s', strtotime($date));

        return new Url("{$forecastUrl},{$urlDate}", new UrlMetadata($date));
    }
}
