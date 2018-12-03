@extends('layout/layout')

@section('content')
<style>
  div.table{

  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <a href="{{ route('createstudent')}}" class="btnNew">
    Añadir
  </a>
  <br></br>
  <div class="card uper">
    <table class="table table-striped">
      <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Ciclos</th>
            <th colspan="2">Action</th>
          </tr>
      </thead>
      <tbody>
          @if($students->count())
          @foreach($students as $student)
          <tr>
              <td>{{$student->name}}</td>
              <td>{{$student->lastname}}</td>
              <td>{{$student->age}}</td>
              @if($student->grades->count())
              <td>
                <ul>
                  @foreach($student->grades as $grade)
                  <li>
                    {{$grade->name}}
                  </li>
                  @endforeach
                </ul>
              </td>
              @else
              <td>
                <p>Este alumno no tiene cursos, ¿desea eliminarlo?</p>
              </td>
              @endif
              <td>
                <a href="{{ route('editstudent', [ 'id' => $student->id ]) }}" class="btn btn-primary">Editar</a>
              </td>
              @if($student->grades->count())
              <td>
                <a href="{{ route('studies', [ 'id' => $student->id ]) }}">
                    <button class="btn btn-danger">Eliminar cursos</button>
                </a>
              </td>
              @else
              <td>
              <form action="{{ route('deletestudent', [ 'id' => $student->id ]) }}" method="post">
                  @csrf
                <button class="btn btn-danger" onclick="return confirm('Estas seguro?')" type="submit">Eliminar alumno</button>
              </form>
            </td>
            @endif
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="8">No hay registros.</td>
          </tr>
          @endif
      </tbody>
    </table>
  </div>
</div>
@endsection