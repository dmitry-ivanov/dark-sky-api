<?php

namespace DmitryIvanov\DarkSkyApi\Http\Request;

use DmitryIvanov\DarkSkyApi\Parameters\Blocks;
use DmitryIvanov\DarkSkyApi\Contracts\Parameters;
use DmitryIvanov\DarkSkyApi\Contracts\Http\Request\QueryBuilder as QueryBuilderContract;

class QueryBuilder implements QueryBuilderContract
{
    /**
     * Build the request query string by the given parameters.
     *
     * @param  \DmitryIvanov\DarkSkyApi\Contracts\Parameters  $parameters
     * @return string
     */
    public function build(Parameters $parameters)
    {
        $query = http_build_query([
            'exclude' => $this->composeExclude($parameters->getBlocks()),
            'extend' => $parameters->getExtendedBlocks(),
            'lang' => $parameters->getLanguage(),
            'units' => $parameters->getUnits(),
        ]);

        return urldecode($query);
    }

    /**
     * Compose the "exclude" query parameter by the given included blocks.
     *
     * @param  array|string|null  $included
     * @return string|null
     */
    protected function composeExclude($included)
    {
        if (is_null($included)) {
            return null;
        }

        $included = is_array($included) ? $included : [$included];

        return ($excluded = array_diff(Blocks::values(), $included))
            ? implode(',', $excluded)
            : null;
    }
}
