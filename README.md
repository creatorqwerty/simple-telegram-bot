🤖 Создание бота


Откройте @BotFather в Telegram

Выполните команды:

text
/newbot
→ Укажите имя бота (например: MyCoolBot)
→ Укажите username (должен оканчиваться на _bot)
Сохраните полученный токен (формат: 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11)

💻 Установка
bash
# Создаем папку проекта
mkdir my-telegram-bot && cd my-telegram-bot

# Инициализируем Composer
composer init --name="myproject/bot" --type="project" --require="php": "^8.1" --no-interaction

# Устанавливаем библиотеку
composer require creatorqwerty/simple-telegram-bot

# Устанавливаем dotenv для работы с .env
composer require vlucas/phpdotenv
🚀 Быстрый старт
Создайте файл .env:

bash
echo "TELEGRAM_BOT_TOKEN=ваш_токен" > .env
echo ".env" >> .gitignore
Создайте файл bot.php:

php
<?php
require __DIR__ . '/vendor/autoload.php';

use CreatorQwerty\SimpleTelegramBot\TelegramBot;



// Загрузка .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $bot = new TelegramBot($_ENV['TELEGRAM_BOT_TOKEN']);
    
    // Получаем последние сообщения
    $updates = $bot->getUpdates();
    
    if (!empty($updates)) {
        $chatId = $updates[0]['message']['chat']['id'];
        $bot->sendMessage($chatId, "Привет! Я работаю!");
    } else {
        echo "Напишите боту сообщение, чтобы получить chat_id";
    }
} catch (Exception $e) {
    die("Ошибка: " . $e->getMessage());
}



Запустите бота:



bash
php bot.php
