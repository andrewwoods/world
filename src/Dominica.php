<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Dominica.
 */
class Dominica extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'DM',
            'DMA',
            'XCD',
            'Dominica',
            'Dominica',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
