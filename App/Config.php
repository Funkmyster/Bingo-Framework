<?php

/**
 *
 * Configuration options for the Bingo Framework
 *
 * @package Bingo Framework
 * @author Lochemem Bruno Michael
 *
 */

namespace App;

class Config
{
	/**
	 *
	 * Database user-name parameter
	 *
	 * @var string DB_USER
	 * 
	 */

	const DB_USER = 'root';

	/**
	 *
	 * Database database host parameter
	 *
	 * @var string DB_HOST
	 * 
	 */

	const DB_HOST = 'localhost';

	/**
	 *
	 * Database user-password parameter
	 *
	 * @var string DB_PASS
	 * 
	 */

	const DB_PASS = '';

	/**
	 *
	 * Database name parameter
	 *
	 * @var string DB_NAME
	 * 
	 */

	const DB_NAME = '';
		
	/**
	 *
	 * Show errors or convert them into readable logs
	 * Set to false in production
	 *
	 * @var bool SHOW_ERRORS
	 * 
	 */

	const SHOW_ERRORS = true;

	 /**
	 *
	 * Dependency directory
	 * @see composer.json for the name of the root dependency folder
	 *
	 * @var string DEP_ROOT
	 * 
	 */

	const DEP_ROOT = 'packages';
<<<<<<< HEAD
	
	/**
	 *
	 * Cache directory
=======
    
    /**
	 *
	 * Cache directory for
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
	 *
	 * @var string CACHE_DIR
	 *
	 */
<<<<<<< HEAD
	
	const CACHE_DIR = 'cache';
    
    /**
     *
     * Show configuration options
     *
     * @return function $class->showConstants()
     *
     */
    
    public static function getConstants()
    {
        $class = new \ReflectionClass(__CLASS__);
        return $class->getConstants();
    }
}
=======
    
    const CACHE_DIR = 'cache';
    
    /**
     *
     * Method to return all the Configuration options
     *
     * @return $reflectionClass->getConstants() 
     *
     */
    
    public function getConstants()
    {
        $reflectionClass = new ReflectionClass(__CLASS__);
        return $reflectionClass->getConstants();
    }
}
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
