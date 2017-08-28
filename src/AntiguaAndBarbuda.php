<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class AntiguaAndBarbuda.
 */
class AntiguaAndBarbuda extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'AG',
            'ATG',
            'XCD',
            'Antigua & Barbuda',
            'Antigua and Barbuda',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }
}
