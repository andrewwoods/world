<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Anguilla.
 */
class Anguilla extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'AI',
            'AIA',
            'XCD',
            'Anguilla',
            'Anguilla',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
