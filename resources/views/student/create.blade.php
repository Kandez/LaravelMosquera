@extends('layout/layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Añadir estudiante
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
      <form method="post" action="{{ route('addstudent') }}">
          @csrf
          <div class="form-group">
              <label for="name">Nombre:</label>
              <input type="text" class="form-control" name="name" required/>
          </div>
          <div class="form-group">
              <label for="price">Apellidos:</label>
              <input type="text" class="form-control" name="lastname" required/>
          </div>
          <div class="form-group">
              <label for="quantity">Edad:</label>
              <input type="number" class="form-control" name="age" required/>
          </div>
          <div class="form-group">
            <select name="id_grade[]" class="form-control" multiple>
              @foreach($grades as $grade)
              <option value="{{ $grade->id }}">{{ $grade->name }}, {{ $grade->level }}</option>
              @endforeach
            </select>
            <p>Presione la tecla ctrl para seleccionar varias opciones</p>
          </div>
          <button type="submit" class="btn btn-primary">Añadir</button>
      </form>
  </div>
</div>
<br></br>
@endsection