@extends('layout/layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
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
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection