{{-- <ul>
    @foreach($noms as $nom)
    @if($nom === 'Salma')
    <p>Bienvenue, Administrateur !</p>
@else
<li> bien {{ $nom }}</li>
@endif


    @endforeach
</ul> --}}

@empty($noms)
<p>Aucun produit disponible.</p>
@endempty