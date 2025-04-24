<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* CSS wa3r ajouté pour le fichier */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 3em;
            margin: 20px;
        }
        h4 {
            color: #34495e;
            margin: 10px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        /* Mise à jour : Les liens affichent un style de bouton */
        a {
            display: inline-block;
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        a:hover,
        a:focus {
            background-color: #c0392b;
            transform: scale(1.05);
        }
        /* Style pour les icônes */
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
</head>
<body>
    <h1>PRODUITS</h1>
    @foreach ($produits as $p)
    <h4>
      <span class="icon"></span>
      le description: <a href="{{ route('Produits.show', $p['id']) }}">{{ $p['description'] }}</a>
    </h4>
    @endforeach
    <p>{{ $m }}</p>
    <br>
    <a href="{{ route('Produits.create') }}">create produit</a>
    <br>
    
</body>
</html>