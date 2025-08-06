<?php
declare(strict_types=1);

namespace CreatorQwerty\SimpleTelegramBot;

class TelegramBot
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function sendMessage(int $chatId, string $text): array
    {
        $url = "https://api.telegram.org/bot{$this->token}/sendMessage";
        
        $data = [
            'chat_id' => $chatId,
            'text'    => $text,
        ];

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $url,
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER    => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS     => json_encode($data),
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true) ?? [];
    }
}