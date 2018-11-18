<?php

namespace Tests;

use DmitryIvanov\DarkSkyApi\Parameters;

class ParametersTest extends TestCase
{
    /**
     * @test
     * @param  string  $field
     * @dataProvider parameter_fields_provider
     */
    public function each_parameter_field_has_the_getter_and_the_setter_methods($field)
    {
        $parameters = new Parameters;

        $parameters->{"set{$field}"}('value');

        $this->assertEquals('value', $parameters->{"get{$field}"}());
    }

    /**
     * The data provider for the test.
     *
     * @see each_parameter_field_has_the_getter_and_the_setter_methods
     *
     * @return array
     */
    public function parameter_fields_provider()
    {
        return [
            ['ApiKey'],
            ['Latitude'],
            ['Longitude'],
            ['Units'],
            ['Language'],
            ['Dates'],
            ['Blocks'],
            ['ExtendedBlocks'],
        ];
    }
}
