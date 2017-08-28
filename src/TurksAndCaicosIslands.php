<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class TurksAndCaicosIslands.
 */
class TurksAndCaicosIslands extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'TC',
            'TCA',
            'USD',
            'Turks & Caicos Islands',
            'Turks and Caicos Islands',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
