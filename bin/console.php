#!/usr/bin/env php
<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

require_once '../vendor/autoload.php';

use Awoods\World\ConsoleCommands\CountryLoaderCommand;
use Symfony\Component\Console\Application;

$application = new Application('World Application');

// Register your commands
$application->add(new CountryLoaderCommand());

$application->run();
