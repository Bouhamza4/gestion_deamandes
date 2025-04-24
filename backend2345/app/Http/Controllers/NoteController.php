<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return Note::with(['etudiant', 'course'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'course_id' => 'required|exists:courses,id',
            'note' => 'required|numeric|min:0|max:20',
            'semestre' => 'nullable|string'
        ]);

        return Note::create($validated);
    }

    public function show($id)
    {
        return Note::with(['etudiant', 'course'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());
        return $note;
    }

    public function destroy($id)
    {
        return Note::destroy($id);
    }
    public function noteStats()
{
    $stats = [
        'A' => Note::whereBetween('note', [16, 20])->count(),
        'B' => Note::whereBetween('note', [14, 15.99])->count(),
        'C' => Note::whereBetween('note', [12, 13.99])->count(),
        'D' => Note::whereBetween('note', [10, 11.99])->count(),
        'F' => Note::where('note', '<', 10)->count(),
    ];

    $formatted = [];

    foreach ($stats as $category => $value) {
        $formatted[] = [
            'category' => $category,
            'value' => $value
        ];
    }

    return response()->json($formatted);
}
}
