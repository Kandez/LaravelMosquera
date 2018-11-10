@extends('layout/layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Añadir ciclo
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
      <form method="post" action="{{ route('addgrade') }}">
          @csrf
          <div class="form-group">
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name" required/>
          </div>
          <div class="form-group">
              <label for="price">Nivel:</label>
              <input type="text" class="form-control" name="level" required/>
          </div>
          <button type="submit" class="btn btn-primary">Añadir</button>
      </form>
  </div>
</div>
@endsection