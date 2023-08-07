<?php

namespace App\Controllers;

use App\Core\View;

abstract class Controller
{
    public array $route;
    public View $view;
	public $model;

    public function __construct(array $route) {
		$this->route = $route;
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

    public function loadModel($name) {
		$path = 'app\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}
}