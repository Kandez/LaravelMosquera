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
  <button>{{ $student->name }}, {{ $student->lastname }}</button>
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
                <form action="{{ route('deletestudies', [ 'id' => $studie->id ]) }}" method="post">
                  @csrf
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <a href="{{ route('home')}}">
    <button>Volver</button>
  </a>
<div>
@endsection