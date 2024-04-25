<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $pageData['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
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

<main>

    <div class="content">
        <!-- Панель управления -->
        <div class="filter">
            <!-- Блок с фильтрами -->
            <form action="/intensa/leadlist/filter" method="post">
                <h1>Фильтры:</h1>
                <label for="city">Выберите город:</label>
                <select id="city" name="city">
                    <option value="">Все города</option>
                    <option value="Тула">Тула</option>
                    <option value="Москва">Москва</option>
                    <option value="Санкт-Петербург">Санкт-Петербург</option>
                </select>
                <button type="submit">Применить фильтр</button>
            </form>

            <!-- Кнопка для экспорта всех лидов -->
            <form action="/intensa/leadlist/export" method="post">
                <button type="submit" name="export_all">Экспорт всех лидов в CSV</button>
            </form>
        </div>


        <!-- Отображение лидов -->
        <div class="lead_list">
            <?php if (empty($pageData['leadList'])): ?>
                <p>Список лидов пуст.</p>
            <?php else: ?>
                <table>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Город</th>
                        <th>Дата добавления</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pageData['leadList'] as $lead): ?>
                        <tr>
                            <?php foreach ($lead as $value): ?>
                                <td><?php echo $value; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>






</main>

</body>
</html>
