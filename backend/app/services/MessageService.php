<?php
namespace App\Services;

use App\Models\Message;

class MessageService
{
    public function getAllMessages()
    {
        return Message::with('user')->latest()->get();
    }

    public function createMessage(array $data)
    {
        return Message::create([
            'subject' => $data['subject'],
            'body' => $data['body'],
            'user_id' => $data['user_id'],
        ]);
    }
}