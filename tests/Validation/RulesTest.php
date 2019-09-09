<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Validation;

use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\DatesRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\UnitsRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\ApiKeyRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\BlocksRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\LanguageRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\LatitudeRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\LongitudeRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\ExtendedBlocksRule;

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
            [new ApiKeyRule, 'api-key-12345'],

            [new LatitudeRule, 0],
            [new LatitudeRule, -89.9],
            [new LatitudeRule, +89.9],

            [new LongitudeRule, 0],
            [new LongitudeRule, -179.9],
            [new LongitudeRule, +179.9],

            [new UnitsRule, null],
            [new UnitsRule, 'auto'],
            [new UnitsRule, 'ca'],
            [new UnitsRule, 'si'],
            [new UnitsRule, 'uk2'],
            [new UnitsRule, 'us'],

            [new LanguageRule, null],
            [new LanguageRule, 'en'],
            [new LanguageRule, 'fr'],
            [new LanguageRule, 'de'],
            [new LanguageRule, 'nl'],
            [new LanguageRule, 'pt'],
            [new LanguageRule, 'es'],
            [new LanguageRule, 'ru'],

            [new DatesRule, null],
            [new DatesRule, '2018-11-11'],
            [new DatesRule, '11 Nov 2018'],
            [new DatesRule, '11 November 2018'],
            [new DatesRule, '2018-11-11 11:00:00'],
            [new DatesRule, ['2018-11-11']],
            [new DatesRule, ['11 Nov 2018']],
            [new DatesRule, ['11 November 2018']],
            [new DatesRule, ['2018-11-11 11:00:00']],
            [new DatesRule, ['2018-11-11', '11 Nov 2018', '11 November 2018', '2018-11-11 11:00:00']],

            [new BlocksRule, null],
            [new BlocksRule, 'currently'],
            [new BlocksRule, ['currently']],
            [new BlocksRule, ['currently', 'daily']],

            [new ExtendedBlocksRule, null],
            [new ExtendedBlocksRule, 'hourly'],
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
            [new ApiKeyRule, null],
            [new ApiKeyRule, ''],
            [new ApiKeyRule, true],
            [new ApiKeyRule, false],
            [new ApiKeyRule, 123],
            [new ApiKeyRule, 123.45],
            [new ApiKeyRule, [123]],
            [new ApiKeyRule, ['123']],

            [new LatitudeRule, null],
            [new LatitudeRule, ''],
            [new LatitudeRule, true],
            [new LatitudeRule, false],
            [new LatitudeRule, '1a'],
            [new LatitudeRule, 'a1'],
            [new LatitudeRule, [1]],
            [new LatitudeRule, -90.1],
            [new LatitudeRule, +90.1],

            [new LongitudeRule, null],
            [new LongitudeRule, ''],
            [new LongitudeRule, true],
            [new LongitudeRule, false],
            [new LongitudeRule, '1a'],
            [new LongitudeRule, 'a1'],
            [new LongitudeRule, [1]],
            [new LongitudeRule, -180.1],
            [new LongitudeRule, +180.1],

            [new UnitsRule, ''],
            [new UnitsRule, true],
            [new UnitsRule, false],
            [new UnitsRule, 1],
            [new UnitsRule, '1'],
            [new UnitsRule, '1a'],
            [new UnitsRule, 'en'],
            [new UnitsRule, 'foo'],
            [new UnitsRule, 'si2'],
            [new UnitsRule, '2si'],
            [new UnitsRule, 'si/2'],

            [new LanguageRule, ''],
            [new LanguageRule, true],
            [new LanguageRule, false],
            [new LanguageRule, 1],
            [new LanguageRule, '1'],
            [new LanguageRule, '1a'],
            [new LanguageRule, 'si'],
            [new LanguageRule, 'foo'],
            [new LanguageRule, 'ru2'],
            [new LanguageRule, '2ru'],
            [new LanguageRule, 'ru/2'],

            [new DatesRule, ''],
            [new DatesRule, true],
            [new DatesRule, false],
            [new DatesRule, 1],
            [new DatesRule, '1'],
            [new DatesRule, 'foo'],
            [new DatesRule, '2018-13-35'],
            [new DatesRule, '2018-02-31'],
            [new DatesRule, '2018-11-11 25:00:00'],
            [new DatesRule, '2018-11-11 00:61:00'],
            [new DatesRule, '2018-11-11 00:00:61'],
            [new DatesRule, []],
            [new DatesRule, [null]],
            [new DatesRule, [true, false]],
            [new DatesRule, [1, 2]],
            [new DatesRule, ['1', '2']],
            [new DatesRule, ['foo', 'bar']],
            [new DatesRule, ['2018-13-35', '2018-02-31', '2018-11-11 25:00:00']],
            [new DatesRule, ['2018-11-11', null]],
            [new DatesRule, ['2018-11-11', true]],
            [new DatesRule, ['2018-11-11', false]],
            [new DatesRule, ['2018-11-11', 1]],
            [new DatesRule, ['2018-11-11', '1']],
            [new DatesRule, ['2018-11-11', 'foo']],
            [new DatesRule, ['2018-11-11', '2018-13-35']],
            [new DatesRule, ['2018-11-11', '2018-02-31']],
            [new DatesRule, ['2018-11-11', '2018-11-11 25:00:00']],
            [new DatesRule, ['2018-11-11', '2018-11-11 00:61:00']],
            [new DatesRule, ['2018-11-11', '2018-11-11 00:00:61']],

            [new BlocksRule, ''],
            [new BlocksRule, true],
            [new BlocksRule, false],
            [new BlocksRule, 1],
            [new BlocksRule, '1'],
            [new BlocksRule, 'si'],
            [new BlocksRule, 'en'],
            [new BlocksRule, 'foo'],
            [new BlocksRule, 'currently2'],
            [new BlocksRule, '2currently'],
            [new BlocksRule, 'currently/2'],
            [new BlocksRule, []],
            [new BlocksRule, [null]],
            [new BlocksRule, [true, false]],
            [new BlocksRule, [1, 2]],
            [new BlocksRule, ['1', '2']],
            [new BlocksRule, ['foo', 'bar']],
            [new BlocksRule, ['currently2', '2daily']],
            [new BlocksRule, ['currently', null]],
            [new BlocksRule, ['currently', true]],
            [new BlocksRule, ['currently', false]],
            [new BlocksRule, ['currently', 1]],
            [new BlocksRule, ['currently', '1']],
            [new BlocksRule, ['currently', 'foo']],
            [new BlocksRule, ['currently', 'daily2']],

            [new ExtendedBlocksRule, ''],
            [new ExtendedBlocksRule, true],
            [new ExtendedBlocksRule, false],
            [new ExtendedBlocksRule, 1],
            [new ExtendedBlocksRule, '1'],
            [new ExtendedBlocksRule, '1a'],
            [new ExtendedBlocksRule, 'si'],
            [new ExtendedBlocksRule, 'ru'],
            [new ExtendedBlocksRule, 'foo'],
            [new ExtendedBlocksRule, 'hourly2'],
            [new ExtendedBlocksRule, '2hourly'],
            [new ExtendedBlocksRule, 'hourly/2'],
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
            [new ApiKeyRule, 'The given API key is invalid.'],
            [new LatitudeRule, 'The given latitude is invalid.'],
            [new LongitudeRule, 'The given longitude is invalid.'],
            [new UnitsRule, 'The given units are invalid.'],
            [new LanguageRule, 'The given language is invalid.'],
            [new DatesRule, 'The given dates are invalid.'],
            [new BlocksRule, 'The given blocks are invalid.'],
            [new ExtendedBlocksRule, 'The given extended blocks are invalid.'],
        ];
    }
}
