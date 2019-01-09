<?php

namespace DmitryIvanov\DarkSkyApi\Validation;

use InvalidArgumentException;
use DmitryIvanov\DarkSkyApi\Parameters;
use DmitryIvanov\DarkSkyApi\Contracts\Validation\Rule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\DatesRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\UnitsRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\ApiKeyRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\BlocksRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\LanguageRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\LatitudeRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\LongitudeRule;
use DmitryIvanov\DarkSkyApi\Validation\Rule\ExtendedBlocksRule;

class Validator
{
    /**
     * Validate the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
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
     * Get the parameters' validations.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Parameters  $parameters
     * @return array
     */
    protected function validations(Parameters $parameters)
    {
        return [
            ['rule' => new ApiKeyRule, 'value' => $parameters->getApiKey()],
            ['rule' => new LatitudeRule, 'value' => $parameters->getLatitude()],
            ['rule' => new LongitudeRule, 'value' => $parameters->getLongitude()],
            ['rule' => new UnitsRule, 'value' => $parameters->getUnits()],
            ['rule' => new LanguageRule, 'value' => $parameters->getLanguage()],
            ['rule' => new DatesRule, 'value' => $parameters->getDates()],
            ['rule' => new BlocksRule, 'value' => $parameters->getBlocks()],
            ['rule' => new ExtendedBlocksRule, 'value' => $parameters->getExtendedBlocks()],
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
