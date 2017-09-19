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


class ClassNameGenerator
{
    public function generate($name)
    {
        $name = $this->removeSpecialCharacters($name);
        $name = $this->removeAmpersands($name);
        $name = $this->removeExtraSpaces($name);
        $name = ucwords($name, " \t\r\n\f\v\.");
        $name = $this->removePeriods($name);

        $className = preg_replace('/\s+/', '', $name);

        return $className;
    }

    private function removeSpecialCharacters($content)
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

    private function removeExtraSpaces($content)
    {
        return preg_replace('/\s+/', ' ', $content);
    }

    private function removeAmpersands($content)
    {
        return preg_replace('/\&+/', 'And', $content);
    }

    private function removePeriods($content)
    {
        return preg_replace('/\.+/', '', $content);
    }

}