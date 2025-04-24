<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @if($a==9 )

    <h1 style='color:red;background-color:yellow'>GOLDEN NUMBER: {{$a}}</h1>
    @else
    <h1 style='color:blue;background-color:orange'>not a golden NUMBER: {{$a}}</h1>
    @endif --}}
    @php
   
    session_start();
    
    if (!isset($_SESSION['golden_number_displayed'])) {
        $_SESSION['golden_number_displayed'] = false;
    }
    
    if ($a == 9 && !$_SESSION['golden_number_displayed']) {
        echo "<h1 style='color:red;background-color:yellow'>GOLDEN NUMBER: $a</h1>";
        $_SESSION['golden_number_displayed'] = true;
    } else {
        echo "<h1 style='color:blue;background-color:orange'>not a golden NUMBER: $a</h1>";
    }
    @endphp

</body>
</html>