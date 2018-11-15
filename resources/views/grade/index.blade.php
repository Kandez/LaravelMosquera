@extends('layout/layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ route('creategrade')}}">
    <button>Añadir</button>
  </a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Nombre</td>
          <td>Nivel</td>
          <td>Alumnos</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @if($grades->count())
        @foreach($grades as $grade)
        <tr>
            <td>{{$grade->name}}</td>
            <td>{{$grade->level}}</td>
            @if($grade->students->count())
            <td>
              <ul>
                @foreach($grade->students as $student)
                <li>
                  {{$student->name}}
                </li>
                @endforeach
              </ul>
            </td>
            @else
            <td>
              Este ciclo no tiene alumnos asignados.
            </td>
            @endif
            <td>
              <a href="{{ route('editgrade', [ 'id' => $grade->id ]) }}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('deletegrade', [ 'id' => $grade->id ]) }}" method="post">
                  @csrf
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="8">No hay registros.</td>
        </tr>
        @endif
    </tbody>
  </table>
  <a href="{{ route('home')}}">
        <button>Volver</button>
    </a>
<div>
@endsection