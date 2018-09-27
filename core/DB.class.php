<?php

namespace core;

class DB
{
    static $driver = 'mysql';
    static $host = 'localhost';
    static $dbname = 'blog';

    public static function connect(): \PDO
    {
        $dsn = sprintf('%s:host=%s;dbname=%s', self::$driver, self::$host, self::$dbname);
        return new \PDO($dsn, 'root', '');
    }
}