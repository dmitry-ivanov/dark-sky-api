<?php

namespace DmitryIvanov\DarkSkyApi\Validation;

use InvalidArgumentException;
use DmitryIvanov\DarkSkyApi\Contracts\Parameters;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Dates;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Units;
use DmitryIvanov\DarkSkyApi\Validation\Rule\ApiKey;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Blocks;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Language;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Latitude;
use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\Longitude;
use DmitryIvanov\DarkSkyApi\Validation\Rule\ExtendedBlocks;
use DmitryIvanov\DarkSkyApi\Contracts\Validation\Validator as ValidatorContract;

class Validator implements ValidatorContract
{
    /**
     * Validate the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function validate(Parameters $parameters)
    {
        foreach ($this->validations($parameters) as $validation) {
            $this->validateParameterValue($validation['rule'], $validation['value']);
        }
    }

    /**
     * The parameters validations.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return array
     */
    protected function validations(Parameters $parameters)
    {
        return [
            ['rule' => new ApiKey, 'value' => $parameters->getApiKey()],
            ['rule' => new Latitude, 'value' => $parameters->getLatitude()],
            ['rule' => new Longitude, 'value' => $parameters->getLongitude()],
            ['rule' => new Units, 'value' => $parameters->getUnits()],
            ['rule' => new Language, 'value' => $parameters->getLanguage()],
            ['rule' => new Dates, 'value' => $parameters->getDates()],
            ['rule' => new Blocks, 'value' => $parameters->getBlocks()],
            ['rule' => new ExtendedBlocks, 'value' => $parameters->getExtendedBlocks()],
        ];
    }

    /**
     * Validate the given parameter value using the given rule.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule  $rule
     * @param  mixed  $value
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    protected function validateParameterValue(Rule $rule, $value)
    {
        if (!$rule->passes($value)) {
            throw new InvalidArgumentException($rule->message());
        }
    }
}
