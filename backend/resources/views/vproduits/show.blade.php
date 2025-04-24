@extends('layouts.lienHome')

@section('content')
<style>
    /* CSS wa3r pour la page show */
    body {
        padding: 20px;
        font-family: 'Arial', sans-serif;
    }
    h1 {
        text-align: center;
        color: #2c3e50;
    }
    .product-details {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        max-width: 500px;
        margin: auto;
    }
    .product-details p {
        font-size: 1.2em;
        margin: 10px 0;
    }
    .button {
        display: inline-block;
        background-color: #e74c3c;
        color: #fff;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        margin-top: 20px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .button:hover,
    .button:focus {
        background-color: #c0392b;
        transform: scale(1.05);
    }
    .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: url('/c:/xampp2/htdocs/LARAVEL/blooog/public/images/icon.png') no-repeat center;
        background-size: cover;
        box-shadow: 0 0 5px rgba(0,0,0,0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-right: 8px;
    }
    .icon:hover,
    .icon:focus {
        transform: scale(1.1);
        box-shadow: 0 0 8px rgba(0,0,0,0.5);
    }
</style>

<div class="product-details">
    <h1>Produit Details</h1>
    <p><span class="icon"></span><strong>Numéro:</strong> {{ $produit['id'] }}</p>
    <p><span class="icon"></span><strong>Description:</strong> {{ $produit['description'] }}</p>
    <p><span class="icon"></span><strong>Prix:</strong> {{ $produit['prix'] }}</p>
    <a href="{{ route('Produits.create') }}" class="button">Create Produit</a>
    <a href="{{ route('Produits.edit',$produit['id'])}}">edit</a>
    <form action="{{ route('Produits.destroy', $produit['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="button">Delete</button>
    </form>
    <a href="{{ route('Produits.index') }}" class="button">Back</a>
</div>
@endsection
