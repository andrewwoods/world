<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Panama.
 */
class Panama extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'PA',
            'PAN',
            'USD',
            'Panama',
            'Panama',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
