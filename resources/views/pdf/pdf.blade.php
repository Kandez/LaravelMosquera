<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
              <th>Empresa</th>
              <th>Nombre grado</th>
              <th>Tipo peticion</th>
              <th>Num estudiantes</th>
              <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($petitions as $petition)
            <tr>
                <td>{{$petition->companies->name}}</td>
                <td>{{$petition->grades->name}}</td>
                <td>{{$petition->type}}</td>
                <td>{{$petition->n_students}}</td>
                <td>{{$petition->created_at}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>