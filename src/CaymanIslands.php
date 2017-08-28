<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class CaymanIslands.
 */
class CaymanIslands extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'KY',
            'CYM',
            'KYD',
            'Cayman Islands',
            'Cayman Islands',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
