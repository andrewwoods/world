<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Cuba.
 */
class Cuba extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'CU',
            'CUB',
            'CUP',
            'Cuba',
            'Cuba',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
