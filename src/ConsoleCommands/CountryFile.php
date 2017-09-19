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


class CountryFile
{

    public function createCountryFilename($className, $continentCode)
    {
        return dirname(__FILE__, 2) . "/{$continentCode}/{$className}.php";
    }

    public function write($filename, $content)
    {
        $bytes = file_put_contents($filename, $content);

        if ($bytes === false) {
            return false;
        }

        return true;
    }


}