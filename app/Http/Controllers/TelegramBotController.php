<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    public function handleWebhook()
    {
        $update = Telegram::getWebhookUpdates();
        $message = $update->getMessage();
        $text = $message->getText();
        $chatId = $message->getChat()->getId();

        // Responder a un saludo
        if (str_contains(strtolower($text), 'hola')) {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => '¡Hola! ¿En qué puedo ayudarte?',
            ]);
        } else {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Lo siento, no entiendo el mensaje.',
            ]);
        }
    }
}
