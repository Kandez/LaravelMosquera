<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        h1{
            font-size:30px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Listado de peticiones</h1>

    <table>
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