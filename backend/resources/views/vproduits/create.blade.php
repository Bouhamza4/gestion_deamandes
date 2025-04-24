@extends('layouts.lienHome')

@section('content')
<style>
    /* CSS wa3r pour la page create */
    body {
        background: linear-gradient(45deg, #a1c4fd, #c2e9fb);
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 20px;
    }
    .create-container {
        background-color: #fff;
        max-width: 500px;
        margin: auto;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .create-container h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .create-container form {
        display: flex;
        flex-direction: column;
    }
    .create-container input[type="text"] {
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .create-container button {
        padding: 10px;
        background-color: #e74c3c;
        border: none;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.3s ease;
    }
    .create-container button:hover,
    .create-container button:focus {
        background-color: #c0392b;
        transform: scale(1.03);
    }
</style>

<div class="create-container">
    <h1>Create Produit</h1>
    <form action="{{ route('Produits.store') }}" method="post">
        @csrf
        <input type="text" name="description" placeholder="Description" value={{old('description')}}>
        {{-- error --}}
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <input type="text" name="prix" placeholder="Prix" value={{old('prix')}}>
        {{-- error --}}
        @error('prix')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Ajouter</button>
    </form>
</div>
@endsection
