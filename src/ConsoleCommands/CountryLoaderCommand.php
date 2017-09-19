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

use Awoods\World\ContinentFactory;
use Awoods\World\CountryFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use InvalidArgumentException;


class CountryLoaderCommand extends Command
{

    protected function configure()
    {
        $this->setName("country:loader")
             ->setDescription("Create a PHP class for the Country.")
             ->addOption('continent', 'c', InputOption::VALUE_REQUIRED,'Filter by Continent')
             ->addOption('factory', 'f', InputOption::VALUE_NONE,'Display factory code')
             ->addArgument('csv-filename', InputArgument::REQUIRED, 'the name of your PHP class');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $options = [];

        $csvFile = $input->getArgument('csv-filename');
        $options['csv-filename'] = filter_var($csvFile, FILTER_SANITIZE_STRING);

        $continent = $input->getOption('continent');
        $options['continent'] = filter_var($continent, FILTER_SANITIZE_STRING);

        $factory = $input->getOption('factory');
        $options['factory'] = filter_var($factory, FILTER_SANITIZE_STRING);

        $output->writeln('File: ' . $options['csv-filename']);

        $data = $this->parseFile($csvFile, $options);

        $this->generateClassFiles($data);

        if (isset($options['factory'])){
            $this->generateFactoryCode($data);
        }
    }

    protected function generateFactoryCode($data)
    {
        $output = '';
        foreach ($data as $row){
            $nameGenerator = new ClassNameGenerator();
            $className = $nameGenerator->generate($row['name']);

            $classTemplate = $this->getFactoryTemplate($className, $row);
            if (CountryFactory::hasPostalAndPhoneSupport($row['iso3166_1_alpha_2'])){
                $classTemplate = $this->getExtendedClassFactoryTemplate($className, $row);
            }

            $output .= $classTemplate;
        }

        echo $output;
    }


    protected function generateReport($data)
    {
        $continent = [];
        $currency = [];

        foreach ($data as $record)
        {
            if ( ! isset($continent[ $record['continent'] ])){
                $continent[ $record['continent'] ] = 0;
            }
            $continent[ $record['continent'] ]++;

            if ( ! isset($currency[ $record['iso4217_alpha_code'] ])){
                $currency[ $record['iso4217_alpha_code'] ] = 0;
            }
            $currency[ $record['iso4217_alpha_code'] ]++;
        }

        $this->reportItem('Continent', $continent);
        $this->reportItem('Currency', $currency);
    }

    protected function reportItem($title, $data){
        echo "\nTitle: {$title}\n";
        foreach ($data AS $key => $value){
            echo "\t{$key}: {$value}\n";
        }
    }

    protected function generateClassFiles($data)
    {
        foreach ($data as $row){
            if (CountryFactory::hasPostalAndPhoneSupport($row['iso3166_1_alpha_2'])) {
                $nameGenerator = new ClassNameGenerator();
                $className = $nameGenerator->generate($row['name']);

                $classTemplate = $this->getExtendedClassTemplate($className, $row);

                $file = new CountryFile();
                $filename = $file->createCountryFilename($className, $row['continent']);
                $isWritten = $file->write($filename, $classTemplate);

                $writtenMessage = ($isWritten) ? 'was written successfully' : 'could not be written';

                echo "{$filename} {$writtenMessage} for {$row['name']}\n";
            }
        }
    }


    protected function parseFile($filename, $options)
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

        $fh = fopen($filename,'r');
        if ($fh !== false)
        {
            $counter = 0;
            while (($row = fgetcsv($fh)) !== false) {
                $counter++;
                if ($counter === 1){
                    continue;
                }

                if ($row[0] === 'Antarctica'){
                    $row[1] = 'Antarctica';
                }

                if ($row[0] === 'US'){
                    $row[0] = 'United States';
                }

                if ($row[0] === 'UK'){
                    $row[0] = 'United Kingdom';
                }

                $record = array_combine($fields, $row);

                if ($options['continent'] && $record['continent'] !== $options['continent']){
                    continue;
                }

                $data[] = $record;
            }

            fclose($fh);
        }

        return $data;
    }

    protected function getClassTemplate($className, $data = false)
    {

        if ($data === false || ! is_array($data)) {
            throw new InvalidArgumentException();
        }


        $classTemplate = <<<CLASS_TEMPLATE
<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

/**
 * Class {$className}.
 */
class {$className} extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            '{$data['iso3166_1_alpha_2']}',
            '{$data['iso3166_1_alpha_3']}',
            '{$data['iso4217_alpha_code']}',
            '{$data['name']}',
            '{$data['official_name_en']}',
            ContinentFactory::get({$data['continent']})
        );
    }
}

CLASS_TEMPLATE;

        return $classTemplate;
    }

    protected function getExtendedClassTemplate($className, $data){
    $nameSpace = "Awoods\\World\\" . $data['continent'];
        $classTemplate = <<<CLASS_TEMPLATE
<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace {$nameSpace};

use Awoods\World\Country;
use Awoods\World\ContinentFactory;

/**
 * Class {$className}.
 */
class {$className} extends Country
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            '{$data['iso3166_1_alpha_2']}',
            '{$data['iso3166_1_alpha_3']}',
            '{$data['iso4217_alpha_code']}',
            '{$data['name']}',
            '{$data['official_name_en']}',
            ContinentFactory::get("{$data['continent']}")
        );
    }
}

CLASS_TEMPLATE;

        return $classTemplate;
    }

    protected function getFactoryTemplate($className, $data = false)
    {
        if ($data === false) {
            throw new InvalidArgumentException();
        }

        $factoryTemplate = <<<FACTORY

            case '{$data['iso3166_1_alpha_2']}':
            case '{$data['iso3166_1_alpha_3']}':
                return new Country(
                    '{$data['iso3166_1_alpha_2']}',
                    '{$data['iso3166_1_alpha_3']}',
                    '{$data['iso4217_alpha_code']}',
                    '{$data['name']}',
                    '{$data['official_name_en']}',
                    ContinentFactory::get('{$data['continent']}')
                );
                break;

FACTORY;

        return $factoryTemplate;
    }

    protected function getExtendedClassFactoryTemplate($className, $data = false)
    {
        if ($data === false) {
            throw new InvalidArgumentException();
        }

        $factoryTemplate = <<<FACTORY

            case '{$data['iso3166_1_alpha_2']}':
            case '{$data['iso3166_1_alpha_3']}':
                return new {$className}();
                break;

FACTORY;

        return $factoryTemplate;
    }
}
