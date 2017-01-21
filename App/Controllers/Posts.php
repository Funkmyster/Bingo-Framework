<?php

namespace App\Controllers;

use \Core\Views;

class Posts extends \Core\Controller
{
	public function articlesAction()
	{
		$view = new Views();
		$values = [
			'title' => 'Articles | Bingo Framework',
			'stylesheet' => Views::returnURL(true, 'style') . 'main.css',
			'font' => Views::returnURL(true, 'font') . 'Ubuntu.css',
			'firstname' => 'Bingo'
		];
		echo $view->mustacheRender('base', $values);
	}

	public function indexAction()
	{
        $data = "MySQL connections could go here...";
		$view = new Views();
		$values = [
            'title' => 'Home | Bingo Framework',
			'stylesheet' => Views::returnURL(true, 'style') . 'main.css',
            'font' => Views::returnURL('true', 'font') . 'Ubuntu.css',
            'bloc_one' => $data,
            'firstname' => 'Chemem'
        ];
        echo $view->mustacheRender('base', $values);
	}

	public function addNewAction()
	{
		$views = new Views;
        $values = array_merge([
            'firstname' => 'Hakeem',
            'bloc_one' => 'Add New view'
        ], $views->renderMustacheDefaults(true, 'Add New'));
        echo $views->mustacheRender('base', $values);
	}

	public function editAction()
	{
		$views = new Views;
        $values = $views->renderRawDefaults(true);
        var_dump($this->route_params);
	}
}