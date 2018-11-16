@extends('layout.layout')

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
  <table class="table table-striped">
    <thead>
        <tr>
          <td>tipo contrato</td>
          <td>id ciclo</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @if($petitions->count())
        @foreach($petitions as $petition)
        <tr>
            <td>{{$petition->type}}</td>
            <td>{{$petition->id_grade}}</td>
            <td>
              <a href="{{ route('editpetition',['id' =>$petition->id]) }}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('deletepetition', ['id' =>$petition->id]) }}" method="post">
                  @csrf
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="8">No hay registros</td>
        </tr>
        @endif
    </tbody>
  </table>
  <a href="{{ route('home') }}">
    <button>Volver</button>
  </a>
<div>
@endsection