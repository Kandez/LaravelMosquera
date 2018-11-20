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
  <a href="{{ route('createpetition') }}">
    <button>Añadir</button>
  </a>
  <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Peticiones por ciclo
  </a>

  <table class="table table-striped">
    <thead>
        <tr>
          <th>Empresa</th>
          <th>Nombre grado</th>
          <th>Tipo peticion</th>
          <th>Num estudiantes</th>
          <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($petitions->count())
        @foreach($petitions as $petition)
        <tr>
            <td>{{$petition->companies->name}}</td>
            <td>{{$petition->grades->name}}</td>
            <td>{{$petition->type}}</td>
            <td>{{$petition->n_students}}</td>
            <td>
              <a href="{{ route('editpetition',['id' =>$petition->id]) }}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('deletepetition', ['id' =>$petition->id]) }}" method="post">
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
  <a href="{{ route('home') }}">
    <button>Volver</button>
  </a>
<div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('listtwo') }}" method="POST">
          @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Grados</label>
                <select class="form-control" id="exampleFormControlSelect1" name="id_grade">
                  <option value="" selected>Selecciona un grado...</option>
                  @foreach($grades as $g)
                    <option value="{{ $g->id }}">{{ $g->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection