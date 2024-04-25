<?php

/**
 * Контроллер формы добавления лидов
 */
class IndexController extends Controller
{
    private $pageTpl = '/views/pages/add_lead.php';

    public function __construct()
    {
        $this->model = new IndexModel();
        $this->view = new View();
        $this->pageData['title'] = 'Форма лида';
    }

    /**
     * Отображение страницы формы добавления лида
     * @return void
     */
    public function index(): void
    {
        $this->view->render($this->pageTpl, $this->pageData);
    }


    /**
     * Обработка добавления лида (После нажатия кнопки "отправить")
     * @return void
     */
    public function addLead(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lead['last_name'] = $_POST['last_name'];
            $lead['name'] = $_POST['name'];
            $lead['second_name'] = $_POST['second_name'];
            $lead['email'] = $_POST['email'];
            $lead['phone'] = $_POST['phone'];
            $lead['city'] = $_POST['city'];

            /*Проверяем валидность данных из формы*/
            if ($this->model->validationLead($lead)) {
                /*Валидация успешно пройдена, добавляем запись*/
                if ($this->model->addLead($lead)) {
                    $message = 'Запись успешно добавлена';
                } else {
                    $message = 'Ошибка при добавлении записи в базу данных';
                }
            } else {
                $message = 'Данные не прошли валидацию';
            }

            /* Передаем сообщение в представление для вывода */
            $this->pageData['message'] = $message;
            $this->view->render($this->pageTpl, $this->pageData);
        }
    }
}


