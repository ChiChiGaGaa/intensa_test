<?php

/**
 * Модель для работы со списком лидов
 */
class LeadlistModel extends Model
{

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
     * Получение списка лидов из БД
     * @return array Данные о лидах
     */
    public function getLeadList(): array
    {
        /* Подготовка SQL запроса для получения всех Лидов из базы данных */
        $stmt = $this->conn->query('SELECT * FROM leads');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Получения списка лидов по фильтру - "город"
     * @param string $city Город, по которому нужно получить лиды
     * @return array Данные о лидах для выбарнного города
     */
    public function getLeadListByCity(string $city): array
    {
        // Если город не выбран, получаем все лида
        if ($city === '') {
            return $this->getLeadList();
        }

        // Подготовка SQL запроса для получения лида для выбранного города
        $stmt = $this->conn->prepare('SELECT * FROM leads WHERE city = :city');
        $stmt->execute([':city' => $city]);

        // Возвращаем массив с данными о лидах для выбранного города
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
