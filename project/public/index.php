<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Commands\Installation;

echo (Installation::installFiles()) ? 'Database installed' : 'Database is already installed';