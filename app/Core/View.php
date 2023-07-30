<?php

namespace App\Core;

class View {

    public $route;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
    }

    public function render($path = 'error/404', $items = [], $errors = []) {

        $path = 'resources/views/'.$path.'.php';

        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'resources/views/'.$this->layout.'.php';
        }
    }

    public function redirect($url) {
        header("Location: {$url}");
        exit;
    }

    public static function errorCode($code) {
        http_response_code($code);
        $path = 'resources/views/error/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
    }

}