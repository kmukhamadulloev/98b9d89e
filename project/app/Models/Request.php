<?php

namespace App\Models;

use App\Models\Model;

class Request extends Model
{
    public function getAll() : array {
        return $this->pdo->row(
            'SELECT * FROM requests'
        );
    }

    public function checkAvailiable(array $request) : bool {
        $params = [
            'room_id' => $request['room_id'],
            'reserved_from' => $request['reserve_from'],
            'reserved_till' => $request['reserve_till']
        ];

        return ($this->pdo->row(
            'SELECT count(r.room_id) FROM request AS r WHERE r.room_id = :room_id AND r.reserved_from BETWEEN :reserved_from AND :reserved_till AND r.reserved_till BETWEEN :reserved_from AND :reserved_till', $params
        ) === 0) ? true : false;
    }

    public function addReserve(array $request) : bool {
        return false;
    }
}