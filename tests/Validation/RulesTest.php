<?php

namespace Tests\Validation;

use Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Dates;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Units;
use DmitryIvanov\DarkSkyApi\Validation\Rule\ApiKey;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Blocks;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Language;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Latitude;
use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Longitude;
use DmitryIvanov\DarkSkyApi\Validation\Rule\ExtendedBlocks;

class RulesTest extends TestCase
{
    /**
     * @test
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule  $rule
     * @param  mixed  $value
     *
     * @dataProvider provide_valid_values
     */
    public function the_valid_value_would_pass_the_validation(Rule $rule, $value)
    {
        $passes = $rule->passes($value);

        $this->assertTrue($passes);
    }

    /**
     * The data provider.
     *
     * @return array
     */
    public function provide_valid_values()
    {
        return [
            [new ApiKey, 'api-key-12345'],

            [new Latitude, 0],
            [new Latitude, -89.9],
            [new Latitude, +89.9],

            [new Longitude, 0],
            [new Longitude, -179.9],
            [new Longitude, +179.9],

            [new Units, null],
            [new Units, 'auto'],
            [new Units, 'ca'],
            [new Units, 'si'],
            [new Units, 'uk2'],
            [new Units, 'us'],

            [new Language, null],
            [new Language, 'en'],
            [new Language, 'fr'],
            [new Language, 'de'],
            [new Language, 'nl'],
            [new Language, 'pt'],
            [new Language, 'es'],
            [new Language, 'ru'],

            [new Dates, null],
            [new Dates, '2018-11-11'],
            [new Dates, '11 Nov 2018'],
            [new Dates, '11 November 2018'],
            [new Dates, '2018-11-11 11:00:00'],
            [new Dates, ['2018-11-11']],
            [new Dates, ['11 Nov 2018']],
            [new Dates, ['11 November 2018']],
            [new Dates, ['2018-11-11 11:00:00']],
            [new Dates, ['2018-11-11', '11 Nov 2018', '11 November 2018', '2018-11-11 11:00:00']],

            [new Blocks, null],
            [new Blocks, 'currently'],
            [new Blocks, ['currently']],
            [new Blocks, ['currently', 'daily']],

            [new ExtendedBlocks, null],
            [new ExtendedBlocks, 'hourly'],
        ];
    }

    /**
     * @test
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule  $rule
     * @param  mixed  $value
     *
     * @dataProvider provide_invalid_values
     */
    public function the_invalid_value_would_not_pass_the_validation(Rule $rule, $value)
    {
        $passes = $rule->passes($value);

        $this->assertFalse($passes);
    }

    /**
     * The data provider.
     *
     * @return array
     */
    public function provide_invalid_values()
    {
        return [
            [new ApiKey, null],
            [new ApiKey, ''],
            [new ApiKey, true],
            [new ApiKey, false],
            [new ApiKey, 123],
            [new ApiKey, 123.45],
            [new ApiKey, [123]],
            [new ApiKey, ['123']],

            [new Latitude, null],
            [new Latitude, ''],
            [new Latitude, true],
            [new Latitude, false],
            [new Latitude, '1a'],
            [new Latitude, 'a1'],
            [new Latitude, [1]],
            [new Latitude, -90.1],
            [new Latitude, +90.1],

            [new Longitude, null],
            [new Longitude, ''],
            [new Longitude, true],
            [new Longitude, false],
            [new Longitude, '1a'],
            [new Longitude, 'a1'],
            [new Longitude, [1]],
            [new Longitude, -180.1],
            [new Longitude, +180.1],

            [new Units, ''],
            [new Units, true],
            [new Units, false],
            [new Units, 1],
            [new Units, '1'],
            [new Units, '1a'],
            [new Units, 'en'],
            [new Units, 'foo'],
            [new Units, 'si2'],
            [new Units, '2si'],
            [new Units, 'si/2'],

            [new Language, ''],
            [new Language, true],
            [new Language, false],
            [new Language, 1],
            [new Language, '1'],
            [new Language, '1a'],
            [new Language, 'si'],
            [new Language, 'foo'],
            [new Language, 'ru2'],
            [new Language, '2ru'],
            [new Language, 'ru/2'],

            [new Dates, ''],
            [new Dates, true],
            [new Dates, false],
            [new Dates, 1],
            [new Dates, '1'],
            [new Dates, 'foo'],
            [new Dates, '2018-13-35'],
            [new Dates, '2018-02-31'],
            [new Dates, '2018-11-11 25:00:00'],
            [new Dates, '2018-11-11 00:61:00'],
            [new Dates, '2018-11-11 00:00:61'],
            [new Dates, []],
            [new Dates, [null]],
            [new Dates, [true, false]],
            [new Dates, [1, 2]],
            [new Dates, ['1', '2']],
            [new Dates, ['foo', 'bar']],
            [new Dates, ['2018-13-35', '2018-02-31', '2018-11-11 25:00:00']],
            [new Dates, ['2018-11-11', null]],
            [new Dates, ['2018-11-11', true]],
            [new Dates, ['2018-11-11', false]],
            [new Dates, ['2018-11-11', 1]],
            [new Dates, ['2018-11-11', '1']],
            [new Dates, ['2018-11-11', 'foo']],
            [new Dates, ['2018-11-11', '2018-13-35']],
            [new Dates, ['2018-11-11', '2018-02-31']],
            [new Dates, ['2018-11-11', '2018-11-11 25:00:00']],
            [new Dates, ['2018-11-11', '2018-11-11 00:61:00']],
            [new Dates, ['2018-11-11', '2018-11-11 00:00:61']],

            [new Blocks, ''],
            [new Blocks, true],
            [new Blocks, false],
            [new Blocks, 1],
            [new Blocks, '1'],
            [new Blocks, 'si'],
            [new Blocks, 'en'],
            [new Blocks, 'foo'],
            [new Blocks, 'currently2'],
            [new Blocks, '2currently'],
            [new Blocks, 'currently/2'],
            [new Blocks, []],
            [new Blocks, [null]],
            [new Blocks, [true, false]],
            [new Blocks, [1, 2]],
            [new Blocks, ['1', '2']],
            [new Blocks, ['foo', 'bar']],
            [new Blocks, ['currently2', '2daily']],
            [new Blocks, ['currently', null]],
            [new Blocks, ['currently', true]],
            [new Blocks, ['currently', false]],
            [new Blocks, ['currently', 1]],
            [new Blocks, ['currently', '1']],
            [new Blocks, ['currently', 'foo']],
            [new Blocks, ['currently', 'daily2']],

            [new ExtendedBlocks, ''],
            [new ExtendedBlocks, true],
            [new ExtendedBlocks, false],
            [new ExtendedBlocks, 1],
            [new ExtendedBlocks, '1'],
            [new ExtendedBlocks, '1a'],
            [new ExtendedBlocks, 'si'],
            [new ExtendedBlocks, 'ru'],
            [new ExtendedBlocks, 'foo'],
            [new ExtendedBlocks, 'hourly2'],
            [new ExtendedBlocks, '2hourly'],
            [new ExtendedBlocks, 'hourly/2'],
        ];
    }

    /**
     * @test
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule  $rule
     * @param  string  $message
     *
     * @dataProvider provide_failed_validation_messages
     */
    public function each_rule_has_the_message_for_the_failed_validation(Rule $rule, $message)
    {
        $this->assertEquals($message, $rule->message());
    }

    /**
     * The data provider.
     *
     * @return array
     */
    public function provide_failed_validation_messages()
    {
        return [
            [new ApiKey, 'The given API key is invalid.'],
            [new Latitude, 'The given latitude is invalid.'],
            [new Longitude, 'The given longitude is invalid.'],
            [new Units, 'The given units are invalid.'],
            [new Language, 'The given language is invalid.'],
            [new Dates, 'The given dates are invalid.'],
            [new Blocks, 'The given blocks are invalid.'],
            [new ExtendedBlocks, 'The given extended blocks are invalid.'],
        ];
    }
}
