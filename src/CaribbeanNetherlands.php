<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class CaribbeanNetherlands.
 */
class CaribbeanNetherlands extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'BQ',
            'BES',
            'USD',
            'Caribbean Netherlands',
            'Bonaire, Sint Eustatius and Saba',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
