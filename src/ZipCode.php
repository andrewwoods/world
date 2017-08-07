<?php

namespace Awoods\World;

/**
 * Trait to handle postal codes for the United States
 *
 * @package Awoods\World
 */
trait ZipCode
{

    /**
     * Determine if a value looks like a ZIP code
     *
     * The simple validation only checks for the 5-digit ZIP code value.
     * The strict validation checks for ZIP and ZIP+4 values.
     *
     * @param string $zipCode
     * @param bool $strict Use a strict interpretation. Default is false.
     *
     * @return bool
     */
    public function isZipCodeValid($zipCode, $strict = false)
    {
        $regex = '/^\d{5}$/';
        if ($strict) {
            $regex = '/^\d{5}(-\d{4})?$/';
        }

        preg_match($regex, $zipCode, $matches);

        if (isset($matches[0]) && $matches[0] === $zipCode) {
            return true;
        }

        return false;
    }
}
