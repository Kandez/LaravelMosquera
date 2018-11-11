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
          <label for="name">Tipo peticion :</label>
          <input type="text" class="form-control" name="type" value="{{ $petition->type }}" required/>
        </div>
        <div class="form-group">
          <label for="nest">Numero estudiantes :</label>
          <input type="text" name="n_students" class="form-control" value="{{ $petition->n_students }}" required/>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection