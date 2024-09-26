<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex">
<?php loadPartials('sidebar'); ?>
<div class="ml-64 flex items-center justify-center w-full min-h-screen p-8">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden max-w-3xl w-full">
        <!-- Профиль -->
        <div class="p-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-white text-center">Информация профиля</h2>
            <!-- Форма Профиля -->
            <form class="mt-8 space-y-4" method="POST" action="">
                <div class="grid grid-cols-1 gap-4">
                    <label>
                        <input type="text" name="name" value="" placeholder="Имя" class="border rounded-md p-2 w-full dark:bg-gray-700 dark:text-white">
                    </label>
                    <label>
                        <input type="email" name="email" value="" placeholder="Электронная почта" class="border rounded-md p-2 w-full dark:bg-gray-700 dark:text-white">
                    </label>
                    <label>
                        <input type="text" name="phone" value="" placeholder="Телефон" class="border rounded-md p-2 w-full dark:bg-gray-700 dark:text-white">
                    </label>
                    <label>
                        <input type="password" name="current_password" placeholder="Текущий пароль" required class="border rounded-md p-2 w-full dark:bg-gray-700 dark:text-white">
                    </label>
                    <label>
                        <input type="password" name="new_password" placeholder="Новый пароль" class="border rounded-md p-2 w-full dark:bg-gray-700 dark:text-white">
                    </label>
                </div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md transition">Обновить</button>
            </form>
            <!-- Сообщения -->
            <?php if (isset($message)) echo "<p class='text-green-500 text-center mt-4'>$message</p>"; ?>
            <?php if (isset($error)) echo "<p class='text-red-500 text-center mt-4'>$error</p>"; ?>
        </div>
    </div>
</div>

</body>
</html>
