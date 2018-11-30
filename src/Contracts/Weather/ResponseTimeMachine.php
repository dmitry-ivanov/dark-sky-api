<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface ResponseTimeMachine extends ResponseForecast
{
    /**
     * A data point containing the weather conditions for the requested time.
     *
     * @see https://darksky.net/dev/docs#data-point
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataPoint|null
     */
    public function currently();

    /**
     * A data block containing the weather conditions minute-by-minute for the requested hour.
     *
     * It will be omitted, unless you are requesting a time within an hour of the present.
     * @see https://darksky.net/dev/docs#data-block
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataBlock|null
     */
    public function minutely();

    /**
     * A data block containing the weather conditions hour-by-hour for the requested date.
     *
     * @see https://darksky.net/dev/docs#data-block
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataBlock|null
     */
    public function hourly();

    /**
     * A data point containing the weather conditions for the requested date.
     *
     * @see https://darksky.net/dev/docs#data-point
     *
     * @return \DmitryIvanov\DarkSkyApi\Contracts\Weather\DataPoint|null
     */
    public function daily();
}
