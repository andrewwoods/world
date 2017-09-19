<?php
/**
 * This is part of the World project
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