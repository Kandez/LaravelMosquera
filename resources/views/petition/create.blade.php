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
          <label for="type">Tipo peticion :</label>
            <input type="text" class="form-control" name="type" required/>
        </div>
        <div class="form-group">
          <label for="nest">Num estudiantes :</label>
            <input type="text" name="n_students" class="form-control" required/>
        </div>
          <button type="submit" class="btn btn-primary">Añadir</button>
      </form>
  </div>
</div>
@endsection