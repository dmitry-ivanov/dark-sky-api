<?php

namespace DmitryIvanov\DarkSkyApi;

use DmitryIvanov\DarkSkyApi\Http\Api;
use DmitryIvanov\DarkSkyApi\Validation\Validator;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Api as ApiContract;
use DmitryIvanov\DarkSkyApi\Contracts\Service as ServiceContract;
use DmitryIvanov\DarkSkyApi\Contracts\Parameters as ParametersContract;
use DmitryIvanov\DarkSkyApi\Contracts\Validation\Validator as ValidatorContract;

class Service implements ServiceContract
{
    /**
     * The parameters.
     *
     * @var \DmitryIvanov\DarkSkyApi\Contracts\Parameters
     */
    protected $parameters;

    /**
     * The validator.
     *
     * @var \DmitryIvanov\DarkSkyApi\Contracts\Validation\Validator
     */
    protected $validator;

    /**
     * The HTTP API.
     *
     * @var \DmitryIvanov\DarkSkyApi\Contracts\Http\Api
     */
    protected $api;

    /**
     * Create a new instance of the Dark Sky API service.
     *
     * @param  string  $apiKey
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters|null  $parameters
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Validation\Validator|null  $validator
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Http\Api|null  $api
     * @return void
     */
    public function __construct($apiKey, ParametersContract $parameters = null, ValidatorContract $validator = null, ApiContract $api = null)
    {
        $this->parameters = !is_null($parameters) ? $parameters : new Parameters;
        $this->validator = !is_null($validator) ? $validator : new Validator;
        $this->api = !is_null($api) ? $api : new Api;

        $this->parameters->setApiKey($apiKey);
    }

    /**
     * Get the parameters.
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Parameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set the location.
     *
     * @param  float  $latitude
     * @param  float  $longitude
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
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
     * @param  string  $units
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function units($units)
    {
        $this->parameters->setUnits($units);

        return $this;
    }

    /**
     * Set the language.
     *
     * @param  string  $language
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function language($language)
    {
        $this->parameters->setLanguage($language);

        return $this;
    }

    /**
     * Set the extended blocks.
     *
     * @param  string  $blocks
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Service
     */
    public function extend($blocks = 'hourly')
    {
        $this->parameters->setExtendedBlocks($blocks);

        return $this;
    }

    /**
     * Get the weather forecast data.
     *
     * @param  array|string|null  $blocks
     * @return array
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     * @throws \InvalidArgumentException on `json_decode()` error
     */
    public function forecast($blocks = null)
    {
        return $this->request($blocks);
    }

    /**
     * Get the observed weather data for a given dates.
     *
     * @param  array|string  $dates
     * @param  array|string|null  $blocks
     * @return array
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     * @throws \InvalidArgumentException on `json_decode()` error
     */
    public function timeMachine($dates, $blocks = null)
    {
        $this->parameters->setDates($dates);

        return $this->request($blocks);
    }

    /**
     * Make the API request.
     *
     * @param  array|string|null  $blocks
     * @return array
     *
     * @throws \Exception on HTTP error
     * @throws \Throwable on HTTP error in PHP >=7
     * @throws \InvalidArgumentException on `json_decode()` error
     */
    protected function request($blocks)
    {
        $this->parameters->setBlocks($blocks);

        $this->validator->validate($this->parameters);

        return $this->api->request($this->parameters);
    }
}
