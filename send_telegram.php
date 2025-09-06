<?php
// === Этот скрипт принимает данные формы и отправляет их в Telegram ===
// Замените значения ниже на свои:
$token = "ВАШ_ТОКЕН_БОТА"; // Токен Telegram-бота
$chat_id = "ВАШ_USER_ID";   // Ваш user_id (или chat_id группы)

// Получаем данные из формы (даже если не все поля заполнены)
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$messenger = $_POST['messenger'] ?? '';
$course = $_POST['course'] ?? '';
$format = $_POST['format'] ?? '';
$time_pref = $_POST['time_pref'] ?? '';
$message = $_POST['message'] ?? '';

// Формируем текст сообщения для Telegram
$text = "Новая заявка с сайта:\n";
$text .= "Имя: $name\n";
$text .= "Email: $email\n";
$text .= "Мессенджер: $messenger\n";
$text .= "Курс: $course\n";
$text .= "Формат: $format\n";
$text .= "Время: $time_pref\n";
$text .= "Сообщение: $message";

// Отправляем сообщение через Telegram Bot API
file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($text));

// Возвращаем простой ответ (можно использовать для AJAX)
echo 'OK';
// === Конец скрипта ===
// Поместите этот файл в ту же папку, где находится index.html (или в папку public_html на хостинге)
// В форме укажите action="send_telegram.php" и method="POST"
// Пример:
// <form action="send_telegram.php" method="POST">
