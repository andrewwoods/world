<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Barbados.
 */
class Barbados extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'BB',
            'BRB',
            'BBD',
            'Barbados',
            'Barbados',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
