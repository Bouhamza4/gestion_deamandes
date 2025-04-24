
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">GESTION PRODUIT</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
          
          </div>
          
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="{{url('/produit1')}}">Produit 1</a>
                    <a class="nav-link" href="{{url('/produit2')}}">Produit 2</a>
                    <a class="nav-link" href="{{url('/produit3')}}">Produit 3</a>
                  </div>
            </ul>
         
        </div>
      </nav>
<div>
    @yield('content')
    <div class="card" style="width: 18rem;">
        
        @yield('image')
        {{-- <img src="{{url('images/sumsung25.jpeg')}}" class="card-img-top" alt="..."> --}}
        <div class="card-body">
            @yield('prix')
            @yield('title')
            @yield('description')
            {{-- <h5 class="card-title">Card title</h5>

          <h5 class="card-title">{{$title}}</h5>
          <p class="card-text">{{$description}}</p> --}}
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>