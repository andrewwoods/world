<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awoods\World;

/**
 * Class Continent
 *
 * @package Awoods\World
 */
class Continent
{
    /** @var string */
    protected $abbr;

    /** @var  string */
    protected $name;

    /** @var array */
    protected $countries = [];

    /**
     * Continent constructor.
     *
     * @param $abbr string Two-letter abbreviation
     * @param $name string Full name of the continent
     */
    public function __construct($abbr, $name)
    {
        $this->abbr = $abbr;
        $this->name = $name;
    }

    /**
     * Get the 2-letter abbreviation
     *
     * @return string
     */
    public function getAbbr() : string
    {
        return $this->abbr;
    }

    /**
     * The name of the Continent
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
}