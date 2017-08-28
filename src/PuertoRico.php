<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class PuertoRico.
 */
class PuertoRico extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'PR',
            'PRI',
            'USD',
            'Puerto Rico',
            'Puerto Rico',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
