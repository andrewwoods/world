<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awoods\World\NA;

use Awoods\World\Country;
use Awoods\World\ContinentFactory;
use Awoods\World\PhoneNumberInterface;
use Awoods\World\Traits\NorthAmericanPhoneNumber;

/**
 * Class PuertoRico.
 */
class PuertoRico extends Country
{
    use NorthAmericanPhoneNumber;

    /**
     * @var array specific area codes.
     */
    private $areaCodes = ['787', '939'];

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'PR',
            'PRI',
            'USD',
            'Puerto Rico',
            'Puerto Rico',
            ContinentFactory::get("NA")
        );
    }
}
