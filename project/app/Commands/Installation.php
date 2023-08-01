<?php

namespace App\Commands;

use App\Core\Database;

class Installation
{
    private static string $database = '../../migration/database.sql';
    private static string $data = '../../migration/insert_test_data.sql';

    public static function checkIfTableExists() : bool {
        $clients = "SELECT EXISTS(SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'alif_test' AND TABLE_NAME = 'clients') AS table_exists;";
        $rooms = "SELECT EXISTS(SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'alif_test' AND TABLE_NAME = 'rooms') AS table_exists;";
        $requests = "SELECT EXISTS(SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'alif_test' AND TABLE_NAME = 'requests') AS table_exists;";
        return false;
    }

    public static function installFiles() : bool {
        if (self::checkIfTableExists()) return false;

        $pdo = new Database;

        $installation = file_get_contents(self::database);
        $pdo->query($installation);

        $installation = file_get_contents(self::data);
        $pdo->query($installation);

        return true;
    }
}