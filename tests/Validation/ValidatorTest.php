<?php

namespace Tests\Validation;

use Tests\TestCase;
use InvalidArgumentException;
use DmitryIvanov\DarkSkyApi\Contracts\Parameters;
use DmitryIvanov\DarkSkyApi\Validation\Validator;
use Tests\Validation\Stubs\Parameters\AcceptableStub;
use Tests\Validation\Stubs\Parameters\CheesyDatesStub;
use Tests\Validation\Stubs\Parameters\CheesyUnitsStub;
use Tests\Validation\Stubs\Parameters\CheesyApiKeyStub;
use Tests\Validation\Stubs\Parameters\CheesyBlocksStub;
use Tests\Validation\Stubs\Parameters\CheesyLanguageStub;
use Tests\Validation\Stubs\Parameters\CheesyLatitudeStub;
use Tests\Validation\Stubs\Parameters\CheesyLongitudeStub;
use Tests\Validation\Stubs\Parameters\CheesyExtendedBlocksStub;

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
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
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
