<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>le nom:  {{$produit['nom']}} </h1>
    <p>Prix:  {{$produit['prix']}} </p>
    <p>status: 
        @if ($produit['status'] == 1)
            Disponible
        @else
            Non disponible
        @endif
    </p>
</body>
</html>