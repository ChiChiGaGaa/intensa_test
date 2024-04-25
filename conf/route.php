<?php

/**
 * Класс маршрутизации приложения.
 * Разбирает адрес по которому переходит пользователь и определяет необходимый контроллер
 */
class Route
{

    /**
     * Функция построения маршрута (Выбор контроллера и экшена)
     * @return void
     */
    public static function buildRoute(): void
    {
        /*Контроллер и action по умолчанию*/
        $controllerName = "IndexController";
        $modelName = 'IndexModel';
        $action = 'index';

        $route = explode('/' , $_SERVER['REQUEST_URI']);

        /*Определяем контроллер*/
        if ($route[2] != '') {
            $controllerName = ucfirst($route[2] . 'Controller'); //IndexController.php
            $modelName = ucfirst($route[2] . 'Model'); //IndexModel.php
        }

        include CONTROLLER_PATH . $controllerName . '.php';
        include MODEL_PATH . $modelName . '.php';


        if(isset($route[3]) && $route[3] != ''){
            $action = $route[3];
        }

        $controller = new $controllerName();
        $controller->$action();
    }

    public function errorPage()
    {

    }
}