<?php

// app/Http/Controllers/API/MessageController.php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index()
    {
        $messages = $this->messageService->getAllMessages();
        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $message = $this->messageService->createMessage($validated);

        return response()->json([
            'message' => 'Message created successfully!',
            'data' => $message
        ], 201);
    }
}
