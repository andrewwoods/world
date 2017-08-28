<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Guatemala.
 */
class Guatemala extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'GT',
            'GTM',
            'GTQ',
            'Guatemala',
            'Guatemala',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
