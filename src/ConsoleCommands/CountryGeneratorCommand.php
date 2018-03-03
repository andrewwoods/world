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

use Awoods\World\CountryFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class CountryGeneratorCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("country:generator")
             ->setDescription("Create the for a single Country in the data file.")
             ->addOption('country', 'c', InputOption::VALUE_REQUIRED, 'Filter by Continent')
             ->addArgument('csv-filename', InputArgument::REQUIRED, 'the name of your PHP class');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $parser = new CountryDataParser($input->getArgument('csv-filename'));
        $fileData = $parser->parse();

        $countryData = $this->findRowByCountry($fileData, $input->getOption('country'));

        $classNameGenerator = new ClassNameGenerator();
        $className = $classNameGenerator->generate($countryData['name']);

        if (CountryFactory::hasPostalAndPhoneSupport($countryData['iso3166_1_alpha_2'])) {
            $factoryTemplate = new CountryFactoryTemplate();
            echo $factoryTemplate->render($className, $countryData);
        } else {
            $factoryTemplate = new BaseCountryFactoryTemplate();
            echo $factoryTemplate->render($countryData);
        }

        echo "\n\n-----\n\n";

        $countryClassTemplate = new CountryClassTemplate();
        echo $countryClassTemplate->render($className, $countryData);

    }

    /**
     * Search the $data for the $country and retrieve it.
     *
     * @param $data
     * @param $country
     *
     * @return array
     */
    protected function findRowByCountry($data, $country)
    {
        foreach ($data as $item) {
            if ($country === $item['iso3166_1_alpha_2'] ||
                $country === $item['official_name_en'] ||
                $country === $item['name']
            ){
                return $item;
            }
        }
    }


}
