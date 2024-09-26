<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-200">
<div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-bold text-center">Регистрация</h2>
    <form method="POST" action="">
        <label>
            <input type="text" name="name" placeholder="Ваше имя" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <label>
            <input type="email" name="email" placeholder="Электронная почта" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <label>
            <input type="text" name="phone" placeholder="Телефон" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <label>
            <input type="password" name="password" placeholder="Пароль" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <label>
            <input type="password" name="confirm_password" placeholder="Повторите пароль" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <button type="submit" class="bg-blue-500 text-white rounded-md p-2 w-full hover:bg-blue-600">Зарегистрироваться</button>
    </form>
    <?php if (isset($error)) echo "<p class='text-red-500 text-center'>$error</p>"; ?>
</div>
</body>
</html>
