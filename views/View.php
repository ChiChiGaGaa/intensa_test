<?php

/**
 * Базовый класс для отображения страниц
 */
class View{

    /**
     * Отрисовка страницы
     * @param $tpl string Шаблон страницы
     * @param $pageData array
     * @return void
     */
    public function render($tpl, $pageData)
    {
        include ROOT. $tpl;
    }
}