<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Montserrat.
 */
class Montserrat extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'MS',
            'MSR',
            'XCD',
            'Montserrat',
            'Montserrat',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
