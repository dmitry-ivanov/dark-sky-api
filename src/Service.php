<?php

namespace DmitryIvanov\DarkSkyApi;

use DmitryIvanov\DarkSkyApi\Http\Api;
use DmitryIvanov\DarkSkyApi\Validation\Validator;

class Service
{
    /**
     * The parameters.
     *
     * @var \DmitryIvanov\DarkSkyApi\Parameters
     */
    protected $parameters;

    /**
     * The validator.
     *
     * @var \DmitryIvanov\DarkSkyApi\Validation\Validator
     */
    protected $validator;

    /**
     * The HTTP API.
     *
     * @var \DmitryIvanov\DarkSkyApi\Http\Api
     */
    protected $api;

    /**
     * Create a new instance of the Dark Sky API service.
     *
     * @param  string  $apiKey
     * @param  \DmitryIvanov\DarkSkyApi\Parameters|null  $parameters
     * @param  \DmitryIvanov\DarkSkyApi\Validation\Validator|null  $validator
     * @param  \DmitryIvanov\DarkSkyApi\Http\Api|null  $api
     * @return void
     */
    public function __construct($apiKey, Parameters $parameters = null, Validator $validator = null, Api $api = null)
    {
        $this->parameters = !is_null($parameters) ? $parameters : new Parameters;
        $this->validator = !is_null($validator) ? $validator : new Validator;
        $this->api = !is_null($api) ? $api : new Api;

        $this->parameters->setApiKey($apiKey);
    }

    /**
     * Get the parameters.
     *
     * @return \DmitryIvanov\DarkSkyApi\Parameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set the location.
     *
     * @see https://darksky.net/dev/docs#request-parameters
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @return $this
     */
    public function location($latitude, $longitude)
    {
        $this->parameters->setLatitude($latitude);
        $this->parameters->setLongitude($longitude);

        return $this;
    }

    /**
     * Set the units.
     *
     * @see https://darksky.net/dev/docs#request-parameters
     *
     * @param  string  $units
     * @return $this
     */
    public function units($units)
    {
        $this->parameters->setUnits($units);

        return $this;
    }

    /**
     * Set the language.
     *
     * @see https://darksky.net/dev/docs#request-parameters
     *
     * @param  string  $language
     * @return $this
     */
    public function language($language)
    {
        $this->parameters->setLanguage($language);

        return $this;
    }

    /**
     * Set the extended blocks.
     *
     * @see https://darksky.net/dev/docs#request-parameters
     *
     * @param  string  $blocks
     * @return $this
     */
    public function extend($blocks = 'hourly')
    {
        $this->parameters->setExtendedBlocks($blocks);

        return $this;
    }

    /**
     * Get the weather forecast.
     *
     * @see https://darksky.net/dev/docs#forecast-request
     *
     * @param  array|string|null  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Weather\Forecast
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     */
    public function forecast($blocks = null)
    {
        $this->parameters->setBlocks($blocks);

        $this->validator->validate($this->parameters);

        return $this->api->forecast($this->parameters);
    }

    /**
     * Get the observed weather for the given date(s).
     *
     * @see https://darksky.net/dev/docs#time-machine-request
     *
     * @param  array|string  $dates
     * @param  array|string|null  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Weather\TimeMachine|\DmitryIvanov\DarkSkyApi\Weather\TimeMachine[]
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     */
    public function timeMachine($dates, $blocks = null)
    {
        $this->parameters->setDates($dates);
        $this->parameters->setBlocks($blocks);

        $this->validator->validate($this->parameters);

        return $this->api->timeMachine($this->parameters);
    }
}
