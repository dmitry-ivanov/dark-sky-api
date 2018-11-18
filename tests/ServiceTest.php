<?php

namespace Tests;

use DmitryIvanov\DarkSkyApi\Service;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Api;
use DmitryIvanov\DarkSkyApi\Contracts\Parameters;
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
     * @param  string  $method
     * @dataProvider methods_with_fluent_interface_provider
     */
    public function it_has_the_methods_providing_the_fluent_interface($method)
    {
        $service = new Service('dummy');

        $fluent = call_user_func_array([$service, $method], ['dummy', 'dummy']);

        $this->assertEquals($service, $fluent);
    }

    /**
     * The data provider for the methods with fluent interface test.
     *
     * @see it_has_the_methods_providing_the_fluent_interface
     *
     * @return array
     */
    public function methods_with_fluent_interface_provider()
    {
        return [
            ['location'],
            ['units'],
            ['language'],
            ['extend'],
        ];
    }

    /**
     * @test
     * @param  string  $method
     * @param  array  $args
     * @param  string  $paramsMethod
     * @param  array  $paramsArgs
     * @dataProvider service_parameters_methods_provider
     */
    public function it_has_the_methods_for_changing_the_service_parameters($method, array $args, $paramsMethod, array $paramsArgs)
    {
        $parameters = spy(Parameters::class);

        call_user_func_array([new Service('dummy', $parameters), $method], $args);

        $parameters->shouldHaveReceived($paramsMethod, $paramsArgs);
    }

    /**
     * The data provider for the service parameters methods test.
     *
     * @see it_has_the_methods_for_changing_the_service_parameters
     *
     * @return array
     */
    public function service_parameters_methods_provider()
    {
        return [
            ['location', [1.23, 4.56], 'setLatitude', [1.23]],
            ['location', [1.23, 4.56], 'setLongitude', [4.56]],
            ['units', ['si'], 'setUnits', ['si']],
            ['language', ['ru'], 'setLanguage', ['ru']],
            ['extend', ['hourly'], 'setExtendedBlocks', ['hourly']],
        ];
    }

    /** @test */
    public function it_has_the_forecast_method()
    {
        $api = mock(Api::class);
        $validator = spy(Validator::class);
        $parameters = spy(Parameters::class);

        $blocks = ['currently', 'daily'];
        $response = ['status' => 'success'];

        $api->shouldReceive('request')
            ->with($parameters)
            ->andReturn($response);

        $this->assertEquals($response, (new Service('dummy', $parameters, $validator, $api))->forecast($blocks));

        $parameters->shouldHaveReceived('setBlocks', [$blocks]);
        $validator->shouldHaveReceived('validate', [$parameters]);
    }

    /** @test */
    public function it_has_the_timeMachine_method()
    {
        $api = mock(Api::class);
        $validator = spy(Validator::class);
        $parameters = spy(Parameters::class);

        $blocks = ['currently', 'daily'];
        $response = ['status' => 'success'];
        $dates = ['2018-10-10', '11 November 2018'];

        $api->shouldReceive('request')
            ->with($parameters)
            ->andReturn($response);

        $this->assertEquals($response, (new Service('dummy', $parameters, $validator, $api))->timeMachine($dates, $blocks));

        $parameters->shouldHaveReceived('setDates', [$dates]);
        $parameters->shouldHaveReceived('setBlocks', [$blocks]);
        $validator->shouldHaveReceived('validate', [$parameters]);
    }
}
