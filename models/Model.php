<?php

/**
 * Базовый класс модели.
 */
class Model {
    protected $db = null;
    public function __construct()
    {
        /* Подключение к БД */
        $this->db = DB::connToDB();
    }
}