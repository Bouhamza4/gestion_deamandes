<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // 📥 Liste utilisateurs
    public function index(Request $request)
    {
        $query = User::query();
    
        // Search
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }
    
        // Filtrage par rôle
        if ($role = $request->input('role')) {
            $query->where('role', $role);
        }
    
        return $query->orderBy('created_at', 'desc')->paginate(10);
    }

    // ➕ Ajouter un utilisateur
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => ['required', Rule::in(['admin', 'student', 'professor'])],
        ]);
    
        $validated['password'] = Hash::make($validated['password']);
    
        $user = User::create($validated);
    
        return response()->json([
            'message' => 'Utilisateur ajouté avec succès',
            'user' => $user,
        ]);
    }
    // 📤 Détails utilisateur
       public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    // ✏️ Modifier
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', Rule::in(['admin', 'professor', 'student'])]
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        return response()->json(['message' => 'Utilisateur modifié avec succès']);
    }

    // 🗑 Supprimer
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }
}
// Compare this snippet from backend/app/Models/User.php:

