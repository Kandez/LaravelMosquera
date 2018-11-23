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
  <h1>{{ $student->name }}, {{ $student->lastname }}</h1>
  </a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Cursos</td>
          <td>Nivel</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($studies as $studie)
        <tr>
            <td>{{$studie->grade->name}}</td>
            <td>{{$studie->grade->level}}</td>
            <td>
                <form action="{{ route('deletestudie', [ 'id' => $studie->id ]) }}" method="post">
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Estas seguro?')" type="submit">Eliminar</button>
                </form>
            </td> 
        @endforeach
      </tr>
    </tbody>
  </table>
  <a href="{{ route('home')}}">
    <button>Volver</button>
  </a>
<div>
</br>
<a href="{{ route('students')}}">
  <button class="btn btn-danger">Volver</button>
</a>
@endsection