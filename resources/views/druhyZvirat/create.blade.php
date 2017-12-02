@extends('layout')

@section('content')

  <h1 class="list-header">Vytvoř druh zvířete</h1>

  <form method="POST" action="{{url('/druhyZvirat')}}">
      {{ csrf_field() }}
      <div class="form-group">
          <label for="nazev"><span style="color: red; display:block; float:right">*</span>Název</label>
          <input type="text" class="form-control" id="nazev" name="nazev" maxlength="20" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Vytvořit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="{{url('/druhyZvirat')}}">
      <input class="btn btn-primary" type="submit" value="Zpět k druhům zvířat" />
  </form>


@endsection
