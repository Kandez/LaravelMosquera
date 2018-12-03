@extends('layout/layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar
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
      <form method="post" action="{{ route('updategrade', [ 'id' => $grade->id ]) }}">
        @csrf
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" class="form-control" name="name" value="{{ $grade->name }}" required/>
        </div>
        <div class="form-group">
          <label for="price">Nivel:</label>
          <input type="text" class="form-control" name="level" value="{{ $grade->level }}" required/>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection