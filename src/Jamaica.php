<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Jamaica.
 */
class Jamaica extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'JM',
            'JAM',
            'JMD',
            'Jamaica',
            'Jamaica',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
