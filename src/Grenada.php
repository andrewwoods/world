<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Grenada.
 */
class Grenada extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'GD',
            'GRD',
            'XCD',
            'Grenada',
            'Grenada',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
