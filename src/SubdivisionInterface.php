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
 * Identify all the methods required for a country
 */
interface SubdivisionInterface
{
    /**
     * List of geographic areas used to divide a country.
     *
     * Countries divide themselves into areas. Countries have different
     * names for these areas. In the US, they're called states, but other
     * countries might call them provinces, regions, or districts.
     *
     * @return array
     */
    public function getSubdivisionList();
}

