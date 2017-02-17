<?php

/**
 * Class MultiLoader
 *
 * Make it easy to autoload multiple directories
 *
 */
class MultiLoader
{

    /**
     * @var array hold the list of directories to be checked for classes
     */
    protected $directoryList = array();


    /**
     * MultiLoader constructor.
     */
    public function __construct()
    {
    }


    /**
     * Add directory to list of places to check
     *
     * @param $dir
     *
     * @return void
     */
    public function addDirectory($dir)
    {

        // normalize the base directory with a trailing separator
        $base_dir = rtrim($dir, DIRECTORY_SEPARATOR) . '/';

        array_push($this->directoryList, $base_dir);
    }


    /**
     * Loads the class file for a given class name.
     *
     * @param string $class The fully-qualified class name.
     *
     * @return boolean
     */
    public function loadAsPsr4($class)
    {
        foreach ($this->directoryList as $baseDir) {

            $file = $baseDir
                    . str_replace('\\', '/', $class)
                    . '.php';

            if (file_exists($file)) {
                require_once $file;

                break;
            }
        }
    }

	/**
	 * Loads the class file for a given class name.
	 *
	 * @param string $class The fully-qualified class name.
	 *
	 * @return boolean
	 */
	public function loadSrcDirectory($className, $baseDir, $classPath)
	{
		//error_log('className=' . $className);
		//error_log('baseDir=' . $baseDir);
		//error_log('classPath=' . $classPath);

		$className = str_replace('\\', '/', $className);
		$className = str_replace($classPath, '', $className);
		//error_log('className=' . $className);

		$file = $baseDir
				. $className
				. '.php';
		//error_log('file=' . $file);

		if (file_exists($file)) {
			require_once $file;
		}
	}

}
