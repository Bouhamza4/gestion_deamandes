<?php

// app/Http/Controllers/API/MessageController.php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return response()->json(Reservation::with('user')->latest()->get());
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'type' => 'required|string|max:255',
        'reservation_date' => 'required|date',
        'reservation_time' => 'required',
        'notes' => 'nullable|string',
        'document' => 'nullable|file|max:2048'
    ]);

    $reservation = Reservation::create([
        'type' => $validated['type'],
        'reservation_date' => $validated['reservation_date'],
        'reservation_time' => $validated['reservation_time'],
        'notes' => $validated['notes'] ?? null,
        'user_id' => $request->user()->id, // ✅ هادي هي المهمة
    ]);

    return response()->json(['message' => 'Réservation créée avec succès', 'reservation' => $reservation]);
}

    
}
