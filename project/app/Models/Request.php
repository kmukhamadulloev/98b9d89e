<?php

namespace App\Models;

use App\Models\Model;

class Request extends Model
{
    public function getAll() : array
    {
        return $this->pdo->row(
            'SELECT r.client_id, r.room_id, c.first_name, c.last_name, c.middle_name, c.email, c.phone, m.title, m.room_number, r.reserved_from, r.reserved_till FROM requests r INNER JOIN clients c ON c.id = r.client_id INNER JOIN rooms m ON m.id = r.room_id'
        );
    }

    public function checkAvailiable(array $request) : bool
    {
        $params = [
            'room_id' => $request['room_id'],
            'reserved_from' => $request['reserved_from'],
            'reserved_till' => $request['reserved_till']
        ];

        return ($this->pdo->row(
            'SELECT count(r.room_id) AS c FROM requests AS r WHERE r.room_id = :room_id AND r.reserved_from BETWEEN :reserved_from AND :reserved_till AND r.reserved_till BETWEEN :reserved_from AND :reserved_till', $params
        )[0]['c'] === 0);
    }

    public function getRooms() : array
    {
        return $this->pdo->row(
            'SELECT * FROM rooms'
        );
    }

    public function addReserve(array $request) : mixed
    {
        $request = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'middle_name' => $request['middle_name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'room_id' => $request['room_id'],
            'reserved_from' => $request['reserved_from'],
            'reserved_till' => $request['reserved_till']
        ];

        return $this->pdo->query(
            'INSERT INTO clients(first_name, last_name, middle_name, phone, email)
            VALUES(:first_name, :last_name, :middle_name, :phone, :email);
            INSERT INTO requests(client_id, room_id, reserved_from, reserved_till)
            VALUES(LAST_INSERT_ID(), :room_id, :reserved_from, :reserved_till);'
        , $request);
    }

    public function getReservedForToday() : array
    {
        return $this->pdo->row(
            'SELECT c.first_name, c.last_name, c.middle_name, c.email, c.phone, m.room_number, m.title, r.reserved_from, r.reserved_till FROM requests r INNER JOIN clients c ON c.id = r.client_id INNER JOIN rooms m ON m.id = r.room_id WHERE r.reserved_from > NOW()'
        );
    }
}