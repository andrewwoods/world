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
 * @package Awoods\World
 */
interface PostalCodeInterface
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