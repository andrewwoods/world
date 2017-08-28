<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class ElSalvador.
 */
class ElSalvador extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'SV',
            'SLV',
            'USD',
            'El Salvador',
            'El Salvador',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
