@extends('layout')

@section('content')

  <h1>Vytvoř výběh</h1>

  <hr>

  <form method="POST" {{url('/vybehy')}} >
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
      <div class="form-group">
          <label for="idTypuVybehu">Typ výběhu</label>
          <select class="form-control" name="idTypuVybehu">
              @foreach($typyVybehu as $typVybehu)
                  <option value="{{$typVybehu->id}}">{{$typVybehu->nazev}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="{{url('/vybehy')}}">
      <input class="button btn-primary" type="submit" value="Zpět k výběhům" />
  </form>

@endsection
