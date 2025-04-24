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
        <a class="navbar-brand" href="{{route('Users.index')}}">Users</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('Users.index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Users.create')}}">CREATE</a>
            </li>
            
          </ul>
         
        </div>
      </nav>
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
                @yield('card')
            </div>
          </div>
        </div>
        
      </div>

    <main class="m-5 p-5">
        @yield('contentShowDetails')
    </main>
    <div>
        @yield('form')
    </div>
    
    
    <footer>
        
        <ul class="nav justify-content-evenly p-3 bg-light">
            <h4>footer</h4><br>
            <li>
                <a href="" >Home</a>
                
            </li>
            <li>
                <a href="">About</a>
            </li>
            <li>
                <a href="">Contact</a>
            </li>


        </ul>


    </footer>

</body>
</html>