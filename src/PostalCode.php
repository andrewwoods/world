<?php
namespace Awoods\World;

/**
 * @package Awoods\World
 */
interface PostalCode
{
    /**
     * Check the correctness of the postal code using a simple interpretation
     *
     * @param string $postalCode
     * @return bool
     */
    public function isPostalCodeValid($postalCode);



    /**
     * Check the correctness of the postal code using a formal or strict interpretation
     *
     * @param string $postalCode
     * @return bool
     */
    public function isPostalCodeStrictValid($postalCode);

}