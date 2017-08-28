<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class StBarthelemy.
 */
class StBarthelemy extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'BL',
            'BLM',
            'EUR',
            'St. Barthélemy',
            'Saint Barthélemy',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
