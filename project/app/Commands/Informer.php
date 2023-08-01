<?php

namespace App\Commands;

use App\Models\Request;

function getAllReservedRoomsForToday() : array {
    return [];
}

function sendSmsToClient(string $phoneNumber) : bool {
    return false;
}

function sendEmailToClient(string $email) : bool {
    return false;
}

function logTheJob(array $client, bool $smsStatus, bool $emailStatus) : bool {
    
}

function executeTheCommand() : bool {
    $clients = getAllReservedRoomsForToday();

    if (count($clients) <= 0) {
        return false;
    }

    foreach ($clients as $client) {
        $sms = sendSmsToClient($client['phone']);
        $email = sendEmailToClient($client['email']);

        if (!logTheJob($client, $sms, $email)) die('Something is wrong with log file, please check it!');
    }

    return true;
}