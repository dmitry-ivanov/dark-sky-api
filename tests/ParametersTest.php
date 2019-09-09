<?php

namespace DmitryIvanov\DarkSkyApi\Tests;

use DmitryIvanov\DarkSkyApi\Parameters;

class ParametersTest extends TestCase
{
    /**
     * @test
     *
     * @param  string  $parameter
     *
     * @testWith ["ApiKey"]
     *           ["Latitude"]
     *           ["Longitude"]
     *           ["Units"]
     *           ["Language"]
     *           ["Dates"]
     *           ["Blocks"]
     *           ["ExtendedBlocks"]
     */
    public function each_parameter_field_has_the_getter_and_the_setter_methods($parameter)
    {
        $parameters = new Parameters;

        $parameters->{"set{$parameter}"}('value');

        $this->assertEquals('value', $parameters->{"get{$parameter}"}());
    }
}
