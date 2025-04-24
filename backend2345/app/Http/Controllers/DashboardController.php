<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Filiere;
use App\Models\Presence;
use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'students' => User::where('role', 'student')->count(),
            'professors' => User::where('role', 'professor')->count(),
            'courses' => Course::count(),
            'filieres' => Filiere::count(),
            'presence_rate' => $this->calculatePresenceRate(),
            'next_exam' => $this->getNextExamDate(),
            'notes_distribution' => $this->getNotesDistribution(),
        ]);
    }

    private function calculatePresenceRate()
    {
        $total = Presence::count();
        $present = Presence::where('status', 'present')->count();

        return $total > 0 ? round(($present / $total) * 100) : 0;
    }

    private function getNextExamDate()
    {
        // هذا افتراض عندك جدول exams فيه date
        return DB::table('exams')
            ->whereDate('date', '>=', Carbon::today())
            ->orderBy('date')
            ->value('date');
    }

    private function getNotesDistribution()
    {
        // بافتراض أن عندك جدول notes فيه colonne 'note'
        $grades = ['A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'F' => 0];

        foreach (Note::all() as $note) {
            if ($note->note >= 16) $grades['A']++;
            elseif ($note->note >= 14) $grades['B']++;
            elseif ($note->note >= 12) $grades['C']++;
            elseif ($note->note >= 10) $grades['D']++;
            else $grades['F']++;
        }

        return $grades;
    }
}
