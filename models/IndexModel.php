<?php

/**
 * Модель для добавления лидов
 */
class IndexModel extends Model
{

    private $conn;

    public function __construct()
    {
        //Подключение к базе данных
        try {
            $this->conn = DB::connToDB();
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных" . $e->getMessage());
        }
    }

    /**
     * Добавление нового лида в БД
     * @param array $lead Информация о лиде (Имя, Фамилия, E-mail, Телефон, Город)
     * @return bool True - запись успешно добавлена, False - запрос не успешен
     */

    public function addLead(array $lead): bool
    {
        // Подготовка SQL запроса для добавления записи
        $stmt = $this->conn->prepare("INSERT INTO leads (last_name, name, second_name, email, phone, city) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$lead['last_name'], $lead['name'], $lead['second_name'], $lead['email'], $lead['phone'], $lead['city']]);

        // Проверка на успешность выполнения запроса
        return $stmt->rowCount() > 0;
    }


    /**
     * Проверка валидности данных
     * @param array $lead Информация о лиде (Имя, Фамилия, E-mail, Телефон, Город)
     * @return bool True - данные успешно прошли валидацию, False - валидация не пройдена
     */
    public function validationLead(array $lead): bool
    {
        // Проверка фамилии
        if (empty($lead['last_name'])) {
            return false;
        }

        // Проверка имени
        if (empty($lead['name'])) {
            return false;
        }

        // Проверка e-mail
        if (empty($lead['email']) || !filter_var($lead['email'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }


        return true;
    }


}