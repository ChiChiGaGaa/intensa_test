<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $pageData['title'] ?></title>
    <meta name="vieport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/intensa/css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="/intensa/css/main.css">

</head>
<body>

<header>
    <h1>Тестовое для Intensa</h1>
    <nav>
        <ul>
            <li><a href="https://d-lok.ru/intensa/">Добавить лид</a></li>
            <li><a href="https://d-lok.ru/intensa/leadlist/">Список лидов</a></li>
        </ul>
    </nav>
</header>

<form action="/intensa/index/addlead" method="post">
    <input type="text" id="last_name" name="last_name" placeholder="Фамилия*">
    <input type="text" id="name" name="name" placeholder="Имя*">
    <input type="text" id="second_name" name="second_name" placeholder="Отчество">
    <input type="email" id="email" name="email" placeholder="email*">
    <input type="tel" id="phone" name="phone" placeholder="Телефон">
    <select id="city" name="city">
        <option value="Тула">Тула</option>
        <option value="Москва">Москва</option>
        <option value="Санкт-Петербург">Санкт-Петербург</option>
    </select>
    <p>Поля, помеченные (*) обязательны для заполнения.</p>
    <button type="submit">Отправить</button>
    <?php
    if (!empty($pageData['message'])) {
        echo $pageData['message'];
    }
    ?>


</form>

<footer>

</footer>


</body>
</html>