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
 * Class ClassNameGenerator
 *
 * @package Awoods\World\ConsoleCommands
 */
class ClassNameGenerator
{
    /**
     * Create a class name based on the country name
     *
     * @param string $name
     *
     * @return string
     */
    public function generate($name)
    {
        $name = $this->replaceForeignCharacters($name);
        $name = $this->replaceAmpersands($name);
        $name = $this->removeExtraSpaces($name);
        $name = ucwords($name, " \t\r\n\f\v\.");
        $name = $this->removePeriods($name);

        $className = preg_replace('/\s+/', '', $name);

        return $className;
    }

    /**
     * Remove foreign characters.
     *
     * Sometimes foreign characters can cause problems in class and file names; so replace them with equivalents.
     *
     * @param string $content
     *
     * @return string
     */
    private function replaceForeignCharacters($content)
    {
        $foreign = [
            'ç',
            'ô',
            'd',
            'ã',
            'í',
            'é',
            'Å',
        ];

        $english = [
            'c',
            'o',
            'd',
            'a',
            'i',
            'e',
            'A',
        ];

        return str_replace($foreign, $english, $content);
    }

    /**
     * Condense multiple spaces into a single space
     *
     * @param string $content
     *
     * @return string
     */
    private function removeExtraSpaces($content)
    {
        return preg_replace('/\s+/', ' ', $content);
    }

    /**
     * Replace the ampersands with the word 'And'
     *
     * @param string $content
     *
     * @return string mixed
     */
    private function replaceAmpersands($content)
    {
        return preg_replace('/\&+/', 'And', $content);
    }

    /**
     * Remove periods from the name
     *
     * @param string $content
     *
     * @return string
     */
    private function removePeriods($content)
    {
        return preg_replace('/\.+/', '', $content);
    }
}
