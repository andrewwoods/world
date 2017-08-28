<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Guadeloupe.
 */
class Guadeloupe extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'GP',
            'GLP',
            'EUR',
            'Guadeloupe',
            'Guadeloupe',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
