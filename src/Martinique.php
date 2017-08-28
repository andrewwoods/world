<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Martinique.
 */
class Martinique extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'MQ',
            'MTQ',
            'EUR',
            'Martinique',
            'Martinique',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
