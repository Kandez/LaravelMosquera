<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Escuela Empresa</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <style>
    body{
      background-color: #8CAFFF;
    }

    .navbar{
      background-color: #5386FC!important;
    }

    .navbar-brand{
      color: #D1D1D1!important;
    }

    .nav-link{
      color: white!important;
      padding-bottom: 2px
    }

    .uper {
    margin-top: 40px;
    }

    table.table-striped.table{
      border-radius: 20px!important;
      background-color: #BACFFF;
    }

    table.table-striped.table th{
      border-top: none;
    }

    div.card{
      border-radius: 20px!important;
    }

    .modal-content{
      background-color: #8CAFFF;
      border-radius: 20px!important;
    }

    div.card.uper{
      background-color: #B6CDFD!important;
      border-radius: 20px!important;
    }

    .card-header, .modal-header{
      border-radius: 20px 20px 0px 0px!important;
      background-color: #B6CDFD!important;
    }

    .card-body, .modal-body{
      border-radius: 0px 0px 20px 20px!important;
      background-color: #BACFFF;
    }

    .input-group-text{
      background-color: #709BFF;
      color: white;
    }

    .form-control{
      background-color: #DEE8FF;
    }

    .btnNew{
      background-color: #5386FC;
      color: white;
      border-radius: 5px;
      padding: 9px;
    }

    .btnNew:hover{
      text-decoration: none;
      border: 1px solid #5386FC;
      border-radius: 1px;
      border-radius: 5px;
      padding: 8px;
      color: white;
    }

    .btnModal{
      background-color: #5386FC!important;
      color: white!important;
    }

    .dropdown-menu.dropdown-menu-right {
      background-color: #BACFFF;
    }

    .dropdown-menu.dropdown-menu-right a:hover {
      background-color: #BACFFF;
    }
  </style>
</head>
<body>
  <header>
    @if(!(\Route::current()->getName() == 'home')) 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ route('home') }}">Home</a>
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

        <ul class="navbar-nav ml-auto">
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                  @if (Route::has('register'))
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  @endif
              </li>
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
      </div>
    </nav>
    @endif
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