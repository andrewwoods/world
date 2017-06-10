<?php
/*
 * Use this file to add ability to get your test to use your application code
 */

require_once 'vendor/autoload.php';

/**
 * Register for the SPL autoload
 *
 * Simple wrapper function to simplify autoloading
 * of multiple directories.
 *
 *
 * @param string $class
 *
 * @return void
 */
function multiAutoload($class)
{
	$srcPath = __DIR__ . '/src';

    $loader = new MultiLoader();
    $loader->loadSrcDirectory($class, $srcPath, 'Awoods/World');
}


