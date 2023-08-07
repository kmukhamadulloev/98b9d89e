<?php

namespace App\Core;

class View
{

    public array $route;
    public string $layout = 'default';
    private string $viewPath = '../resources/views/';

    public function __construct(array $route = [])
    {
        $this->route = $route;
    }

    public function render(string $path = 'error/404', array $items = [], array $errors = []) : void
    {

        $path = $this->viewPath . $path . '.php';

        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require $this->viewPath . $this->layout . '.php';
        }
    }

    public function redirect(string $url) : void
    {
        header("Location: {$url}");
        exit;
    }

    public static function errorCode(string $code) : void
    {
        http_response_code($code);
        $path = '../resources/views/error/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
    }

}