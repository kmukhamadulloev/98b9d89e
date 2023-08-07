<?php

namespace App\Core;

class Logger
{
    protected static string $path = '../resources/logs/log.txt';

    public static function check() : void
    {
        if (!file_exists(self::$path)) {
            $logger = fopen(self::$path, 'w') or die("Unable to create log file");
            fwrite($logger, date('Y-m-d H:i:s'). " : Log file has been created\n");
            fclose($logger);
        }
    }

    public static function store(string $message) : void
    {
        self::check();

        $logger = fopen(self::$path, 'a') or die("Unable to open log file");
        fwrite($logger, date('Y-m-d H:i:s') . " : {$message} \n");
        fclose($logger);
    }
}