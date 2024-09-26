<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Avtorizatsiya</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-200">
<div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-bold text-center">Avtorizatsiya</h2>
    <form method="POST" action="">
        <label>
            <input type="text" name="username" placeholder="Telefon yoki Pochta" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <label>
            <input type="password" name="password" placeholder="Parol" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        </label>
        <div
                style="height: 100px"
                id="captcha-container"
                class="smart-captcha"
                data-sitekey="ysc1_Za8dfwUKg4edHCbq4OslnZf8uKdLuZVi0MEpGfbh42b39013"
        ></div>
        <button type="submit" class="bg-blue-500 text-white rounded-md p-2 w-full hover:bg-blue-600">Kirish</button>
    </form>
    <?php if (isset($error)) echo "<p class='text-red-500 text-center'>$error</p>"; ?>
</div>
</body>
</html>