<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awoods\World\ConsoleCommands;


class CountryClassTemplate
{
    public function __construct()
    {
    }

    /**
     * @param $className
     * @param array $data
     *
     * @return string
     */
    public function render($className, $data){
        $nameSpace = "Awoods\\World\\" . $data['continent'];
        $classTemplate = <<<CLASS_TEMPLATE
<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace {$nameSpace};

use Awoods\World\Country;
use Awoods\World\ContinentFactory;

/**
 * Class {$className}.
 */
class {$className} extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            '{$data['iso3166_1_alpha_2']}',
            '{$data['iso3166_1_alpha_3']}',
            '{$data['iso4217_alpha_code']}',
            '{$data['name']}',
            '{$data['official_name_en']}',
            ContinentFactory::get("{$data['continent']}")
        );
    }
}

CLASS_TEMPLATE;

        return $classTemplate;
    }
}