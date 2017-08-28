<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class DominicanRepublic.
 */
class DominicanRepublic extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'DO',
            'DOM',
            'DOP',
            'Dominican Republic',
            'Dominican Republic',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
