#!/usr/bin/env php
<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

$projectPath = dirname(dirname(__FILE__ ));

require_once $projectPath . '/vendor/autoload.php';

use Awoods\World\ConsoleCommands\CountryCreateCommand;
use Awoods\World\ConsoleCommands\CountryLoaderCommand;
use Symfony\Component\Console\Application;

$application = new Application('World Application');

// Register your commands
$application->add(new CountryCreateCommand());
$application->add(new CountryLoaderCommand());

$application->run();
