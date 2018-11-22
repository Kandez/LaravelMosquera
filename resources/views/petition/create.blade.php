@extends('layout.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Añadir peticion
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('addpetition') }}">
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
            <label for="exampleFormControlSelect1">Compañia</label>
            <select class="form-control" id="exampleFormControlSelect1" name="id_company">
              <option value="" selected>Selecciona una compañia...</option>
              @foreach($companies as $com)
                <option value="{{ $com->id }}">{{ $com->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo peticion</label>
            <select class="form-control" id="exampleFormControlSelect1" name="type">
              <option value="" selected>Selecciona un tipo de peticion...</option>
                <option>FCT</option>
                <option>Dual</option>
                <option>Contrato</option>
            </select>
          </div>
        <div class="form-group">
          <label for="nest">Num estudiantes :</label>
            <input type="number" max="3" min="1" name="n_students" class="form-control" required/>
        </div>
          <button type="submit" class="btn btn-primary">Añadir</button>
      </form>
  </div>
</div>
@endsection