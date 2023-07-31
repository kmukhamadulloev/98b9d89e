<?php

namespace App\Model;

abstract class Model
{
    protected int $id;
    protected string $table;
    protected bool $timestamps;

    protected static function getAll() : array {
        return [];
    }

    protected static function getSingle(int $id) : array {
        return [];
    }

    protected function addItem(array $data) : bool {
        return false;
    }

    protected function updateItem(int $id, array $data) : bool {
        return false;
    }

    protected function deleteItem(int $id) : bool {
        return false;
    }

    protected function disableItem(int $id) : bool {
        return false;
    }
}