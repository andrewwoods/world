<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Bermuda.
 */
class Bermuda extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'BM',
            'BMU',
            'BMD',
            'Bermuda',
            'Bermuda',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
