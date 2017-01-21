<?php

/**
 *
 * Template inheritance
 * Rendering output based on views
 *
 * @package Bingo Framework
 * @author Lochemem Bruno Michael
 *
 */

namespace Core;

use App\Config;
use Core\Vendor;

class Views
{
	/**
	 *
	 * Generate absolute paths to a specified file
	 *
	 * @param string $file
	 *
	 * @return string absolute path to file
	 *
	 */

	public function createPath($file)
	{
		return str_replace(DIRECTORY_SEPARATOR, '/', dirname(__DIR__)) . '/' . $file;
	}

	/**
	 *
	 * @param string $view Absolute path to view file
	 * @param array $args Details to appear in the views
	 *
	 * @return void
	 *
	 */

	public function render($view, $args = [])
	{
		//variables to be displayed in the views
		extract($args, EXTR_SKIP);

		$file = $this->getPath() . $view;

<<<<<<< HEAD
		if (is_readable($file)){
			require $file;
		} else{
=======
		if (is_readable($file)) {
			require $file;
		} else {
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
			throw new \Exception("{$file} not found");
		}
	}

	/**
	 *
	 * Get the path of the PHP raw templates
	 *
	 * @param string $dir
	 *
	 * @return string $path
	 *
	 */

	public static function getPath($dir = null)
	{
		$view = new Views();
		if ($dir === null) {
			$path = $view->createPath('App/Views/');
		} else {
			$path = $view->createPath($dir);			
		}
		return $path;
	}
    
    /**
	 *
	 * Set the appropriate url path for client-side dependencies
	 *
	 * @param bool $scheme 
	 *
	 * @return string $scheme . $hostPath The appropriate URL
	 *
	 */
    
    public function setPath($scheme)
    {
        if (!is_bool($scheme)) {
            throw new \Exception("{$http}: value does not exist");
        }        
        $hostPath = $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];        
        if ($scheme === true) {
            return 'http://'. $hostPath;
        } else {
            return 'https://' . $hostPath;
        }
    }

	/**
	 *
	 * get the URL's for the client-side dependencies
	 *
	 * @param bool $scheme
	 * @param string $content The nature of the dependencies required (.css, .js, .jpg, .ttf)
	 *
	 * @return string $url Path to the desired dependency
	 *
	 */

<<<<<<< HEAD
	public static function returnURL($scheme, $content)
	{
        $views = new Views;
        switch ($content) {
=======
	public function setPath($scheme)
    {
        if (!is_bool($scheme)) {
            throw new \Exception("{$http}: value does not exist");
        }
        
        $hostPath = $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'];        
        
        if ($scheme === true) {
            return 'http://'. $hostPath;
        } else {
            return 'https://' . $hostPath;
        }
    }

	/**
	 *
	 * get the URL's for the client-side dependencies
	 *
	 * @param bool $scheme
	 * @param string $path
	 *
	 * @return string $url
	 *
	 */

	public static function returnURL($scheme, $path)
	{
        $views = new Views;
        switch ($path) {
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
            case 'font':
                $url = $views->setPath($scheme) . '/fonts/';
                break;
                
            case 'style':
                $url = $views->setPath($scheme) . '/styles/';
                break;
                
            case 'img':
                $url = $views->setPath($scheme) . '/img/';
                break;
                
            case 'js':
                $url = $views->setPath($scheme) . '/js/';
                break;
                
            default:
                throw new \Exception("{$path} does not exist");
                break;
        }
        return $url;
	}

	/**
	 *
	 * Use default view rendering dependencies(.js, .css, .php) for Mustache templates
	 *
	 * @return array  Default client-side dependencies
	 *
	 */
    
    public function renderMustacheDefaults($scheme, $title = null)
    {
        return [
            'title' => !is_null($title) ? $title : 'Bingo Framework',
            'stylesheet' => $this->setPath($scheme) . '/styles/main.css',
            'font' => $this->setPath($scheme) . '/fonts/Ubuntu.css'
        ];
    }
    
    /**
	 *
	 * Use default view rendering dependencies(.js, .css, .php) for Raw PHP templates
	 *
	 * @return array  Default client-side dependencies
	 *
	 */
    
    public function renderRawDefaults($scheme, $title = null)
	{
		return array_merge([
            'header' => $this->createPath('App/Views/Raw/base_header.php'),
            'footer' => $this->createPath('App/Views/Raw/base_footer.php')
        ], $this->renderMustacheDefaults($scheme, $title));        
<<<<<<< HEAD
	}    
=======
	}
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af

	/**
 	 *
 	 * Sanitize the values parsed to the template rendered
 	 *
 	 * @param string $input
 	 * @param int $input
 	 *
 	 *
 	 * @return string $data
 	 * @return int $data
 	 *
	 */

	public static function sanitize($input)
	{
		switch ($input) {
			case is_string($input):
<<<<<<< HEAD
				if (preg_match('/(?:http|https)?(?:\:\/\/)?(?:www.)?(([A-Za-z0-9-]+\.)*[A-Za-z0-9-]+\.[A-Za-z]+)(?:\/.*)?/im', $input)){
=======
				if (preg_match('/(?:http|https)?(?:\:\/\/)?(?:www.)?(([A-Za-z0-9-]+\.)*[A-Za-z0-9-]+\.[A-Za-z]+)(?:\/.*)?/im', $input)) {
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
					$data = filter_var($input, FILTER_SANITIZE_URL);
				} else {
					$data = htmlspecialchars(filter_var($input, FILTER_SANITIZE_STRING));
				}			
				break;

			case is_int($input):
				$data = filter_var($input, FILTER_VALIDATE_INT);
				echo "Integer";
				break;	
		}
		return $data;
	}

	public function filter($text)
	{
		$sanitized = [];
<<<<<<< HEAD
		if (!is_array($text)){
			throw new Exception("Please provide an array of strings");
		} else {
			for($x=0; $x<=count($text)-1; $x++){
=======
		if (!is_array($text)) {
			throw new Exception("Please provide an array of strings");
		} else {
			for ($x=0; $x<=count($text)-1; $x++) {
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
				$sanitized[] = [self::sanitize($text[$x])];
			}
		}
		return $sanitized;
	}

	/**
  	 * 
  	 * Render a Mustache template in the Mustache directory
  	 *
  	 * @param string $template
  	 * @param array $values
  	 *
  	 * @return $tmp->render($template, $values)
  	 *
	 */

	public function mustacheRender($template, $values)
	{
		$vendor = new Vendor();
		$vendor->loadPackage();
		$options = ['extension' => '.html'];
		$mustache = new \Mustache_Engine([
			'loader' => new \Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/App/Views/Mustache', $options),
			'cache' => $this->createPath(Config::CACHE_DIR . '/mustache'),
<<<<<<< HEAD
			'escape' => function ($value){
=======
            'escape' => function ($value){
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
				return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
			}
		]);
		$tmp = $mustache->loadTemplate($template);
		return $tmp->render($values);
	}
    
    /**
  	 * 
  	 * Compile LESS files and cache them
  	 *
  	 * @param string $input Input LESS file in the styles directory
  	 * @param string $output Name of the output LESS file
     * @param array $variables A PHP array of LESS variables
     * @param bool $comments A flag to determine whether or not to include comments in the output CSS file
     * 
     * @see http://leafo.net/lessphp/
     * @see http://lesscss.org/
  	 *
  	 * @return $this->createPath("public/styles/{$input}.css") The compiled CSS file
  	 *
	 */

	public function autoCompileLess($input, $output, $comments = true, $variables = null)
	{
		$vendor = new Vendor();
		$vendor->loadPackage();
		$cacheFile = $this->createPath(Config::CACHE_DIR . "/less/{$input}.cache"); //file to be cached
		if (file_exists($cacheFile)) {
			$cache = unserialize(file_get_contents($cacheFile));
		} else {
			$cache = $this->createPath("public/styles/{$input}.less");
		}
		$less = new \lessc;
        if ($comments !== true && is_bool($comments)) {
            $less->setPreserveComments(false);
        }
        
        $less->setPreserveComments(true);        
        $newCache = $less->cachedCompile($cache);
    
		if (!is_null($variables)) {
			if (is_array($variables)) {
				$less->setVariables($variables);
			} else {
				throw new \Exception("Invalid LESS variables");
			} 
		}

		if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
			file_put_contents($cacheFile, serialize($newCache));
			file_put_contents($this->createPath("public/styles/{$input}.css"), $newCache["compiled"]);
		}
        
        if (file_exists($this->createPath("public/styles/{$output}.css"))) {
            return $output . '.css';
        }
	}
    
    /**
     * 
     * Create markup from markdown
     *
     * @param string $markdown The string containing the markup you intend to convert
     * @param array $options An array of transformation options
     *
     * @see https://michelf.ca/projects/php-markdown/configuration/
     *
     * @return $parser->transform($markdown) The desired markup
     *
     */
    
    public function transformMarkdown($markdown, $options = null)
    {
        $vendor = new Vendor();
        $vendor->loadPackage();
        $parser = new \Michelf\Markdown;
        $parser->no_markup = false;        
        if (!is_null($options) && is_array($options)) {
            $match = function ($key, $array) {
                if (array_key_exists($key, $array)) {
                    return $array[$key];
                }
            };
            if (isset($options['urls']) && is_array($options['urls'])) {
                $parser->predef_urls = $options['urls'];
            }
            $parser->tab_width = $match('tab_width', $options);
            $parser->empty_element_suffix = $match('suffix', $options);
        }
        return $parser->transform($markdown);
    }
}