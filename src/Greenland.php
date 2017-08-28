<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Greenland.
 */
class Greenland extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'GL',
            'GRL',
            'DKK',
            'Greenland',
            'Greenland',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
