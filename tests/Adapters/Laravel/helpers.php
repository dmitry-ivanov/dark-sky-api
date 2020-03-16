<?php

if (!function_exists('config')) {
    /**
     * Get the specified configuration value.
     *
     * Defined here, because the package doesn't have the `foundation` helpers.
     *
     * @param  string  $key
     * @return mixed
     */
    function config($key)
    {
        $config = require __DIR__.'/fixture/config/dark-sky-api.php';

        return isset($config[$key]) ? $config[$key] : "config::{$key}";
    }
}

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * Defined here, because the package doesn't have the `foundation` helpers.
     *
     * @param  string  $path
     * @return string
     */
    function config_path($path)
    {
        return "config/path/{$path}";
    }
}

if (!function_exists('dd')) {
    /**
     * Dump and die.
     *
     * Defined here just for the convenience.
     *
     * @return void
     */
    function dd()
    {
        foreach (func_get_args() as $arg) {
            var_dump($arg);
        }

        exit(1);
    }
}
