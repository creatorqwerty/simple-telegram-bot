<?php
require __DIR__ . '/../vendor/autoload.php';
use CreatorQwerty\SimpleTelegramBot\TelegramBot;

// Загружаем .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

try {
    $bot = new TelegramBot($_ENV['TELEGRAM_BOT_TOKEN']);
    $response = $bot->sendMessage(6272701628, 'Сообщение через .env!');
    echo "Сообщение отправлено! Ответ Telegram:\n";
    print_r($response);
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}