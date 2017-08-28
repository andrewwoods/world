<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Belize.
 */
class Belize extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'BZ',
            'BLZ',
            'BZD',
            'Belize',
            'Belize',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
