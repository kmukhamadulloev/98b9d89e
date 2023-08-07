<?php

namespace App\Models;

use App\Core\Database;

abstract class Model
{
    protected Database $pdo;

    public function __construct() {
        $this->pdo = new Database;
    }
}