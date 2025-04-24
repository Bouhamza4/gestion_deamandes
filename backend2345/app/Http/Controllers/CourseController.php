<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return Course::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required',
            'description' => 'nullable',
            'professeur' => 'nullable',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
        ]);

        return Course::create($validated);
    }

    public function show($id)
    {
        return Course::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());
        return $course;
    }

    public function destroy($id)
    {
        return Course::destroy($id);
    }
}
