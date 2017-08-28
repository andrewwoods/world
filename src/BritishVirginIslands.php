<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class BritishVirginIslands.
 */
class BritishVirginIslands extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'VG',
            'VGB',
            'USD',
            'British Virgin Islands',
            'British Virgin Islands',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
