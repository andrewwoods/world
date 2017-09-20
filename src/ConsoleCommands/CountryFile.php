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

/**
 * Class CountryFile
 *
 * @package Awoods\World\ConsoleCommands
 */
class CountryFile
{
    /**
     * Create full file path to country class
     *
     * @param $className
     * @param $continentCode
     *
     * @return string
     */
    public function createCountryFilename($className, $continentCode)
    {
        return dirname(__FILE__, 2) . "/{$continentCode}/{$className}.php";
    }

    /**
     * Write the content to the specified file name
     *
     * @param $filename
     * @param $content
     *
     * @return bool
     */
    public function write($filename, $content)
    {
        $bytes = file_put_contents($filename, $content);

        if ($bytes === false) {
            return false;
        }

        return true;
    }
}
