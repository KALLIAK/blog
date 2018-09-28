<?php

namespace core;

class DB
{
    private static $db;
    private static $driver = 'mysql';
    private static $host = 'localhost';
    private static $dbname = 'blog';

    public static function connect(): \PDO
    {
        if (self::$db === null) {
            $dsn = sprintf('%s:host=%s;dbname=%s', self::$driver, self::$host, self::$dbname);
            self::$db = new \PDO($dsn, 'root', '');
            self::$db->exec('SET NAMES UTF8');
        }
        return self::$db;
    }
}