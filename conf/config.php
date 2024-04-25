<?php

/**
 * В этом файле должны быть определены общие служебные константы и подключения файлов.
 */

/** Объявляем константы */
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . 'intensa');
define("CONTROLLER_PATH", ROOT. "/controllers/");
define("MODEL_PATH", ROOT. "/models/");
define("VIEW_PATH", ROOT. "/views/");

/** Подключаем необходимые файлы*/
require_once("db.php"); //Подключение БД
require_once("route.php"); //Подключение маршрутизации
require_once MODEL_PATH. 'Model.php';
require_once VIEW_PATH. 'View.php';
require_once CONTROLLER_PATH. 'Controller.php';

Route::buildRoute();