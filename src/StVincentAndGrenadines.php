<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class StVincentAndGrenadines.
 */
class StVincentAndGrenadines extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'VC',
            'VCT',
            'XCD',
            'St. Vincent & Grenadines',
            'Saint Vincent and the Grenadines',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
