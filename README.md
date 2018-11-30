![PHP Library for the Dark Sky API](art/dark-sky-api.png)

# Dark Sky API

[<img src="https://raw.githubusercontent.com/dmitry-ivanov/dark-sky-api/master/art/become-a-patron.png" alt="Become a Patron" width="160" />](https://patreon.com/dmitryivanov)

[![StyleCI](https://github.styleci.io/repos/148543382/shield?branch=master&style=flat)](https://github.styleci.io/repos/148543382)
[![Build Status](https://travis-ci.com/dmitry-ivanov/dark-sky-api.svg?branch=master)](https://travis-ci.com/dmitry-ivanov/dark-sky-api)
[![Coverage Status](https://coveralls.io/repos/github/dmitry-ivanov/dark-sky-api/badge.svg?branch=master)](https://coveralls.io/github/dmitry-ivanov/dark-sky-api?branch=master)

[![Latest Stable Version](https://poser.pugx.org/dmitry-ivanov/dark-sky-api/v/stable)](https://packagist.org/packages/dmitry-ivanov/dark-sky-api)
[![Latest Unstable Version](https://poser.pugx.org/dmitry-ivanov/dark-sky-api/v/unstable)](https://packagist.org/packages/dmitry-ivanov/dark-sky-api)
[![Total Downloads](https://poser.pugx.org/dmitry-ivanov/dark-sky-api/downloads)](https://packagist.org/packages/dmitry-ivanov/dark-sky-api)
[![License](https://poser.pugx.org/dmitry-ivanov/dark-sky-api/license)](https://packagist.org/packages/dmitry-ivanov/dark-sky-api)

The package provides a convenient way to interact with [Dark Sky API](https://darksky.net/dev/docs).

It covers all the API functionality, including object-level access to the [response headers](https://darksky.net/dev/docs#response-headers), [weather alerts](https://darksky.net/dev/docs#alerts) and [flags](https://darksky.net/dev/docs#flags).

- Requires [PHP 5.5.9+](https://php.net/releases#5.5.9).
- [Stand-alone](#basic-usage) PHP package.
- Ready-to-use in [Laravel](???) application.
- Each request utilizes [HTTP compression](https://darksky.net/dev/docs#response-notes).
- [Time Machine Requests](https://darksky.net/dev/docs#time-machine-request) are sent concurrently.

## Installation

Use [Composer](https://getcomposer.org) to install the package:

```bash
composer require dmitry-ivanov/dark-sky-api
```

## Basic Usage

### Forecast Request

```php
use DmitryIvanov\DarkSkyApi\DarkSkyApi;

$forecast = (new DarkSkyApi('secret-key'))
    ->location(46.482, 30.723)
    ->forecast();

echo $forecast->currently()->summary();
```

### Time Machine Request

```php
// Example here
```


-----------------------------------

# In Progress...

-----------------------------------




## Usage

2. Set the key in the `.env` file:

    ```
    DARK_SKY_KEY=[Your Secret Key]
    ```

3. Use `DarkSky` class:

    ```php
    use DarkSky;

    $forecast = DarkSky::at($latitude, $longitude)->forecast();
    ```

    > Check the [Dark Sky API](https://darksky.net/dev/docs) for more information about the response format.

    ---

    You can publish config to override default language, units, etc:

    ```shell
    php artisan vendor:publish --provider="Illuminated\DarkSky\ServiceProvider"
    ```

## Forecast

Get the weather forecast:

```php
$forecast = DarkSky::at($latitude, $longitude)->forecast();
```

Specify desired data blocks to reduce the response size:

```php
$forecast = DarkSky::at($latitude, $longitude)->forecast('daily');
$forecast = DarkSky::at($latitude, $longitude)->forecast(['daily', 'hourly']);
```

## Time Machine

Get the weather conditions for a particular date:

```php
$weather = DarkSky::at($latitude, $longitude)->timeMachine('1986-05-11');
```

Or get the weather conditions for several dates via [concurrent requests](http://docs.guzzlephp.org/en/stable/quickstart.html#concurrent-requests):

```php
$weather = DarkSky::at($latitude, $longitude)->timeMachine(['1986-05-11', '1987-05-11']);
```

Specify desired data blocks to reduce the response size:

```php
$weather = DarkSky::at($latitude, $longitude)->timeMachine('1986-05-11', 'daily');
$weather = DarkSky::at($latitude, $longitude)->timeMachine('1986-05-11', ['daily', 'hourly']);
```

## License

Dark Sky API is open-sourced software licensed under the [MIT license](LICENSE.md).

[<img src="https://raw.githubusercontent.com/dmitry-ivanov/dark-sky-api/master/art/support-on-patreon.png" alt="Support on Patreon" width="125" />](https://patreon.com/dmitryivanov)
