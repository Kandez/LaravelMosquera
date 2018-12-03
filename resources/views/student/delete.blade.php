@extends('layout/layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

  table.table.table-striped td.derecha{
    border-radius: 0px 0px 20px 0px!important;
  }

  table.table.table-striped td.izquierda{
    border-radius: 0px 0px 0px 20px!important;
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
          <th>Cursos</th>
          <th>Nivel</th>
          <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($studies as $studie)
        <tr>
            <td class="izquierda">{{$studie->grade->name}}</td>
            <td>{{$studie->grade->level}}</td>
            <td class="derecha">
                <form action="{{ route('deletestudie', [ 'id' => $studie->id ]) }}" method="post">
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Estas seguro?')" type="submit">Eliminar</button>
                </form>
          </td> 
        @endforeach
      </tr>
    </tbody>
  </table>
<div>
@endsection