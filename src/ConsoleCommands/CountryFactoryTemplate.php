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


class CountryFactoryTemplate
{
    public function __construct()
    {
    }

    /**
     * @param $className
     * @param $data
     *
     * @return string
     */
    public function render($className, $data) : string
    {
        if ($data === false) {
            throw new InvalidArgumentException();
        }

        $factoryTemplate = <<<FACTORY

            case '{$data['iso3166_1_alpha_2']}':
            case '{$data['iso3166_1_alpha_3']}':
                return new {$className}();
                break;

FACTORY;

        return $factoryTemplate;
    }

}