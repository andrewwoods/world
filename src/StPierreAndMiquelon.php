<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class StPierreAndMiquelon.
 */
class StPierreAndMiquelon extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'PM',
            'SPM',
            'EUR',
            'St. Pierre & Miquelon',
            'Saint Pierre and Miquelon',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
