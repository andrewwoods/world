<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class StLucia.
 */
class StLucia extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'LC',
            'LCA',
            'XCD',
            'St. Lucia',
            'Saint Lucia',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
