<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Escuela Empresa</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ route('home')}}">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('students') }}">Estudiantes<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="{{ route('grades') }}">Ciclos<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="{{ route('petitions') }}">Peticiones<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="{{ route('companies') }}">Compañias<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>