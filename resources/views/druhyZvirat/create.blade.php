@extends('layout')

@section('content')

  <h1>Vytvoř druh zvířete</h1>

  <hr>

  <form method="POST" action="/druhyZvirat">
      {{ csrf_field() }}
      <div class="form-group">
          <label for="nazev">Název</label>
          <input type="text" class="form-control" id="nazev" name="nazev" maxlength="20" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/druhyZvirat">
      <input class="button btn-primary" type="submit" value="Zpět k druhům zvířat" />
  </form>


@endsection
