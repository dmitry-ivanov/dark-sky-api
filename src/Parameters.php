<?php

namespace DmitryIvanov\DarkSkyApi;

class Parameters
{
    /**
     * The API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The latitude.
     *
     * @var float
     */
    protected $latitude;

    /**
     * The longitude.
     *
     * @var float
     */
    protected $longitude;

    /**
     * The units.
     *
     * @var string|null
     */
    protected $units;

    /**
     * The language.
     *
     * @var string|null
     */
    protected $language;

    /**
     * The dates for the time machine requests.
     *
     * @var array|string|null
     */
    protected $dates;

    /**
     * The blocks.
     *
     * @var array|string|null
     */
    protected $blocks;

    /**
     * The extended blocks.
     *
     * @var string|null
     */
    protected $extendedBlocks;

    /**
     * Get the API key.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set the API key.
     *
     * @param  string  $apiKey
     * @return void
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get the latitude.
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set the latitude.
     *
     * @param  float  $latitude
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get the longitude.
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set the longitude.
     *
     * @param  float  $longitude
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get the units.
     *
     * @return string|null
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set the units.
     *
     * @param  string|null  $units
     * @return void
     */
    public function setUnits($units)
    {
        $this->units = $units;
    }

    /**
     * Get the language.
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set the language.
     *
     * @param  string|null  $language
     * @return void
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Get the dates.
     *
     * @return array|string|null
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Set the dates.
     *
     * @param  array|string|null  $dates
     * @return void
     */
    public function setDates($dates)
    {
        $this->dates = $dates;
    }

    /**
     * Get the blocks.
     *
     * @return array|string|null
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * Set the blocks.
     *
     * @param  array|string|null  $blocks
     * @return void
     */
    public function setBlocks($blocks)
    {
        $this->blocks = $blocks;
    }

    /**
     * Get the extended blocks.
     *
     * @return string|null
     */
    public function getExtendedBlocks()
    {
        return $this->extendedBlocks;
    }

    /**
     * Set the extended blocks.
     *
     * @param  string|null  $blocks
     * @return void
     */
    public function setExtendedBlocks($blocks)
    {
        $this->extendedBlocks = $blocks;
    }
}
