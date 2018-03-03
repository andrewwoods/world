#!/usr/bin/env php
<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'vendor/autoload.php';

use Awoods\World\ConsoleCommands\CountryLoaderCommand;
use Awoods\World\ConsoleCommands\CountryGeneratorCommand;
use Symfony\Component\Console\Application;

$application = new Application('World Application', '0.1.0');

// Register your commands
$application->add(new CountryLoaderCommand());
$application->add(new CountryGeneratorCommand());

$application->run();
