<?php

namespace App\Controllers;

use \Core\Views;

class Posts extends \Core\Controller
{
	public function articlesAction()
	{
		$views = new Views();
		$values = array_merge([
			'firstname' => 'Bingo'
		], $views->renderMustacheDefaults(true, 'Articles | Bingo Framework'));
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

<<<<<<< HEAD
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
=======
	public function editAction()
	{
		$views = new Views;
        $values = array_merge([
            'firstname' => 'Bingo'
        ], $views->renderMustacheDefaults(true, 'Edit | Bingo Framework'));
        echo $view->mustacheRender('base', $values);
>>>>>>> 6ac250949257f9a54f6f657de894877db11241af
	}
}