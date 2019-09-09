<?php

namespace DmitryIvanov\DarkSkyApi\Tests\Validation;

use InvalidArgumentException;
use DmitryIvanov\DarkSkyApi\Parameters;
use DmitryIvanov\DarkSkyApi\Tests\TestCase;
use DmitryIvanov\DarkSkyApi\Validation\Validator;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\AcceptableStub;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\CheesyDatesStub;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\CheesyUnitsStub;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\CheesyApiKeyStub;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\CheesyBlocksStub;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\CheesyLanguageStub;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\CheesyLatitudeStub;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\CheesyLongitudeStub;
use DmitryIvanov\DarkSkyApi\Tests\Validation\Stubs\Parameters\CheesyExtendedBlocksStub;

class ValidatorTest extends TestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function the_valid_parameters_would_pass_the_validation()
    {
        $validator = new Validator;
        $validator->validate(new AcceptableStub);
    }

    /**
     * @test
     *
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
     * @param  string  $message
     *
     * @dataProvider provide_invalid_parameters
     */
    public function the_invalid_parameters_would_not_pass_the_validation_and_exception_would_be_thrown(Parameters $parameters, $message)
    {
        $this->isExpectingException(new InvalidArgumentException($message));

        $validator = new Validator;
        $validator->validate($parameters);
    }

    /**
     * The data provider.
     *
     * @return array
     */
    public function provide_invalid_parameters()
    {
        return [
            [new CheesyApiKeyStub, 'The given API key is invalid.'],
            [new CheesyLatitudeStub, 'The given latitude is invalid.'],
            [new CheesyLongitudeStub, 'The given longitude is invalid.'],
            [new CheesyUnitsStub, 'The given units are invalid.'],
            [new CheesyLanguageStub, 'The given language is invalid.'],
            [new CheesyDatesStub, 'The given dates are invalid.'],
            [new CheesyBlocksStub, 'The given blocks are invalid.'],
            [new CheesyExtendedBlocksStub, 'The given extended blocks are invalid.'],
        ];
    }
}
