<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
// use Illuminate\Http\Request;
class MessageController extends Controller
{
   

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string'
    ]);

    Message::create($validated);

    // (Optionnel) Envoi email
    // Mail::to('admin@example.com')->send(new ContactReceived($validated));

    return response()->json(['success' => true]);
}

}
