📚 Полное руководство по Simple Telegram Bot Library
📦 Установка и настройка
1. Создание бота в Telegram
Откройте @BotFather

Выполните команды:

bash
/newbot
→ MyTestBot (имя бота)
→ my_test_bot (username, должен заканчиваться на _bot)
Сохраните полученный токен (формат: 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11)

2. Установка библиотеки
bash
# Создаем папку проекта
mkdir my-bot && cd my-bot

# Инициализируем Composer (если еще не установлен)
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"

# Устанавливаем библиотеку
composer require creatorqwerty/simple-telegram-bot
3. Настройка окружения
Создайте файл .env:

bash
echo "TELEGRAM_BOT_TOKEN=ваш_токен" > .env
echo ".env" >> .gitignore
🚀 Базовое использование
1. Пример бота (bot.php)
php
<?php
require __DIR__ . '/vendor/autoload.php';

use CreatorQwerty\SimpleTelegramBot\TelegramBot;

// Загрузка .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $bot = new TelegramBot($_ENV['TELEGRAM_BOT_TOKEN']);
    
    // Получаем Chat ID автоматически
    $updates = $bot->getUpdates();
    if (empty($updates)) {
        die("Напишите боту любое сообщение!");
    }
    
    $chatId = $updates[0]['message']['chat']['id'];
    $response = $bot->sendMessage($chatId, "Привет! Я работаю!");
    
    print_r($response);
} catch (Exception $e) {
    die("Ошибка: " . $e->getMessage());
}
2. Запуск бота
bash
php bot.php
