<?php

namespace App\Commands;

use App\Models\Request;
use App\Core\Mailer;
use App\Core\SmsSender;
use App\Core\Logger;

class Informer
{
    private function getAllReservedRoomsForToday() : array {
        $requests = new Request;
        return $requests->getReservedForToday();
    }
    
    public function executeTheCommand() : bool {
        $clients = $this->getAllReservedRoomsForToday();
    
        if (count($clients) <= 0) {
            return false;
        }

        $log = new Logger;
    
        $email = new Mailer;
        $sms = new SmsSender;
        $message = "Hi, {$client['first_name']} {$client['middle_name']} {$client['last_name']} \n
        You have reserved {$client['room_number']} - {$client['title']} \n
        From: {$client['reserved_from']} \n
        Till: {$client['reserved_till']} \n";
    
        foreach ($clients as $client) {
            $sms->sendSms($client['phone'], $message) ? $log->store("SMS was sent to {$client['first_name']} {$client['last_name']}") : $log->store("Something is not working, check SmsSender");
            $email->sendNotification($client['email'], 'Room reserve', $message) ? $log->store("EMAIL was sent to {$client['first_name']} {$client['last_name']}") : $log->store("Something is not working, check Mailer");
        }
    
        return true;
    }
}