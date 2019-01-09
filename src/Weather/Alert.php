<?php

namespace DmitryIvanov\DarkSkyApi\Weather;

class Alert
{
    /**
     * The alert.
     *
     * @var array
     */
    protected $alert;

    /**
     * Create a new instance of the weather alert.
     *
     * @param  array  $alert
     * @return void
     */
    public function __construct(array $alert)
    {
        $this->alert = $alert;
    }

    /**
     * A detailed description of the alert.
     *
     * @return string|null
     */
    public function description()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->alert, 'description');
    }

    /**
     * The UNIX time at which the alert will expire.
     *
     * @return int|null
     */
    public function expires()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->alert, 'expires');
    }

    /**
     * The names of the regions covered by this weather alert.
     *
     * @return array|null
     */
    public function regions()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->alert, 'regions');
    }

    /**
     * The severity of the weather alert.
     *
     * Will take one of the following values:
     * "advisory" - an individual should be aware of potentially severe weather,
     * "watch" - an individual should prepare for potentially severe weather,
     * "warning" - an individual should take immediate action to protect themselves and others
     *             from potentially severe weather.
     *
     * @return string|null
     */
    public function severity()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->alert, 'severity');
    }

    /**
     * The UNIX time at which the alert was issued.
     *
     * @return int|null
     */
    public function time()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->alert, 'time');
    }

    /**
     * A brief description of the alert.
     *
     * @return string|null
     */
    public function title()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->alert, 'title');
    }

    /**
     * An HTTP(S) URI that one may refer to for detailed information about the alert.
     *
     * @return string|null
     */
    public function uri()
    {
        return \DmitryIvanov\DarkSkyApi\array_get($this->alert, 'uri');
    }

    /**
     * Get an array representation of the alert.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->alert;
    }
}
