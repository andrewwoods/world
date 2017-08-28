<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Haiti.
 */
class Haiti extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'HT',
            'HTI',
            'USD',
            'Haiti',
            'Haiti',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
