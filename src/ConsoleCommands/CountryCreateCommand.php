<?php
/**
 * Created by PhpStorm.
 * User: awoods
 * Date: 2017-08-19
 * Time: 06:20
 */
namespace Awoods\World\ConsoleCommands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use InvalidArgumentException;


class CountryCreateCommand extends Command
{

    protected function configure(){
        $this->setName("Country:create")
             ->setDescription("Create a PHP class for the Country.")
             ->addOption('numeric', 'u', InputOption::VALUE_REQUIRED, 'numeric ISO country code', 0)
             ->addOption('two-letter', '2', InputOption::VALUE_REQUIRED, '2-letter ISO country code e.g. US for United States', '')
             ->addOption('three-letter', '3', InputOption::VALUE_REQUIRED, '3-letter ISO country code e.g. US for United States', '')
             ->addArgument('ClassName', InputArgument::REQUIRED, 'the name of your PHP class')
             ->addArgument('OfficialName', InputArgument::REQUIRED, 'the official name of the country')
             ->addArgument('CommonName', InputArgument::OPTIONAL, 'the name most people use for the country')
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $clean = [];

        $numeric = $input->getOption('numeric');
        $clean['numeric'] = filter_var($numeric, FILTER_SANITIZE_NUMBER_INT, FILTER_VALIDATE_INT);

        $twoLetter = $input->getOption('two-letter');
        $twoLetter = filter_var($twoLetter, FILTER_SANITIZE_STRING);
        $clean['two-letter'] = strtoupper($twoLetter);

        $threeLetter = $input->getOption('three-letter');
        $threeLetter = filter_var($threeLetter, FILTER_SANITIZE_STRING);
        $clean['three-letter'] = strtoupper($threeLetter);

        $className = $input->getArgument('ClassName');
        $clean['ClassName'] = filter_var($className, FILTER_SANITIZE_STRING);

        $officialName = $input->getArgument('OfficialName');
        $clean['officialName'] = filter_var($officialName, FILTER_SANITIZE_STRING);

        $commonName = $input->getArgument('CommonName');
        $commonName = filter_var($commonName, FILTER_SANITIZE_STRING);
        if ($commonName === null){
            $commonName = $officialName;
        }
        $clean['commonName'] = $commonName;

        $template = $this->getTemplate($clean);

        $output->writeln('numeric: ' . $clean['numeric']);
        $output->writeln('two-letter: ' . $clean['two-letter']);
        $output->writeln('three-letter: ' . $clean['three-letter']);
        $output->writeln('ClassName: ' . $className);
        $output->writeln('Official Name: ' . $officialName);
        $output->writeln('Common Name: ' . $commonName);
        $output->writeln('');
        $output->writeln($template);
        $output->writeln('');
    }

    protected function getTemplate($data = false){

        if ($data === false || ! is_array($data)){
            throw new InvalidArgumentException();
        }

        $classTemplate = <<<CLASS_TEMPLATE
/**
 * This is part of the World project. 
 * 
 * 
 */

/**
 * Class {$data['ClassName']}.
 */
class {$data['ClassName']} implements CountryInterface
{
  
    /**
     * Constructor.
     */ 
    public function __construct()
    {
    }


    /**
     * Returns the common name of the country.
     *
     * The name that people would use in everyday conversation.
     *
	 * @return string
     */
	public function getName()
	{
		return '{$data['commonName']}';
	}


	/**
     * Returns the official name of the country.
     *
	 * @return string
	 */
	public function getOfficialName()
	{
		return '{$data['officialName']}';
	}


    /**
     * Return a list of all major areas
     *
     * These area are like states in the US, and Provinces in Canada. 
     * Different countries have different names for these areas. 
     *
     * @return array
     */
	public function getLocalityList()
    {
        return [
            'AA' => 'Name',
        ];
    }
   
}

CLASS_TEMPLATE;

        return $classTemplate;
    }

}