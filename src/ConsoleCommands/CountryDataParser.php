<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awoods\World\ConsoleCommands;


class CountryDataParser
{
    protected $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function parse(array $options = [])
    {
        $data = [];
        $fields = [
            'name',
            'official_name_en',
            'official_name_fr',
            'iso3166_1_alpha_2',
            'iso3166_1_alpha_3',
            'm49',
            'itu',
            'marc',
            'wmo',
            'ds',
            'dial',
            'fifa',
            'fips',
            'gaul',
            'ioc',
            'iso4217_alpha_code',
            'iso4217_country_name',
            'iso4217_minor_unit',
            'iso4217_name',
            'iso4217_numeric_code',
            'is_independent',
            'capital',
            'continent',
            'tld',
            'languages',
            'geoname_id',
            'edgar'
        ];

        $fh = fopen($this->filename, 'r');
        if ($fh !== false) {
            $counter = 0;
            while (($row = fgetcsv($fh)) !== false) {
                $counter++;
                if ($counter === 1) {
                    continue;
                }

                if ($row[0] === 'Antarctica') {
                    $row[1] = 'Antarctica';
                }

                if ($row[0] === 'US') {
                    $row[0] = 'United States';
                }

                if ($row[0] === 'UK') {
                    $row[0] = 'United Kingdom';
                }

                $record = array_combine($fields, $row);

                if (isset($options['continent']) && $record['continent'] !== $options['continent']) {
                    continue;
                }

                $data[] = $record;
            }

            fclose($fh);
        }

        return $data;
    }
}