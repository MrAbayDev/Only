<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-200">
<div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-bold text-center">Авторизация</h2>
    <form method="POST" action="">
        <label>
            <input type="text" name="username" placeholder="Телефон или Электронная почта" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <label>
            <input type="password" name="password" placeholder="Пароль" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <div
                style="height: 100px"
                id="captcha-container"
                class="smart-captcha"
                data-sitekey=<?= $_ENV['DATA_SITEKEY'] ?>
        ></div>
        <button type="submit" class="bg-blue-500 text-white rounded-md p-2 w-full hover:bg-blue-600">Войти</button>
    </form>
    <?php if (isset($error)) echo "<p class='text-red-500 text-center'>$error</p>"; ?>
</div>
</body>
</html>
