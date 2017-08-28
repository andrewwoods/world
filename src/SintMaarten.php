<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class SintMaarten.
 */
class SintMaarten extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'SX',
            'SXM',
            'ANG',
            'Sint Maarten',
            'Sint Maarten (Dutch part)',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
