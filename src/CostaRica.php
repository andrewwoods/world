<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class CostaRica.
 */
class CostaRica extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'CR',
            'CRI',
            'CRC',
            'Costa Rica',
            'Costa Rica',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
