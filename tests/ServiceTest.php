<?php

namespace Tests;

use DmitryIvanov\DarkSkyApi\Service;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Api;
use DmitryIvanov\DarkSkyApi\Contracts\Parameters;
use DmitryIvanov\DarkSkyApi\Contracts\Weather\Data;
use DmitryIvanov\DarkSkyApi\Contracts\Validation\Validator;

class ServiceTest extends TestCase
{
    /** @test */
    public function the_key_passed_to_the_constructor_would_be_set_to_the_apiKey_service_parameter()
    {
        $parameters = spy(Parameters::class);

        new Service('api-key-12345', $parameters);

        $parameters->shouldHaveReceived('setApiKey', ['api-key-12345']);
    }

    /** @test */
    public function it_has_the_getParameters_method()
    {
        $parameters = spy(Parameters::class);

        $service = new Service('dummy', $parameters);

        $this->assertEquals($parameters, $service->getParameters());
    }

    /**
     * @test
     *
     * @param  string  $method
     *
     * @testWith ["location"]
     *           ["units"]
     *           ["language"]
     *           ["extend"]
     */
    public function it_has_the_methods_which_provide_the_fluent_interface($method)
    {
        $service = new Service('dummy');

        $result = call_user_func_array([$service, $method], ['dummy', 'dummy']);

        $this->assertEquals($service, $result);
    }

    /**
     * @test
     *
     * @param  string  $method
     * @param  array  $args
     * @param  string  $paramsMethod
     * @param  array  $paramsArgs
     *
     * @testWith ["location", [1.234, 5.678], "setLatitude", [1.234]]
     *           ["location", [1.234, 5.678], "setLongitude", [5.678]]
     *           ["units", ["si"], "setUnits", ["si"]]
     *           ["language", ["ru"], "setLanguage", ["ru"]]
     *           ["extend", ["hourly"], "setExtendedBlocks", ["hourly"]]
     */
    public function it_has_the_methods_which_modify_the_service_parameters($method, array $args, $paramsMethod, array $paramsArgs)
    {
        $parameters = spy(Parameters::class);

        $service = new Service('dummy', $parameters);
        call_user_func_array([$service, $method], $args);

        $parameters->shouldHaveReceived($paramsMethod, $paramsArgs);
    }

    /** @test */
    public function it_has_the_forecast_method()
    {
        $api = mock(Api::class);
        $parameters = spy(Parameters::class);
        $validator = spy(Validator::class);
        $weatherData = mock(Data::class);
        $blocks = ['currently', 'daily'];

        $api->shouldReceive('request')
            ->with($parameters)
            ->andReturn($weatherData);

        $service = new Service('dummy', $parameters, $validator, $api);
        $this->assertEquals($weatherData, $service->forecast($blocks));

        $parameters->shouldHaveReceived('setBlocks', [$blocks]);
        $validator->shouldHaveReceived('validate', [$parameters]);
    }

    /** @test */
    public function it_has_the_timeMachine_method()
    {
        $api = mock(Api::class);
        $parameters = spy(Parameters::class);
        $validator = spy(Validator::class);
        $weatherData = mock(Data::class);
        $blocks = ['currently', 'daily'];
        $dates = ['09 Sep 2018', '10 October 2018', '2018-11-11 11:00:00'];

        $api->shouldReceive('request')
            ->with($parameters)
            ->andReturn($weatherData);

        $service = new Service('dummy', $parameters, $validator, $api);
        $this->assertEquals($weatherData, $service->timeMachine($dates, $blocks));

        $parameters->shouldHaveReceived('setDates', [$dates]);
        $parameters->shouldHaveReceived('setBlocks', [$blocks]);
        $validator->shouldHaveReceived('validate', [$parameters]);
    }
}
