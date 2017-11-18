@extends('layout')

@section('content')

  <h1>Vytvoř výběh</h1>

  <hr>

  <form method="POST" action="/vybehy">
      {{ csrf_field() }}
      <div class="form-group">
          <label for="potrebnyCas">Potřebný čas</label>
          <input type="number" class="form-control" id="potrebnyCas" name="potrebnyCas" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="pomucky">Pomůcky</label>
          <input type="text" class="form-control" id="pomucky" name="pomucky" maxlength="30" required>
      </div>
      <div class="form-group">
          <label for="maxKapacita">Maximální kapacita</label>
          <input type="number" class="form-control" id="maxKapacita" name="maxKapacita" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="pocetPotrebnychOsetrovatelu">Počet potřebných ošetřovatelů</label>
          <input type="number" class="form-control" id="pocetPotrebnychOsetrovatelu" name="pocetPotrebnychOsetrovatelu" maxlength="20" required>
      </div>
      {{-- TODO @iis tady musí být select typů výběhu a poté poslání ID tohoto typu--}}
      <div class="form-group">
          <label for="idTypuVybehu">Typ výběhu</label>
          <input type="number" class="form-control" id="idTypuVybehu" name="idTypuVybehu" maxlength="10" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/vybehy/">
      <input class="button btn-primary" type="submit" value="Zpět k výběhům" />
  </form>

@endsection
