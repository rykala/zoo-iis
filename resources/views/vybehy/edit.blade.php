@extends('layout')

@section('content')

  <h1>Uprav výběh</h1>

  <hr>

  <form method="POST" action="/vybehy/{{$vybeh->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="potrebnyCas">Potřebný čas</label>
          <input type="number" class="form-control" id="potrebnyCas" name="potrebnyCas" value="{{ $vybeh->potrebnyCas }}" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="pomucky">Pomůcky</label>
          <input type="text" class="form-control" id="pomucky" name="pomucky" value="{{ $vybeh->pomucky }}" maxlength="30" required>
      </div>
      <div class="form-group">
          <label for="maxKapacita">Maximální kapacita</label>
          <input type="number" class="form-control" id="maxKapacita" name="maxKapacita" value="{{ $vybeh->maxKapacita }}" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="pocetPotrebnychOsetrovatelu">Počet potřebných ošetřovatelů</label>
          <input type="number" class="form-control" id="pocetPotrebnychOsetrovatelu" name="pocetPotrebnychOsetrovatelu" value="{{ $vybeh->pocetPotrebnychOsetrovatelu }}" maxlength="20" required>
      </div>
      {{-- TODO @iis tady musí být select typů výběhu a poté poslání ID tohoto typu--}}
      <div class="form-group">
          <label for="idTypuVybehu">Typ výběhu</label>
          <input type="number" class="form-control" id="idTypuVybehu" name="idTypuVybehu" value="{{ $vybeh->idTypuVybehu }}" maxlength="10" required>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/vybehy/{{ $vybeh->id }}">
      <input class="button btn-primary" type="submit" value="Zpět k výběhu" />
  </form>



@endsection