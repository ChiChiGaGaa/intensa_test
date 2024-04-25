<?php

/**
 * Класс конфигурации базы данных
 */
class DB{
    const USER = "intensa";
    const PASS = '';
    const HOST = 'localhost';
    const DB = 'intensa';

    /**
     * Устанавливает соединение с базой данных.
     * @return PDO Объект PDO для соединения с базой данных
     */
    public static function connToDB(): PDO
    {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
        return $conn;
    }

}

