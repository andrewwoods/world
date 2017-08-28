<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class USVirginIslands.
 */
class USVirginIslands extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'VI',
            'VIR',
            'USD',
            'U.S. Virgin Islands',
            'United States Virgin Islands',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
