<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Honduras.
 */
class Honduras extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'HN',
            'HND',
            'HNL',
            'Honduras',
            'Honduras',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
