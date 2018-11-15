@extends('layout.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar compañia
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
      <form method="post" action="{{ route('updatecompany', ['id' => $company->id]) }}">
        @csrf
        <div class="form-group">
          <label for="name">Nombre compañia :</label>
          <input type="text" class="form-control" name="name" value="{{ $company->name }}" required/>
        </div>
        <div class="form-group">
          <label for="city">Ciudad :</label>
          <input type="text" class="form-control" name="city" value="{{ $company->city }}" required/>
        </div>
        <div class="form-group">
          <label for="cp">Codigo postal :</label>
          <input type="number" class="form-control" name="cp" value="{{ $company->cp }}" required/>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection