<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Aruba.
 */
class Aruba extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'AW',
            'ABW',
            'AWG',
            'Aruba',
            'Aruba',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
