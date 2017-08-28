<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class TrinidadAndTobago.
 */
class TrinidadAndTobago extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'TT',
            'TTO',
            'TTD',
            'Trinidad & Tobago',
            'Trinidad and Tobago',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}