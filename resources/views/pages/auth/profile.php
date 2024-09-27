<?php
/** @var TYPE_NAME $user */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль Пользователя</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-gray-800 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">Название Сайта</h1>
        <ul class="flex space-x-4">
            <li><a href="/" class="hover:text-gray-300">Главная</a></li>
            <li><a href="/edit{id}" class="hover:text-gray-300">Форма Профиля</a></li>
        </ul>
    </div>
</nav>

<div class="container mx-auto mt-8 flex">
    <div class="w-1/4 bg-white shadow-lg p-4 rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Профиль Пользователя</h2>
        <div class="flex items-center space-x-4 mb-4">
            <img class="w-16 h-16 rounded-full" src="https://via.placeholder.com/150" alt="Фото Пользователя">
            <div>
                <p class="text-xl font-semibold">Имя: <?php echo htmlspecialchars($user->name); ?></p>
                <p class="text-gray-600">E-mail: <?php echo htmlspecialchars($user->email); ?></p>
                <p class="text-gray-600">Телефон: <?php echo htmlspecialchars($user->phone); ?></p>
            </div>
        </div>
    </div>

    <div class="w-3/4 ml-4">
        <div class="bg-white shadow-lg p-6 rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Проекты и Информация</h2>
            <p class="text-gray-700 mb-2">В этом разделе представлены проекты пользователя и различные мероприятия, в которых он участвует.</p>
            <p class="text-gray-700">Можно предоставить подробную информацию о каждом проекте, его роли и внесенном в него вкладе.</p>
        </div>
    </div>
</div>

</body>
</html>
