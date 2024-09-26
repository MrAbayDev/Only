<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Ro'yxatdan o'tish</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-200">
<div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-bold text-center">Ro'yxatdan o'tish</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Ismingiz" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        <input type="email" name="email" placeholder="Pochta" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        <input type="text" name="phone" placeholder="Telefon" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        <input type="password" name="password" placeholder="Parol" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        <input type="password" name="confirm_password" placeholder="Parolni takrorlang" required class="border border-gray-300 rounded-md p-2 w-full mb-4">
        <button type="submit" class="bg-blue-500 text-white rounded-md p-2 w-full hover:bg-blue-600">Ro'yxatdan o'tish</button>
    </form>
    <?php if (isset($error)) echo "<p class='text-red-500 text-center'>$error</p>"; ?>
</div>
</body>
</html>