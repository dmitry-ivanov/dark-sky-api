<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Alert
{
    /**
     * A detailed description of the alert.
     *
     * @return string|null
     */
    public function description();

    /**
     * The UNIX time at which the alert will expire.
     *
     * @return int|null
     */
    public function expires();

    /**
     * The names of the regions covered by this weather alert.
     *
     * @return array|null
     */
    public function regions();

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
    public function severity();

    /**
     * The UNIX time at which the alert was issued.
     *
     * @return int|null
     */
    public function time();

    /**
     * A brief description of the alert.
     *
     * @return string|null
     */
    public function title();

    /**
     * An HTTP(S) URI that one may refer to for detailed information about the alert.
     *
     * @return string|null
     */
    public function uri();

    /**
     * Get an array representation of the alert.
     *
     * @return array
     */
    public function toArray();
}
