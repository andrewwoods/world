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
 * Class Country
 * @package Awoods\World
 */
class Country
{
    /** @var string */
    protected $code;

    /** @var string */
    protected $iso3LetterCode;

    /** @var string */
    protected $isoCurrencyCode;

    /** @var string */
    protected $commonName;

    /** @var string */
    protected $officialName;

    /** @var Continent */
    protected $continent;

    /**
     * Country constructor.
     *
     * @param string $iso2LetterCode the 2 character code from ISO 3166-2
     * @param string $iso3LetterCode the 3 character code from ISO 3166-3
     * @param string $isoCurrencyCode the numeric code from ISO 4217
     * @param string $commonName The country name most people use
     * @param string $officialName The country's official name
     * @param Continent $continent
     */
    public function __construct(
        string $iso2LetterCode,
        string $iso3LetterCode,
        string $isoCurrencyCode,
        string $commonName,
        string $officialName,
        Continent $continent
    ) {
        $this->code = $iso2LetterCode;
        $this->iso3LetterCode = $iso3LetterCode;
        $this->isoCurrencyCode = $isoCurrencyCode;
        $this->commonName = $commonName;
        $this->officialName = $officialName;
        $this->continent = $continent;
    }

    /**
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getIso3LetterCode() : string
    {
        return $this->iso3LetterCode;
    }

    /**
     * @return int
     */
    public function getIsoCurrencyCode() : int
    {
        return $this->isoCurrencyCode;
    }

    /**
     * @return Continent
     */
    public function getContinent() : Continent
    {
        return $this->continent;
    }

    /**
     * Returns the common name of the country.
     *
     * The name that people would use in everyday conversation.
     *
     * @return string
     */
    public function getCommonName() : string
    {
        return $this->commonName;
    }

    /**
     * Returns the official name of the country.
     *
     * @return string
     */
    public function getOfficialName() : string
    {
        return $this->officialName;
    }
}