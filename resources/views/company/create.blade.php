@extends('layout.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Añadir compañia
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
      <form method="post" action="{{ route('addcompany') }}">
        @csrf
        <div class="form-group">
          <label for="name">Nombre compañia :</label>
            <input type="text" class="form-control" name="name" required/>
        </div>
        <div class="form-group">
          <label for="city">Ciudad :</label>
            <input type="text" class="form-control" name="city" required/>
        </div>
        <div class="form-group">
            <label for="cp">Codigo postal :</label>
                <input type="text" minlength="5" maxlength="5" class="form-control" name="cp" required/>
        </div>
          <button type="submit" class="btn btn-primary">Añadir</button>
      </form>
  </div>
</div>
@endsection