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
  <a href="{{ route('createcompany')}}">
    <button class="btn btn-success">Añadir</button>
  </a>
  <br></br>
  <table class="table table-striped">
    <thead>
        <tr>
          <th>Nombre compañia</th>
          <th>Ciudad</th>
          <th>Codigo postal</th>
          <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($companies->count())
        @foreach($companies as $company)
        <tr>
            <td>{{$company->name}}</td>
            <td>{{$company->city}}</td>
            <td>{{$company->cp}}</td>
            <td>
              <a href="{{ route('editcompany',['id' =>$company->id]) }}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('deletecompany', ['id' =>$company->id]) }}" method="post">
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Estas seguro?')" type="submit">Eliminar</button>
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
<div>
@endsection