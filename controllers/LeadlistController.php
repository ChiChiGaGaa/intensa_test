<?php

/**
 * Контроллер для работы со списком лидов
 */
class LeadlistController extends Controller
{
    private $pageTpl = '/views/pages/lead_list.php';

    public function __construct()
    {
        $this->model = new LeadlistModel();
        $this->view = new View();
        $this->pageData['title'] = 'Список лидов';

    }

    /**
     * Отображение страницы списка лидов
     * @return void
     */
    public function index()
    {
        // Получаем список лида с помощью модели
        $leadList = $this->model->getLeadList();

        // Передаем список лида в данные страницы
        $this->pageData['leadList'] = $leadList;

        // Рендерим страницу со списком лидов
        $this->view->render($this->pageTpl, $this->pageData);
    }

    /**
     * Фильтрация списка лидов по выбранному городу
     * @return void
     */
    public function filter()
    {
        // Получаем выбранный город из POST-запроса
        $selectedCity = $_POST['city'];

        // Получаем список лида с учетом выбранного города с помощью модели
        $leadList = $this->model->getLeadListByCity($selectedCity);

        // Передаем список лида в данные страницы
        $this->pageData['title'] = 'Список лидов';
        $this->pageData['leadList'] = $leadList;

        // Рендерим страницу с переданными данными
        $this->view->render($this->pageTpl, $this->pageData);
    }

    /**
     * Экспорт списка всех лидов в csv файл
     * @return void
     */
    public function export()
    {
        /* Получаем список лида */
        $leadList = $this->model->getLeadList();

        /* Заголовки CSV файла */
        $headers = array(
            'Content-Type: text/csv',
            'Content-Disposition: attachment; filename="lead_list.csv"',
        );

        /* Отправляем заголовки */
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="lead_list.csv"');

        /* Создаем "выходной поток" (output stream) в браузере, который направляет данные в файл */
        $output = fopen('php://output', 'w');

        /* Записываем заголовки в CSV файл */
        fputcsv($output, array('Фамилия', 'Имя', 'Отчество', 'Телефон', 'Email', 'Город'));

        /* Записываем данные о лидах в CSV файл */
        foreach ($leadList as $lead) {
            fputcsv($output, $lead);
        }

        /* Закрываем "выходной поток" */
        fclose($output);
        exit;
    }


}