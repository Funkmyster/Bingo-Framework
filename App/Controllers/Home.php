<?php

/**
 *
 * @package Bingo Framework
 * @author Lochemem Bruno Michael
 *
 * Home Controller
 *
 *
 */
	
namespace App\Controllers;

use \Core\Views;
use \App\Config;

class Home extends \Core\Controller
{
	public function indexAction()
	{
<<<<<<< HEAD
		$view = new Views();
		$view->render('Home/index.php', [
			'title' => 'Bingo Framework',
			'short_desc' => 'You might enjoy...',
			'header' => Views::getPath() . 'Raw/base_header.php',
			'footer' => Views::getPath() . 'Raw/base_footer.php',
			'stylesheet' => Views::returnURL(true, 'style') . 'main.css',
			'font' => $view->returnURL(true, 'font') . 'Ubuntu.css',
			'js' => $view->returnURL(true, 'js') . 'controller.js',
			'plans' => ['Reusable templates', 'MVC', 'Design simplicity'],
			'links' => [
				['http://localhost:'. $_SERVER['SERVER_PORT'] .'/home/index', 'Home'], 
				['http://localhost:'. $_SERVER['SERVER_PORT'] .'/home/about', 'About'], 
=======
		$views = new Views();
        $options = array_merge([
            'short_desc' => 'You might also enjoy...',
            'plans' => ['Reusable templates', 'MVC', 'Design Simplicity'],
            'links' => [
                ['http://localhost:' . $_SERVER['SERVER_PORT'] . '/home/index', 'Home'], 
				['http://localhost:' . $_SERVER['SERVER_PORT'] . '/home/about', 'About'], 
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
				['https://github.com/ace411/Bingo-Framework', 'Documentation'], 
				['https://github.com/ace411/Bingo-Framework', 'GitHub']
            ]
        ], $views->renderRawDefaults(true));
		$views->render('Home/index.php', $options);
	}

	public function aboutAction()
	{
		$views = new Views;
        $options = array_merge([
            'title_one' => 'Bingo is easy to understand',
			'bloc_one' => "
				Bingo is built in accordance with MVC standards. If you decide to
				use the framework, you will interact with Bingo's controllers, views,
				and models to simplify the website creation process. 
			",
			'title_two' => 'Bingo offers flexibility',
			'bloc_two' => "
				Bingo will grant whoever uses it the ability 
				to chose the template engine that best suits their needs.
				Mustache syntax and customizable, 'raw-PHP' templates are both 
				available. 
			",
			'title_three' => 'Bingo is my digital Frankenstein',
			'bloc_three' => "
				Bingo is the brain-child of Lochemem Bruno Michael; a college student
				motivated by the need to solve problems.
			",
			'links' => [
<<<<<<< HEAD
				['http://localhost:'. $_SERVER['SERVER_PORT'] .'/home/index', 'Home'], 
				['http://localhost:'. $_SERVER['SERVER_PORT'] .'/home/about', 'About'], 
=======
				['http://localhost:' . $_SERVER['SERVER_PORT'] . '/home/index', 'Home'], 
				['http://localhost:' . $_SERVER['SERVER_PORT'] . '/home/about', 'About'], 
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
				['https://github.com/ace411/Bingo-Framework', 'Documentation'], 
				['https://github.com/ace411/Bingo-Framework', 'GitHub']
			]
        ], $views->renderDefaults(true));
		$views->render('Home/about.php', $options);
	}

	public function lessAction()
	{
		$views = new Views;
        $markdown = 'Markdown is **not** that _hard_. Visit my [repo][website]';
		$values = [
			'title' => 'LESS Actions',
			'stylesheet' => Views::returnURL(true, 'style') . $views->autoCompileLess('main', 'main', false),
			'font' => Views::returnURL(true, 'font') . 'Ubuntu.css',
            'firstname' => 'Michael'
		];
		echo $views->mustacheRender('base', $values);		
	}
    
    public function markdownAction()
    {
        $views = new Views;
        $text = 'Markdown is **not** that _hard_. Visit my [repo][website]';
        $views->render('Home/markdown.php', [
            'title' => 'Markdown Test',
            'header' => Views::getPath() . 'Raw/base_header.php',
			'footer' => Views::getPath() . 'Raw/base_footer.php',
            'markdown' => $views->transformMarkdown($text, [
                'urls' => ['website' => 'https://www.github.com/ace411'],
                'tab_width' => 4
            ])
        ]);
    }
    
    public function configAction()
    {
        $views = new Views;
        $config = Config::getConstants();
        echo '<pre>';
        var_dump($config);
        echo '</pre>';
    }
}