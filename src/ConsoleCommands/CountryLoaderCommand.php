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

/**
 * Class CountryLoaderCommand
 *
 * @package Awoods\World\ConsoleCommands
 */
class CountryLoaderCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("country:loader")
             ->setDescription("Create a PHP class for each Country in the data file.")
             ->addOption('continent', 'c', InputOption::VALUE_REQUIRED, 'Filter by Continent')
             ->addOption('factory', 'f', InputOption::VALUE_NONE, 'Display factory code')
             ->addArgument('csv-filename', InputArgument::REQUIRED, 'the name of your PHP class');
    }

    /**
     * {@inheritdoc}
     */
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

        if (isset($options['factory'])) {
            $this->generateFactoryCode($data);
        }

        echo PHP_EOL;
        echo PHP_EOL;
        echo $this->getAllCountriesCode($data);
    }

    /**
     * @param $data
     *
     * @return string
     */
    public function getAllCountriesCode($data)
    {
        $output = '';
        foreach ($data as $row) {
           $output .= $this->getAllCountriesTemplate($row['iso3166_1_alpha_2'], $row['name']) . PHP_EOL;
        }

        return $output;
    }

    /**
     * Display the factory code to STDOUT
     *
     * this code should be copy/pasted into the CountryFactory
     *
     * @param $data
     *
     * @return void
     */
    protected function generateFactoryCode($data)
    {
        $output = '';
        foreach ($data as $row) {
            $nameGenerator = new ClassNameGenerator();
            $className = $nameGenerator->generate($row['name']);

            $classTemplate = $this->getFactoryTemplate($className, $row);
            if (CountryFactory::hasPostalAndPhoneSupport($row['iso3166_1_alpha_2'])) {
                $classTemplate = $this->getExtendedClassFactoryTemplate($className, $row);
            }

            $output .= $classTemplate;
        }

        echo $output;
    }

    /**
     * @param $data
     */
    protected function generateClassFiles($data)
    {
        foreach ($data as $row) {
            if (CountryFactory::hasPostalAndPhoneSupport($row['iso3166_1_alpha_2'])) {
                $nameGenerator = new ClassNameGenerator();
                $className = $nameGenerator->generate($row['name']);

                $countryClassTemplate = new BaseCountryFactoryTemplate();
                $classTemplate = $countryClassTemplate->render($row);

                $file = new CountryFile();
                $filename = $file->createCountryFilename($className, $row['continent']);
                $isWritten = $file->write($filename, $classTemplate);

                $writtenMessage = ($isWritten) ? 'was written successfully' : 'could not be written';

                echo "{$filename} {$writtenMessage} for {$row['name']}\n";
            }
        }
    }

    /**
     * parse the country data file and load it into an array
     *
     * @param $filename
     * @param $options
     *
     * @return array
     */
    protected function parseFile($filename, $options)
    {
        $parser = new CountryDataParser($filename);
        return $parser->parse($options);
    }

    /**
     * @param $className
     * @param bool $data
     *
     * @return string
     */
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

    /**
     * @param $className
     * @param $data
     *
     * @return string
     */
    protected function getExtendedClassTemplate($className, $data)
    {
    }

    /**
     * @param $className
     * @param bool $data
     *
     * @return string
     */
    protected function getFactoryTemplate($className, $data = false)
    {
    }

    /**
     * @param $className
     * @param bool $data
     *
     * @return string
     */
    protected function getExtendedClassFactoryTemplate($className, $data = false)
    {
        $factoryTemplate = new CountryFactoryTemplate();

        return $factoryTemplate->render($className, $data);
    }


    /**
     * @param $countryCode
     * @param $countryName
     *
     * @return string
     */
    protected function getAllCountriesTemplate($countryCode, $countryName)
    {

        $factoryTemplate = <<<ALL_COUNTRIES
            '{$countryCode}' => '{$countryName}',
ALL_COUNTRIES;

        return $factoryTemplate;
    }
}
