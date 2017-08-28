<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class StMartin.
 */
class StMartin extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'MF',
            'MAF',
            'EUR',
            'St. Martin',
            'Saint Martin (French part)',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
