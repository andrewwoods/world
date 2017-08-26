<?php
/**
 * This is part of the World project.
 */

namespace Awoods\World;

/**
 * Class Continent
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
     * @return string
     */
    public function getAbbr() : string
    {
        return $this->abbr;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
}