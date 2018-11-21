<?php

namespace DmitryIvanov\DarkSkyApi;

/**
 * Wrapper for the `json_decode()` that throws when an error occurs.
 *
 * @link http://www.php.net/manual/en/function.json-decode.php
 *
 * @param  string  $json
 * @param  bool  $assoc
 * @param  int  $depth
 * @param  int  $options
 * @return mixed
 *
 * @throws \InvalidArgumentException
 */
function json_decode($json, $assoc = false, $depth = 512, $options = 0)
{
    $data = \json_decode($json, $assoc, $depth, $options);

    if (json_last_error() != JSON_ERROR_NONE) {
        $message = json_last_error_msg();
        throw new \InvalidArgumentException("[json_decode] error: {$message}.");
    }

    return $data;
}
