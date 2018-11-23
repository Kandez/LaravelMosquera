@extends('layout.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar peticion
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
      <form method="post" action="{{ route('updatepetition', ['id' => $petition->id]) }}">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlSelect1">Grados</label>
          <select class="form-control" id="exampleFormControlSelect1" name="id_grade">
            <option value="" selected>Selecciona un grado...</option>
            @foreach($grades as $gra)
              @if($petition->id_grade==$gra->id)
                <option value="{{ $gra->id }}" selected>{{ $gra->name }}</option>
              @else
                <option value="{{ $gra->id }}">{{ $gra->name }}</option>
              @endif
            @endforeach
          </select>
      </div>
      <div class="form-group">
          <label for="exampleFormControlSelect1">Compañia</label>
          <select class="form-control" id="exampleFormControlSelect1" name="id_company">
            <option value="" selected>Selecciona una compañia...</option>
            @foreach($companies as $com)
            @if($petition->id_company==$com->id)
              <option value="{{ $com->id }}" selected>{{ $com->name }}</option>
            @else
              <option value="{{ $com->id }}">{{ $com->name }}</option>
            @endif
          @endforeach
          </select>
        </div>
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo peticion</label>
            <select class="form-control" id="exampleFormControlSelect1" name="type">
              <option value="" selected>Selecciona un tipo de peticion...</option>
                @if($petition->type=="FCT")
                  <option selected>FCT</option>
                @else
                  <option>FCT</option>
                @endif
                @if($petition->type=="Dual")
                  <option selected>Dual</option>
                @else
                  <option>Dual</option>
                @endif                
                @if($petition->type=="Contrato")
                  <option selected>Contrato</option>
                @else
                  <option>Contrato</option>
                @endif
            </select>
          </div>
        <div class="form-group">
          <label for="nest">Numero estudiantes :</label>
          <input type="number" max="3" min="1" name="n_students" class="form-control" value="{{ $petition->n_students }}" required/>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection