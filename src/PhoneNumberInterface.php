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
 * Interface PhoneNumberInterface
 *
 * @package Awoods\World
 */
interface PhoneNumberInterface
{
    /**
     * Determine if it looks a valid phone number, using a simple understanding of the format
     *
     * @param $phone
     *
     * @return bool
     */
    public function isPhoneNumberValid($phone) : bool;

    /**
     * Determine if it looks a valid phone number, using a stricter, technically correct understanding of the format.
     *
     * @param $phone
     *
     * @return bool
     */
    public function isPhoneNumberStrictValid($phone) : bool;
}