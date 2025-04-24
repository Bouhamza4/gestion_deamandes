<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;
class FiliereController extends Controller
{
    

public function index()
{
    $filieres = Filiere::with('courses')->get();

    return response()->json($filieres);
}

}
