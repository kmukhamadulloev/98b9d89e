<?php

namespace App\Core;

use PDO;

class Database {

    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:host='. DB_HOST .';dbname='.DB_NAME, DB_USER, DB_PASS);
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);

        if (!empty($params)) {
            foreach($params as $key=>$val) {
                $type = is_int($val) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $stmt->bindValue(':'.$key, $val, $type);
            }
        }

        $stmt->execute();

        return $stmt;
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function lastInsertId() {
		return $this->pdo->lastInsertId();
	}

}