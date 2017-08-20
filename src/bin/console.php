#!/usr/bin/env php
<?php
/**
 * The World project
 */
$projectPath = dirname(dirname(__FILE__ ));
require_once $projectPath . '/vendor/autoload.php';
require_once $projectPath . '/ConsoleCommands/CountryCreateCommand.php';

use Awoods\World\ConsoleCommands\CountryCreateCommand;
use Symfony\Component\Console\Application;

$application = new Application('World Country Creation Tool');

// Register your commands
$application->add(new CountryCreateCommand());

$application->run();