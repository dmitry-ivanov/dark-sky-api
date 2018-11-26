<?php

namespace DmitryIvanov\DarkSkyApi\Contracts\Weather;

interface Alert
{
    /**
     * Get the description.
     *
     * A detailed description of the alert.
     *
     * @return string|null
     */
    public function description();

    /**
     * Get the expiration time.
     *
     * The UNIX time at which the alert will expire.
     *
     * @return int|null
     */
    public function expires();

    /**
     * Get the regions.
     *
     * An array of strings representing the names of the regions covered by this weather alert.
     *
     * @return array|null
     */
    public function regions();

    /**
     * Get the severity.
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
     * Get the time.
     *
     * The UNIX time at which the alert was issued.
     *
     * @return int|null
     */
    public function time();

    /**
     * Get the title.
     *
     * A brief description of the alert.
     *
     * @return string|null
     */
    public function title();

    /**
     * Get the URI.
     *
     * An HTTP(S) URI that one may refer to for detailed information about the alert.
     *
     * @return string|null
     */
    public function uri();
}
