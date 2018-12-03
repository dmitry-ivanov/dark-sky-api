<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Forecast
{
    /**
     * The HTTP response headers.
     *
     * @see https://darksky.net/dev/docs#response-headers
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Headers
     */
    public function headers();

    /**
     * The requested latitude.
     *
     * @return float|null
     */
    public function latitude();

    /**
     * The requested longitude.
     *
     * @return float|null
     */
    public function longitude();

    /**
     * The IANA timezone name for the requested location.
     *
     * @return string|null
     */
    public function timezone();

    /**
     * A data point containing the current weather conditions at the requested location.
     *
     * @see https://darksky.net/dev/docs#data-point
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataPoint|null
     */
    public function currently();

    /**
     * A data block containing the weather conditions minute-by-minute for the next hour.
     *
     * @see https://darksky.net/dev/docs#data-block
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataBlock|null
     */
    public function minutely();

    /**
     * A data block containing the weather conditions hour-by-hour for the next two days.
     *
     * @see https://darksky.net/dev/docs#data-block
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataBlock|null
     */
    public function hourly();

    /**
     * A data block containing the weather conditions day-by-day for the next week.
     *
     * @see https://darksky.net/dev/docs#data-block
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataBlock|null
     */
    public function daily();

    /**
     * Severe weather warnings issued for the requested location by a governmental authority.
     *
     * @see https://darksky.net/dev/docs#alerts
     *
     * @return array|null
     */
    public function alerts();

    /**
     * Various metadata information related to the request.
     *
     * @see https://darksky.net/dev/docs#flags
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\Flags|null
     */
    public function flags();

    /**
     * Get an array representation of the forecast response.
     *
     * @return array
     */
    public function toArray();
}
