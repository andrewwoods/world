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

use InvalidArgumentException;

/**
 * Class CountryFactoryTemplate
 *
 * @package Awoods\World\ConsoleCommands
 */
class BaseCountryFactoryTemplate
{
    public function __construct()
    {
    }

    /**
     * Create the code for use within the Country factory
     *
     * @param array $data
     *
     * @return string
     */
    public function render($data){

        if (empty($data)) {
            throw new InvalidArgumentException();
        }

        $factoryTemplate = <<<FACTORY

            case '{$data['iso3166_1_alpha_2']}':
            case '{$data['iso3166_1_alpha_3']}':
                return new Country(
                    '{$data['iso3166_1_alpha_2']}',
                    '{$data['iso3166_1_alpha_3']}',
                    '{$data['iso4217_alpha_code']}',
                    '{$data['name']}',
                    '{$data['official_name_en']}',
                    ContinentFactory::get('{$data['continent']}')
                );
                break;

FACTORY;

        return $factoryTemplate;
    }

}