<?php
/**
 * Created by PhpStorm.
 * User: awoods
 * Date: 2017-08-19
 * Time: 06:20
 */

namespace Awoods\World\ConsoleCommands;

use Awoods\World\ContinentFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use InvalidArgumentException;


class CountryLoaderCommand extends Command
{

    protected function configure()
    {
        $this->setName("country:loader")
             ->setDescription("Create a PHP class for the Country.")
             ->addOption('continent', 'c', InputOption::VALUE_REQUIRED,'Filter by Continent')
             ->addArgument('csv-filename', InputArgument::REQUIRED, 'the name of your PHP class');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $options = [];

        $csvFile = $input->getArgument('csv-filename');
        $options['csv-filename'] = filter_var($csvFile, FILTER_SANITIZE_STRING);

        $continent = $input->getOption('continent');
        $options['continent'] = filter_var($continent, FILTER_SANITIZE_STRING);

        $output->writeln('File: ' . $options['csv-filename']);

        $data = $this->parseFile($csvFile, $options);

        // $this->generateReport($data);

        $this->generateClassFiles($data);
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
            $className = $this->generateClassName($row['name']);
            $classTemplate = $this->getClassTemplate($className, $row);
            // echo "name={$row['name']} className={$className}\n";

            $filename = $this->createFilename($className);
            $isWritten = $this->writeFile($filename, $classTemplate);

            $writtenMessage = ($isWritten) ? 'was written successfully' : 'could not be written';

            echo "{$filename} {$writtenMessage} for {$row['name']}\n";
        }
    }

    protected function generateClassName($name)
    {
        $name = $this->removeAmpersands($name);
        $name = $this->removeExtraSpaces($name);
        $name = ucwords($name, " \t\r\n\f\v\.");
        $name = $this->removePeriods($name);

        $className = preg_replace('/\s+/','', $name);

        return $className;
    }

    private function removeExtraSpaces($content){
        return preg_replace('/\s+/',' ', $content);
    }

    private function removeAmpersands($content){
        return preg_replace('/\&+/','And', $content);
    }

    private function removePeriods($content){
        return preg_replace('/\.+/','', $content);
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

    protected function createFilename($className)
    {
        return dirname(__FILE__, 2) . "/{$className}.php";
    }


    protected function writeFile($filename, $content)
    {
        $bytes = file_put_contents($filename, $content);

        if ($bytes === false) {
            return false;
        }

        return true;
    }

    protected function getClassTemplate($className, $data = false)
    {

        if ($data === false || ! is_array($data)) {
            throw new InvalidArgumentException();
        }

        switch ($data['continent'])
        {
            case 'AF':
                $data['continent_constant'] = 'ContinentFactory::AFRICA_CODE';
                break;
            case 'AN':
                $data['continent_constant'] = 'ContinentFactory::ANTARCTICA_CODE';
                break;
            case 'AS':
                $data['continent_constant'] = 'ContinentFactory::ASIA_CODE';
                break;
            case 'EU':
                $data['continent_constant'] = 'ContinentFactory::EUROPE_CODE';
                break;
            case 'NA':
                $data['continent_constant'] = 'ContinentFactory::NORTH_AMERICA_CODE';
                break;
            case 'OC':
                $data['continent_constant'] = 'ContinentFactory::OCEANIA_CODE';
                break;
            case 'SA':
                $data['continent_constant'] = 'ContinentFactory::SOUTH_AMERICA_CODE';
                break;
            default:
                $data['continent_constant'] = '';
                break;
        }

        $classTemplate = <<<CLASS_TEMPLATE
/**
 * This is part of the World project. 
 * 
 */

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
            ContinentFactory::get({$data['continent_constant']})
        );
    }
   
}

CLASS_TEMPLATE;

        return $classTemplate;
    }

    protected function getFactoryTemplate($data = false)
    {
        if ($data === false) {
            throw new InvalidArgumentException();
        }

        $factoryTemplate = <<<FACTORY

            case '{$data['two-letter']}':
	        case '{$data['three-letter']}':
	        case {$data['numeric']}:
                return new {$data['class-name']}();
                break;

FACTORY;

        return $factoryTemplate;

    }
}