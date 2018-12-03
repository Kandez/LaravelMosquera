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
  <a href="{{ route('createpetition') }}" class="btnNew" style="background-color: #6594FF!important;">Añadir</a>
  <a class="btn btn-primary btnModal" data-toggle="modal" data-target="#exampleModaldate">
  Peticiones entre dos fechas
  </a>
  <a class="btn btn-primary btnModal" data-toggle="modal" data-target="#exampleModal">
  Peticiones por ciclo
  </a>
  <a class="btn btn-primary btnModal" data-toggle="modal" data-target="#exampleModalciclo">
  Peticiones para un ciclo y tipo
  </a>

  <form action="{{ route('pdf') }}" method="POST" style="float:right;">
    @csrf
    @if(isset($finic) && isset($ffinal))
      <input type="hidden" name="finic" value="{{ $finic }}">
      <input type="hidden" name="ffinal" value="{{ $ffinal }}">
    @elseif(isset($idg1))
      <input type="hidden" name="idg1" value="{{ $idg1 }}">
    @elseif(isset($idg2) && isset($type))
      <input type="hidden" name="idg2" value="{{ $idg2 }}">
      <input type="hidden" name="type" value="{{ $type }}">
    @endif
    <button type="submit" class="btn btn-danger">Generar PDF</button>
  </form>
</div>

<div class="card uper">
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
</div>
<br></br>
  <a href="{{ route('petitions') }}">
    <button class="btn btn-primary">Indice de peticiones</button>
  </a>
<div>

<!-- Modal fechas -->
<div class="modal fade" id="exampleModaldate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Listado 1: Peticiones en intervalo de fecha.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('listone') }}" method="POST">
            @csrf
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Fecha inicio y fin</span>
              </div>
              <input type="date" class="form-control" name="fini">
              <input type="date" class="form-control" name="ffin">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Modal ciclos -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listado 2: Peticiones por ciclo.</h5>
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
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal ciclo y tipo -->
<div class="modal fade" id="exampleModalciclo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Listado 3: Peticiones por ciclo y tipo.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('listthree') }}" method="POST">
            @csrf
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Grados</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="id_grade">
                    <option value="" selected>Selecciona un grado...</option>
                    @foreach($grades as $gra)
                      <option value="{{ $gra->id }}">{{ $gra->name }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlSelect1">Tipo Peticion</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="type">
                    <option value="" selected>Selecciona un tipo...</option>
                      <option value="FCT">FCT</option>
                      <option value="Dual">Dual</option>
                      <option value="Contrato">Contrato</option>
                  </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Filtrar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection