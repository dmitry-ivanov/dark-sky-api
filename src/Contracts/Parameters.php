<?php

namespace DmitryIvanov\DarkSkyApi\Contracts;

interface Parameters
{
    /**
     * Get the API key.
     *
     * @return string
     */
    public function getApiKey();

    /**
     * Set the API key.
     *
     * @param  string  $apiKey
     * @return void
     */
    public function setApiKey($apiKey);

    /**
     * Get the latitude.
     *
     * @return float
     */
    public function getLatitude();

    /**
     * Set the latitude.
     *
     * @param  float  $latitude
     * @return void
     */
    public function setLatitude($latitude);

    /**
     * Get the longitude.
     *
     * @return float
     */
    public function getLongitude();

    /**
     * Set the longitude.
     *
     * @param  float  $longitude
     * @return void
     */
    public function setLongitude($longitude);

    /**
     * Get the units.
     *
     * @return string|null
     */
    public function getUnits();

    /**
     * Set the units.
     *
     * @param  string|null  $units
     * @return void
     */
    public function setUnits($units);

    /**
     * Get the language.
     *
     * @return string|null
     */
    public function getLanguage();

    /**
     * Set the language.
     *
     * @param  string|null  $language
     * @return void
     */
    public function setLanguage($language);

    /**
     * Get the dates.
     *
     * @return array|string|null
     */
    public function getDates();

    /**
     * Set the dates.
     *
     * @param  array|string|null  $dates
     * @return void
     */
    public function setDates($dates);

    /**
     * Get the blocks.
     *
     * @return array|string|null
     */
    public function getBlocks();

    /**
     * Set the blocks.
     *
     * @param  array|string|null  $blocks
     * @return void
     */
    public function setBlocks($blocks);

    /**
     * Get the extended blocks.
     *
     * @return string|null
     */
    public function getExtendedBlocks();

    /**
     * Set the extended blocks.
     *
     * @param  string|null  $blocks
     * @return void
     */
    public function setExtendedBlocks($blocks);
}
