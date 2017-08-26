<?php
/**
 * This is part of the World project.
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

    /** @var int */
    protected $isoNumericCode;

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
     * @param int $isoNumericCode the numeric code from ISO 3166
     * @param string $commonName The country name most people use
     * @param string $officialName The country's official name
     * @param Continent $continent
     */
    public function __construct(
        string $iso2LetterCode,
        string $iso3LetterCode,
        int $isoNumericCode,
        string $commonName,
        string $officialName,
        Continent $continent
    ) {
        $this->code = $iso2LetterCode;
        $this->iso3LetterCode = $iso3LetterCode;
        $this->isoNumericCode = $isoNumericCode;
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
    public function getIsoNumericCode() : int
    {
        return $this->isoNumericCode;
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