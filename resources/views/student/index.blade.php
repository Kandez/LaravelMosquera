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
  <a href="{{ route('createstudent')}}">
    <button>Añadir</button>
  </a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Nombre</td>
          <td>Apellidos</td>
          <td>Edad</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @if($students->count())
        @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->lastname}}</td>
            <td>{{$student->age}}</td>
            <td>
              <a href="{{ route('editstudent', [ 'id' => $student->id ]) }}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('deletestudent', [ 'id' => $student->id ]) }}" method="post">
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