<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!--request-->
   @if(request('name')!=null && request('number1')!=null && request('number2')!=null)
    <h1>hello: {{ request('name') }}</h1><br>
    <p>la valeur de number 1: {{ request('number1') }} et la valeur de num 2: {{ request('number2') }} , la somme est: {{ request('number1') + request('number2') }}</p>

    @else
    <p> le nom et les deux number ne pas donne </p>
    @endif
    
        <br>
</body>
</html>