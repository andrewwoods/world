<?php
/**
 * @package Awoods\World
 */
namespace Awoods\World;

/**
 * Identify all the methods required for a country
 */
interface CountryInterface
{

    /**
     * Returns the common name of the country.
     *
     * The name that people would use in everyday conversation.
     *
     * @return string
     */
    public function getName();

    /**
     * Returns the official name of the country.
     *
     * @return string
     */
    public function getFullName();

}

