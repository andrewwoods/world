<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class Curacao.
 */
class Curacao extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'CW',
            'CUW',
            'ANG',
            'Curaçao',
            'Curaçao',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
