<h1>MY PAGE AMINE</h1>
@foreach ($modules as $item)
   <a href="{{route('Modules.show',$item['Num'])}}">NOM :{{ $item['Name']}}</a> 
    <br>
   <h1>Description : {{$item['Description']}}</h1> 
    <br>
    <hr>
@endforeach

{{dd($modules)}}