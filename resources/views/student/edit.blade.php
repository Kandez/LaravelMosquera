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
      <form method="post" action="{{ route('updatestudent', [ 'id' => $student->id ]) }}">
        @csrf
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" class="form-control" name="name" value="{{ $student->name }}" required/>
        </div>
        <div class="form-group">
          <label for="price">Apellidos:</label>
          <input type="text" class="form-control" name="lastname" value="{{ $student->lastname }}" required/>
        </div>
        <div class="form-group">
          <label for="quantity">Edad:</label>
          <input type="text" class="form-control" name="age" value="{{ $student->age }}" required/>
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" name="id_student" value="{{ $student->id }}" required/>
        </div>
        <div class="form-group">
          <select name="id_grade[]" class="form-control" multiple>
            @foreach($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->name }}, {{ $grade->level }}</option>
            @endforeach
          </select>
          <p>Presione la tecla ctrl para seleccionar varias opciones</p>
        </div>
        {{-- <div class="form-group">
          <label for="quantity">Ciclos:</label>
          @foreach($grades as $grade)
          <p>{{ $grade->name }}, {{ $grade->level }} <input type="checkbox" name="id_grade[]" value="{{ $grade->id }}"/></p>
          @endforeach
        </div> --}}
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection